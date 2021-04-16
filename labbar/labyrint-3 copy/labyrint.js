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
    [33,33,33,33,33,33,33,33,33,33,33,33,33,33,33,33,
    33,33,33,33,33,69,33,33,33,39,40,41,52,33,33,33,
    33,33,50,33,33,33,69,33,33,55,56,57,33,33,33,33,
    33,33,33,33,33,33,33,33,52,55,56,57,33,50,33,33,
    33,33,33,33,33,33,33,33,33,55,56,70,40,41,33,33,
    33,33,50,33,33,33,33,50,69,55,56,56,56,57,33,33,
    52,33,33,38,69,33,33,38,33,71,72,72,72,73,33,33,
    52,33,33,33,33,33,33,33,33,52,52,52,33,33,33,33,
    52,33,50,33,33,33,33,33,50,33,33,33,52,33,33,33,
    33,33,69,52,33,38,50,33,33,33,33,50,33,33,33,33,
    33,33,33,33,52,33,33,33,33,33,33,33,33,33,33,52,
    33,33,33,33,33,33,33,33,33,69,33,33,33,33,52,52],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,
    0,0,0,0,129,130,0,0,0,0,0,0,0,0,0,0,
    0,0,0,0,145,147,130,0,0,0,0,0,0,0,0,0,
    39,40,40,40,41,145,146,0,0,0,0,0,0,0,0,0,
    55,42,58,56,57,0,0,0,0,0,123,0,0,0,0,0,
    55,70,54,56,57,0,0,0,0,0,0,0,0,0,0,0,
    55,56,56,56,57,0,0,0,0,0,0,0,0,0,0,0,
    71,72,72,72,73,0,0,0,0,0,0,0,0,0,0,0,
    0,60,0,0,0,0,0,0,0,47,47,113,0,0,0,0,
    149,150,151,0,0,0,0,0,0,63,63,88,89,0,0,0,
    165,43,167,0,0,0,0,0,0,0,0,0,0,0,0,0,
    181,182,183,0,0,0,0,0,0,0,0,0,0,0,0,0]
]

var gubbe = {
    x: 100,
    y: 100,
    rutor: [0, 1, 2, 3],
    level: 0,
    index: 0,
    kör: false,
    pic: new Image()
}

gubbe.pic.src = "./pics/gubbe.png";

var kartbild = new Image();
kartbild.src = "./pics/forest_tiles.png";

function ritaLager(lager) {
    var index = 0;

    for (var rad = 0; rad < 12; rad++) {
        for (var kol = 0; kol < 16; kol++) {
            console.log(rad, kol);
            //ctx.strokeRect(kol * 32, rad * 32, 32, 32);
            //ctx.stroke();

            var x = Math.floor(karta[lager][index] % 16 - 1) * 32;
            var y = Math.floor(karta[lager][index] / 16 - 2) * 32;

            ctx.drawImage(kartbild, x, y, 32, 32, kol * 32, rad * 32, 32 ,32);

            index++;
        }
    }
}

function ritaGubbe() {
    // Rita en ruta
    var x = Math.floor(gubbe.rutor[Math.floor(gubbe.index)] % 8) * 68;

    ctx.save();
    ctx.translate(gubbe.x, gubbe.y);
    ctx.drawImage(gubbe.pic, x, gubbe.level * 72, 72, 72, -36, -36, 64, 64);
    ctx.restore();

    if (gubbe.kör) {
        gubbe.index += 0.1;
    }

    if (gubbe.index > gubbe.rutor.length) {
        gubbe.index = 0;
    }
}

/********************/
/* Animationsloopen */
/********************/

function loop() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    ritaLager(0);
    ritaLager(1);

    ritaGubbe();

    requestAnimationFrame(loop);
}
loop();

window.addEventListener("keypress", function(e) {
    gubbe.kör = true;

    switch (e.keyCode) {
        case 115: // Pil nedåt
            gubbe.y += 5;
            gubbe.level = 0
            break;
        case 119: // Pil uppåt
            gubbe.y -= 5;
            gubbe.level = 3;
            break;
        case 97: // Pil vänster
            gubbe.x -= 5;
            gubbe.level = 1;
            break;
        case 100: // Pil höger
            gubbe.x += 5;
            gubbe.level = 2;
            break;
    }
});

window.addEventListener("keyup", function() {
    gubbe.kör = false;
});