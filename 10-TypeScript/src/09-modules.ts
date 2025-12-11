import { PI, add, Calculator } from './math.js';

const calc = new Calculator();

const output09 = document.getElementById('output09');

const output08 = document.getElementById('output09');

if(output09) {
    output09.innerHTML = `
    <li><strong>Pi = </strong> ${PI}</li>
    <li><strong>32 + 32 =</strong> ${calc.multiply(8, 16)}</li>
    `;
}