interface MatchResult {
    match : string;
    score: string;
    possession: number;
}

const matchResult: MatchResult = {
    match: "Barcelona vs Real Madrid",
    score: "3-1",
    possession: 62
};

const output14 = document.getElementById('output14');

if (output14) {
    output14.innerHTML = `
    <li><strong>Match:</strong> ${matchResult.match}</li>
    <li><strong>Final Score:</strong> ${matchResult.score}</li>
    <li><strong>Possession:</strong> ${matchResult.possession}%</li>
    `;
}