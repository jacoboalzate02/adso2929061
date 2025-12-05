"use strict";
// Enemy Class
class Enemy {
    constructor(name, health) {
        this.name = name;
        this.health = health;
    }
    takeDamage(damage) {
        this.health -= damage;
    }
}
const florian = new Enemy('florian', 80);
florian.takeDamage(15);
florian.takeDamage(15);
florian.takeDamage(15);
const output04 = document.getElementById('output04');
if (output04) {
    output04.innerHTML = `
    <li><b>Enemy Name:</b> ${florian.name} </li>
    <li><b>Total Health after 3 attacks:</b> ${florian.health}</li> 
    `;
}
