// Define enemy types with enums
enum EnemyType {
    Flying,
    Grounds,
    Boss
}

const currentEnemy = EnemyType.Grounds;

const output06 = document.getElementById('output06');

if(output06) {
    output06.innerHTML = `
        <li><b>Enemy Tytpe:</b> ${EnemyType[currentEnemy]}</li>
        <li><b>Typ Valu:</b> ${currentEnemy}</b>
    `;
}