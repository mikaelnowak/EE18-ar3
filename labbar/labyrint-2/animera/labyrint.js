// Element vi använder
const canvas = document.querySelector("canvas");
const h1 = document.querySelector("h1");

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

// Figur objektet
var figur = {
    rad: 0,     // figur.x = figurX
    kolumn: 0,     // figur.y = figurY
    poäng: 0,
    rotation: 0,
    bild: new Image()
}
figur.bild.src = "../nyckelpiga.png";

var mynt = {
    rad: 0,
    kolumn: 0,
    bild: new Image()
}
mynt.bild.src = "../Coin-icon.png";

// Rita kartan
function ritaKartan() {
    // Loopa igenom raderna
    for (var rad = 0; rad < 12; rad++) {
        
        // Loopa igenom kolumnerna
        for (var kolumn = 0; kolumn < 16; kolumn++) {

            // Om "1" rita ut en kloss
            if (karta[rad][kolumn] == 1) {
                ctx.fillRect(kolumn * 50, rad * 50, 50, 50);
            }
        }
    }
}

// Rita ut figuren
function ritaFigur() {
    ctx.save();
    ctx.translate(figur.kolumn * 50 + 25, figur.rad * 50 + 25);
    ctx.rotate(figur.rotation / 180 * Math.PI);
    ctx.drawImage(figur.bild, -25, -25, 50, 50);
    ctx.restore();
}

function ritaMynt() {
    ctx.drawImage(mynt.bild, mynt.kolumn * 50, mynt.rad * 50, 50, 50);
}

function spawnaMynt() {
    while (true) {
        mynt.rad = Math.floor(Math.random() * 12);
        mynt.kolumn = Math.floor(Math.random() * 16);

        if (karta[mynt.rad][mynt.kolumn] == 0) {
            break;
        }
    }
}

function plockaPoäng() {
    if (figur.rad == mynt.rad && figur.kolumn == mynt.kolumn) {
        figur.poäng++;
        h1.textContent = "Score: " + figur.poäng;
        spawnaMynt();
    }
}

spawnaMynt();

// Animationsloopen
function loopen() {
    // Sudda ut canvas
    ctx.clearRect(0, 0, 800, 600);

    // Rita kartan
    ritaKartan();

    // Rita figuren
    ritaFigur();

    ritaMynt();

    plockaPoäng();

    requestAnimationFrame(loopen);
}

// Starta loopen
loopen();

// Lyssna på piltangenter
window.addEventListener("keypress", function (e) {
    //console.log(e.keyCode);
    switch (e.keyCode) {
        case 115: // Pil nedåt
        if (karta[figur.rad + 1][figur.kolumn] == 0) {
            figur.rad++;
        }
            figur.rotation = 180;
            break;
        case 119: // Pil uppåt
        if (karta[figur.rad - 1][figur.kolumn] == 0) {
            figur.rad--;
        }
            figur.rotation = 0;
            break;
        case 97: // Pil vänster
        if (karta[figur.rad][figur.kolumn - 1] == 0) {
            figur.kolumn--;
        }
            figur.rotation = 270;
            break;
        case 100: // Pil höger
        if (karta[figur.rad][figur.kolumn + 1] == 0) {
            figur.kolumn++;
        }
            figur.rotation = 90;
            break;

        default:
            break;
    }
    console.log("Kolumn: " + figur.kolumn + ", rad: " + figur.rad);
})