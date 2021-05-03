// Element vi använder
const canvas = document.querySelector("canvas");

// Ställ in storlek på canvas
canvas.width = 800;
canvas.height = 600;

// Slå på rit-api
var ctx = canvas.getContext("2d");

// Skapa kartan
var karta = [
    [0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1],
    [1, 1, 1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1],
    [1, 0, 1, 1, 1, 0, 1, 1, 0, 1, 0, 1, 0, 0, 0, 1],
    [1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1],
    [1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 0, 0, 1],
    [1, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0, 1],
    [1, 0, 1, 1, 1, 0, 1, 0, 1, 1, 0, 1, 0, 0, 0, 1],
    [1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 1, 1, 1],
    [1, 0, 1, 1, 1, 0, 1, 0, 1, 1, 1, 1, 0, 1, 0, 1],
    [1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
];

class Spelare {
    constructor() {
        this.x = 25;
        this.y = 25;
        this.rotation = 0;
        this.pic = new Image();
        this.pic.src = "./pics/nyckelpiga.png";
    }
    draw() {
        ctx.save();
        ctx.translate(this.x, this.y);
        ctx.rotate(this.rotation / 180 * Math.PI);
        ctx.drawImage(this.pic, -25, -25, 50, 50);
        ctx.restore();
    }
}
class Mynt {
    constructor() {
        this.x = Math.floor(Math.random() * 16);
        this.y = Math.floor(Math.random() * 12);
        this.pic = new Image();
        this.pic.src = "./pics/Coin-icon.png";
    }
    draw() {
        ctx.drawImage(this.pic, this.x * 50, this.y * 50, 50, 50);
    }
}
class Monster {
    constructor() {
        this.x = Math.floor(Math.random() * 16);
        this.y = Math.floor(Math.random() * 12);
        this.pic = new Image();
        this.pic.src = "./pics/Zombie-icon.png";
    }
    draw() {
        ctx.drawImage(this.pic, this.x * 50, this.y * 50, 50, 50);
    }
}
var spelare = new Spelare();
var monster = new Monster();

var mynten = [];
for (let i = 0; i < 5; i++) {
    mynten.push(new Mynt());
}

var monsters = [];
for (let i = 0; i < 3; i++) {
    monsters.push(new Monster());
}

function ritaKartan() {
    for (var j = 0; j < 12; j++) {
        for (var i = 0; i < 16; i++) {
            var x = i * 50;
            var y = j * 50;
            if (karta[j][i] == 1) {
                ctx.fillRect(x, y, 50, 50);
            }
        }
    }
}

function loopen() {
    ctx.clearRect(0, 0, 800, 600);

    ritaKartan();

    spelare.draw();
    
    mynten.forEach(mynt => mynt.draw());
    monsters.forEach(monster => monster.draw());

    requestAnimationFrame(loopen);
}
loopen();

window.addEventListener("keypress", function(e) {
    switch (e.code) {
        case "Numpad2":
            spelare.y += 50;
            spelare.rotation = 180;
            break;
        case "Numpad8":
            spelare.y -= 50;
            spelare.rotation = 0;
            break;
        case "Numpad4":
            spelare.x -= 50;
            spelare.rotation = 270;
            break;
        case "Numpad6":
            spelare.x += 50;
            spelare.rotation = 90;
            break;
    }
    console.log("Kolumn: " + (spelare.x - 25) / 50 + ", rad: " + (spelare.y - 25) / 50);
})