// Define FC Card
interface Lamine {
    name: string;
    dribble: number;
    pace: number;
    defense: number;
}

const card: Lamine = {
    name: 'Lamine Yamal Nasraoui Ebana',
    dribble: 92,
    pace: 84,
    defense: 48
}

const output02 = document.getElementById('output02');

if(output02) {
    output02.innerHTML = `
    <li><b>Name:</b> ${card.name}</li>
    <li><b>Dribble:</b> ${card.dribble}</li>
    <li><b>Pace:</b> ${card.pace}</li>
    <li><b>Defense:</b> ${card.defense}</li>
    `;
}