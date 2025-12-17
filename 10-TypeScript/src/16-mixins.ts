type Constructorr<T = {}> = new (...args: any[]) => T;

function StrikerAbilities<TBase extends Constructor>(Base: TBase) {
    return class extends Base {
        shootingPower: number = 90;
    };
}

function PlaymakerAbilities<TBase extends Constructor>(Base: TBase) {
    return class extends Base {
        passingAccuracy: number = 95;
    };
}

class Player {
    name: string;
    
    constructor(name: string) {
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