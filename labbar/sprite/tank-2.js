/*****************************************/
/*             Inställningar             */
/*****************************************/
// Hitta element på sidan
const canvas = document.querySelector("canvas");

// Ställ in storlek på canvas
canvas.width = 800;
canvas.height = 600;

// Starta canvas rit-api
var ctx = canvas.getContext("2d");

/*****************************************/
/*          Innan loopen startar         */
/*****************************************/
// Ladda in grafiken
var tank = {
    x: 100,
    y: 100,
    a: 0,
    rutor: [1, 2, 3, 4, 5, 6, 7, 8],
    index: 0,
    kör: false,
    pic: new Image()
}
tank.pic.src = "./bilder/tank-sheet.png";

// Hur lång tid varje ruta får (1/60")
var explotionRutor = [17, 18, 19];
var j = 0;

// För att rita ut tank-figuren
function ritaTank() {
    // Rita en ruta
    var x = Math.floor(tank.rutor[Math.floor(tank.index)] % 8) * 32;
    var y = Math.floor(tank.rutor[Math.floor(tank.index)] / 8) * 32;

    ctx.save();
    ctx.translate(tank.x, tank.y);
    ctx.rotate(tank.a * Math.PI);
    ctx.drawImage(tank.pic, x, y, 32, 32, -16, -16, 32, 32);
    ctx.restore();

    if (tank.kör) {
        tank.index += 0.2;
    }

    if (tank.index > tank.rutor.length) {
        tank.index = 0;
    }
}

function ritaexplotion() {
    var x = Math.floor(explotionRutor[Math.floor(j)] % 8) * 32;
    var y = Math.floor(explotionRutor[Math.floor(j)] / 8) * 32;
    ctx.drawImage(tank.pic, x, y, 32, 32, 200, 200, 32, 32);

    // Hoppa till nästa ruta
    j += 0.01;
    if (j > explotionRutor.length) {
        j = 0;
    }
}

/*****************************************/
/*          Animationsloopen             */
/*****************************************/
function loopen() {
    ctx.clearRect(0, 0, 800, 600);

    ritaTank();
    ritaexplotion();
    
    requestAnimationFrame(loopen);
}
loopen();

window.addEventListener("keypress", function(e) {
    tank.kör = true;

    switch (e.keyCode) {
        case 115: // Pil nedåt
            tank.y += 5;
            tank.a = 1;
            break;
        case 119: // Pil uppåt
            tank.y -= 5;
            tank.a = 0;
            break;
        case 97: // Pil vänster
            tank.x -= 5;
            tank.a = 1.5;
            break;
        case 100: // Pil höger
            tank.x += 5;
            tank.a = .5;
            break;
    }
});

window.addEventListener("keyup", function() {
    tank.kör = false;
});