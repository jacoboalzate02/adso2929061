// Enemy Class
class Enemy {
    // Attributes
    name: string;
    health: number;

    constructor(name: string, health: number) {
        this.name   = name;
        this.health = health;
    }

    takeDamage(damage: number): void {
        this.health-= damage;
    }
}

const florian= new Enemy('florian', 80);
florian.takeDamage(15);
florian.takeDamage(15);
florian.takeDamage(15);

const output04 = document.getElementById('output04');

if(output04) {
    output04.innerHTML = `
    <li><b>Enemy Name:</b> ${florian.name} </li>
    <li><b>Total Health after 3 attacks:</b> ${florian.health}</li> 
    `;
}