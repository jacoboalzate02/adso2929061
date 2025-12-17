"use strict";
class MatchError extends Error {
    constructor(message) {
        super(message);
        this.name = "MatchError";
    }
}
const matchScore = { home: 2, away: 1 };
if (matchScore.home < 0) {
    throw new MatchError("Score cannot be negative");
}
const totalGoals = matchScore.home + matchScore.away;
const output15 = document.getElementById('output15');
if (output15) {
    output15.innerHTML = `
    <li><strong>Total Goals:</strong> ${totalGoals}</li>
    <li><strong>Home Team Wins:</strong> ${matchScore.home > matchScore.away ? "Yes" : "No"}</li>
    `;
}
