"use strict";
const playerStats = {
    name: "Raphinha",
    goals: 45,
    assists: 12
};
const output13 = document.getElementById('output13');
if (output13) {
    output13.innerHTML = `
    <li><strong>Name:</strong> ${playerStats.name}</li>
    <li><strong>Goals this season:</strong> ${playerStats.goals}</li>
    <li><strong>Assists:</strong> ${playerStats.assists}</li>
    `;
}
