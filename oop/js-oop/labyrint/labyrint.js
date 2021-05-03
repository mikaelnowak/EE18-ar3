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

var spelare = {
    x: 25,
    y: 25,
    rotation: 0,
    pic: new Image(),
    draw() {
        ctx.save();
        ctx.translate(this.x, this.y);
        ctx.rotate(this.rotation / 180 * Math.PI);
        ctx.drawImage(this.pic, -25, -25, 50, 50);
        ctx.restore();
    }
}
var mynt1 = {
    x: 1,
    y: 1,
    pic: new Image(),
    draw() {
        ctx.drawImage(this.pic, this.x * 50, this.y * 50, 50, 50);
    }
}
var mynt2 = {
    x: 1,
    y: 2,
    pic: new Image(),
    draw() {
        ctx.drawImage(this.pic, this.x * 50, this.y * 50, 50, 50);
    }
}
var mynt3 = {
    x: 1,
    y: 3,
    pic: new Image(),
    draw() {
        ctx.drawImage(this.pic, this.x * 50, this.y * 50, 50, 50);
    }
}
var monster1 = {
    x: 1,
    y: 1,
    pic: new Image(),
    draw() {
        ctx.drawImage(this.pic, this.x * 50, this.y * 50, 50, 50);
    }
}
var monster2 = {
    x: 1,
    y: 2,
    pic: new Image(),
    draw() {
        ctx.drawImage(this.pic, this.x * 50, this.y * 50, 50, 50);
    }
}
spelare.pic.src = "./pics/nyckelpiga.png";
mynt1.pic.src = "./pics/Coin-icon.png";
mynt2.pic.src = "./pics/Coin-icon.png";
mynt3.pic.src = "./pics/Coin-icon.png";
monster1.pic.src = "./pics/Zombie-icon.png";
monster2.pic.src = "./pics/Zombie-icon.png";

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
    mynt1.draw();
    mynt2.draw();
    mynt3.draw();
    monster1.draw();
    monster2.draw();

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