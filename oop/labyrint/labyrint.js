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

// spelare objektet
var spelare = {
    x: 25,     // spelare.x = spelareX
    y: 25,     // spelare.y = spelareY
    rotation: 0,
    pic: new Image()
}
spelare.pic.src = "./pics/nyckelpiga.png";

var mynt = {
    x: 1,
    y: 1,
    pic: new Image()
}
mynt.pic.src = "./pics/Coin-icon.png";

var monster = {
    x: 1,
    y: 1,
    pic: new Image()
}
monster.pic.src = "./pics/Zombie-icon.png";

// Rita kartan
function ritaKartan() {
    // Loopa igenom raderna
    for (var j = 0; j < 12; j++) {
        
        // Loopa igenom kolumnerna
        for (var i = 0; i < 16; i++) {

            // Om "1" rita ut en kloss
            var x = i * 50;
            var y = j * 50;
            if (karta[j][i] == 1) {
                ctx.fillRect(x, y, 50, 50);
            }
        }
    }
}

// Rita ut spelareen
function ritaSpelare() {
    ctx.save();
    ctx.translate(spelare.x, spelare.y);
    ctx.rotate(spelare.rotation / 180 * Math.PI);
    ctx.drawImage(spelare.pic, -25, -25, 50, 50);
    ctx.restore();
}

function ritaMynt() {
    ctx.drawImage(mynt.pic, mynt.x * 50, mynt.y * 50, 50, 50);
}

function ritaMonster() {
    ctx.drawImage(monster.pic, monster.x * 50, monster.y * 50, 50, 50);
}

// Animationsloopen
function loopen() {
    // Sudda ut canvas
    ctx.clearRect(0, 0, 800, 600);

    ritaKartan();
    ritaSpelare();
    ritaMynt();
    ritaMonster();

    requestAnimationFrame(loopen);
}

// Starta loopen
loopen();

// Lyssna på piltangenter
window.addEventListener("keypress", function (e) {
    switch (e.code) {
        case "Numpad2": // Pil nedåt
            spelare.y += 50;
            spelare.rotation = 180;
            break;
        case "Numpad8": // Pil uppåt
            spelare.y -= 50;
            spelare.rotation = 0;
            break;
        case "Numpad4": // Pil vänster
            spelare.x -= 50;
            spelare.rotation = 270;
            break;
        case "Numpad6": // Pil höger
            spelare.x += 50;
            spelare.rotation = 90;
            break;

        default:
            break;
    }
    console.log("Kolumn: " + (spelare.x - 25) / 50 + ", rad: " + (spelare.y - 25) / 50);
})