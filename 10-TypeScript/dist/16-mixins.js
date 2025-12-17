"use strict";
function StrikerAbilities(Base) {
    return class extends Base {
        constructor() {
            super(...arguments);
            this.shootingPower = 90;
        }
    };
}
function PlaymakerAbilities(Base) {
    return class extends Base {
        constructor() {
            super(...arguments);
            this.passingAccuracy = 95;
        }
    };
}
class Player {
    constructor(name) {
        this.name = name;
    }
}
const CompleteForward = PlaymakerAbilities(StrikerAbilities(Player));
const starPlayer = new CompleteForward("Kylian Mbappé");
const output16 = document.getElementById('output16');
if (output16) {
    output16.innerHTML = `
    <li><strong>Name:</strong> ${starPlayer.name}</li>
    <li><strong>Shooting Power:</strong> ${starPlayer.shootingPower}</li>
    <li><strong>Passing Accuracy:</strong> ${starPlayer.passingAccuracy}</li>
    `;
}
