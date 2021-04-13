/****************/
/* Inställnigar */
/****************/
const canvas = document.querySelector('canvas');
const h1 = document.querySelector('h1');

canvas.width = 800;
canvas.height = 600;

var ctx = canvas.getContext('2d');

/*********************/
/* Globala variabler */
/*********************/
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
]

var coins = 0;

/**********/
/* Objekt */
/**********/
var piga = {
    rad: 0,     // figur.x = figurX
    kolumn: 0,     // figur.y = figurY
    poäng: 0,
    rotation: 0,
    poäng: 0,
    pic: new Image()
}
piga.pic.src = "./pics/nyckelpiga.png";

var mynt1 = {
    rad: 0,
    kolumn: 0,
    pic: new Image()
}
mynt1.pic.src = "./pics/Coin-icon.png";

var mynt2 = {
    rad: 0,
    kolumn: 0,
    pic: new Image()
}
mynt2.pic.src = "./pics/Coin-icon.png";

var zombie = {
    rad: 0,
    kolumn: 0,
    pic: new Image()
}
zombie.pic.src = "./pics/Zombie-icon.png";

/**************/
/* Funktioner */
/**************/
function ritapiga() {
    ctx.drawImage(piga.pic, piga.x, piga.y, 50, 50)
}

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

function ritaPiga() {
    ctx.save();
    ctx.translate(piga.kolumn * 50 + 25, piga.rad * 50 + 25);
    ctx.rotate(piga.rotation * Math.PI);
    ctx.drawImage(piga.pic, -25, -25, 50, 50);
    ctx.restore();
}

function ritaZombie() {
    ctx.drawImage(zombie.pic, zombie.kolumn * 50, zombie.rad * 50, 50, 50);
}

function ritaMynt(mynt) {
    ctx.drawImage(mynt.pic, mynt.kolumn * 50, mynt.rad * 50, 50, 50);
}

function spawna(obj) {
    while (true) {
        obj.rad = Math.floor(Math.random() * 12);
        obj.kolumn = Math.floor(Math.random() * 16);

        if (karta[obj.rad][obj.kolumn] == 0) {
            break;
        }
    }
}

function plockaPoäng(mynt) {
    if (piga.rad == mynt.rad && piga.kolumn == mynt.kolumn) {
        piga.poäng++;
        h1.textContent = "Score: " + piga.poäng;
        spawna(mynt);
    }
}

spawna(zombie);
spawna(mynt1);
spawna(mynt2);

/********************/
/* Animationsloopen */
/********************/

function loop() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    ritaKartan();
    ritaPiga();
    ritaZombie();

    ritaMynt(mynt1);
    ritaMynt(mynt2);

    plockaPoäng(mynt1);
    plockaPoäng(mynt2);

    requestAnimationFrame(loop);
}

loop();

/***************/
/* Interaktion */
/***************/
window.addEventListener("keypress", function (e) {
    //console.log(e.keyCode);
    switch (e.keyCode) {
        case 115: // Pil nedåt
        if (karta[piga.rad + 1][piga.kolumn] == 0) {
            piga.rad++;
        }
            piga.rotation = 1;
            break;
        case 119: // Pil uppåt
        if (karta[piga.rad - 1][piga.kolumn] == 0) {
            piga.rad--;
        }
            piga.rotation = 0;
            break;
        case 97: // Pil vänster
        if (karta[piga.rad][piga.kolumn - 1] == 0) {
            piga.kolumn--;
        }
            piga.rotation = 1.5;
            break;
        case 100: // Pil höger
        if (karta[piga.rad][piga.kolumn + 1] == 0) {
            piga.kolumn++;
        }
            piga.rotation = 0.5;
            break;

        default:
            break;
    }
    console.log("Kolumn: " + piga.kolumn + ", rad: " + piga.rad);
})