"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var PlayerPosition;
(function (PlayerPosition) {
    PlayerPosition[PlayerPosition["Goalkeeper"] = 0] = "Goalkeeper";
    PlayerPosition[PlayerPosition["Defender"] = 1] = "Defender";
    PlayerPosition[PlayerPosition["Midfielder"] = 2] = "Midfielder";
    PlayerPosition[PlayerPosition["Forward"] = 3] = "Forward";
})(PlayerPosition || (PlayerPosition = {}));
class Team {
    constructor(name) {
        this.name = name;
    }
}
class PlayerDatabase {
    constructor() {
        this.items = [];
    }
    addItem(item) {
        this.items.push(item);
    }
    getItems() {
        return this.items;
    }
}
function ChampionDecorator(constructor) {
    constructor.prototype.isChampion = true;
}
let StarPlayer = class StarPlayer extends Team {
    constructor() {
        super(...arguments);
        this.starRating = 5;
    }
};
StarPlayer = __decorate([
    ChampionDecorator
], StarPlayer);
function isForwardPlayer(player) {
    return player.position === "Forward";
}
var FootballData;
(function (FootballData) {
    FootballData.league = "Premier League";
    FootballData.season = "2023/24";
})(FootballData || (FootballData = {}));
class TrainingError extends Error {
    constructor(message) {
        super(message);
        this.name = "TrainingError";
    }
}
function CaptainMixin(Base) {
    return class extends Base {
        constructor() {
            super(...arguments);
            this.leadership = 90;
        }
    };
}
const database = new PlayerDatabase();
database.addItem("Player Stats");
database.addItem("Match History");
database.addItem("Training Data");
const manCity = new StarPlayer("Manchester City");
const isChampionTeam = manCity.isChampion;
const player = { id: 1, name: "Kevin De Bruyne", position: "Midfielder" };
const isForward = isForwardPlayer(player);
const CaptainTeam = CaptainMixin(Team);
const captain = new CaptainTeam("Liverpool");
const output17 = document.getElementById('output17');
if (output17) {
    output17.innerHTML = `
        <li><strong>Database Items:</strong> ${database.getItems().length}</li>
        <li><strong>Is Champion Team:</strong> ${isChampionTeam ? "Yes" : "No"}</li>
        <li><strong>Is Forward Player:</strong> ${isForward ? "Yes" : "No"}</li>
        <li><strong>League:</strong> ${FootballData.league}</li>
        <li><strong>Team Leadership:</strong> ${captain.leadership}</li>
        <li><strong>Star Player Rating:</strong> ${manCity.starRating}</li>
        <li><strong>Player Name:</strong> ${player.name}</li>
    `;
}
