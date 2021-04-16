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
var airplane = {
    x: 100,
    y: 100,
    a: 0,
    rutor: [0, 1, 2],
    index: 0,
    kör: false,
    pic: new Image()
}
airplane.pic.src = "./spritelib-gpl/shooter/1945.png";

// För att rita ut airplane-figuren
function ritaairplane() {
    // Rita en ruta
    var x = Math.floor(airplane.rutor[Math.floor(airplane.index)] % 8) * 64;

    ctx.save();
    ctx.translate(airplane.x, airplane.y);
    ctx.rotate(airplane.a * Math.PI);
    ctx.drawImage(airplane.pic, x + 5 + Math.floor(airplane.index) * 2, 400, 64, 64, -32, -32, 64, 64);
    ctx.restore();

    if (airplane.kör) {
        airplane.index += 0.1;
    }

    if (airplane.index > airplane.rutor.length) {
        airplane.index = 0;
    }
}
/*****************************************/
/*          Animationsloopen             */
/*****************************************/
function loopen() {
    ctx.clearRect(0, 0, 800, 600);

    ritaairplane();
    
    requestAnimationFrame(loopen);
}
loopen();

window.addEventListener("keypress", function(e) {
    airplane.kör = true;

    switch (e.keyCode) {
        case 115: // Pil nedåt
            airplane.y += 5;
            airplane.a = 1;
            break;
        case 119: // Pil uppåt
            airplane.y -= 5;
            airplane.a = 0;
            break;
        case 97: // Pil vänster
            airplane.x -= 5;
            airplane.a = 1.5;
            break;
        case 100: // Pil höger
            airplane.x += 5;
            airplane.a = .5;
            break;
    }
});

window.addEventListener("keyup", function() {
    airplane.kör = false;
});