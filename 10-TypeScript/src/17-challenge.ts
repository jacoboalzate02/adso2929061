interface FootballPlayer {
    id: number;
    name: string;
    position: string;
}

enum PlayerPosition {
    Goalkeeper,
    Defender,
    Midfielder,
    Forward
}

class Team {
    name: string;
    
    constructor(name: string) {
        this.name = name;
    }
}

class PlayerDatabase<T> {
    private items: T[] = [];
    
    addItem(item: T): void {
        this.items.push(item);
    }
    
    getItems(): T[] {
        return this.items;
    }
}

type MatchOutcome = "win" | "draw" | "loss";

function ChampionDecorator(constructor: Function) {
    constructor.prototype.isChampion = true;
}

@ChampionDecorator
class StarPlayer extends Team {
    starRating: number = 5;
}

function isForwardPlayer(player: FootballPlayer): boolean {
    return player.position === "Forward";
}

type PartialPlayerUpdate = Partial<FootballPlayer>;

namespace FootballData {
    export const league = "Premier League";
    export const season = "2023/24";
}

class TrainingError extends Error {
    constructor(message: string) {
        super(message);
        this.name = "TrainingError";
    }
}

function CaptainMixin<TBase extends Constructor>(Base: TBase) {
    return class extends Base {
        leadership: number = 90;
    };
}

type Constructor<T = {}> = new (...args: any[]) => T;

const database = new PlayerDatabase<string>();
    database.addItem("Player Stats");
    database.addItem("Match History");
    database.addItem("Training Data");
    
    const manCity = new StarPlayer("Manchester City");
    const isChampionTeam = (manCity as any).isChampion;
    
    const player: FootballPlayer = { id: 1, name: "Kevin De Bruyne", position: "Midfielder" };
    const isForward = isForwardPlayer(player);
    const CaptainTeam = CaptainMixin(Team);
    const captain = new CaptainTeam("Liverpool");

const output17 = document.getElementById('output17');


if(output17) {
    output17.innerHTML = `
        <li><strong>Database Items:</strong> ${database.getItems().length}</li>
        <li><strong>Is Champion Team:</strong> ${isChampionTeam ? "Yes" : "No"}</li>
        <li><strong>Is Forward Player:</strong> ${isForward ? "Yes" : "No"}</li>
        <li><strong>League:</strong> ${FootballData.league}</li>
        <li><strong>Team Leadership:</strong> ${(captain as any).leadership}</li>
        <li><strong>Star Player Rating:</strong> ${manCity.starRating}</li>
        <li><strong>Player Name:</strong> ${player.name}</li>
    `;
}