const eCanvas = document.querySelector('canvas');

var ctx = eCanvas.getContext('2d');

var bild = new Image();
bild.src = './Ph03nyx-Super-Mario-Retro-Mario-2.ico';
var bild2 = new Image();
bild2.src = './Ph03nyx-Super-Mario-Mushroom-1UP.ico';

var x = 0, y = 0, x2 = 1, y2 = 600;

function loopen() {
    ctx.clearRect(0, 0, 800, 600);
    ctx.drawImage(bild, x, y);
    ctx.drawImage(bild2, x2, y2);
    x += 5;
    y++;
    x2 *= 1.1;
    y2 *= 0.95;
    requestAnimationFrame(loopen);
}
loopen();