const eCanvas = document.querySelector('canvas');

var ctx = eCanvas.getContext('2d');

var rocket = new Image();
rocket.src = './Iconsmind-Outline-Rocket.ico';
var flame = new Image();
flame.src = './Bogo-D-Kingdom-Flames-Defender.ico';

var x = 200, y = 300, dy = 1, x2 = 310, y2 = 500;

function loopen() {
    ctx.clearRect(0, 0, 800, 600);
    ctx.drawImage(rocket, x, y);
    ctx.drawImage(flame, x2, y2);
    dy *= 1.1;
    y -= dy;
    y2 -= dy;
    console.log(y);
    requestAnimationFrame(loopen);
}
loopen();