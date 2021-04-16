const eCanvas = document.querySelector('canvas');

var ctx = eCanvas.getContext('2d');

ctx.fillStyle = 'lightgreen';
ctx.fillRect(300, 250, 200, 100);
ctx.strokeStyle = 'green';
ctx.lineWidth = '8';
ctx.strokeRect(250, 200, 300, 200);

var bild = new Image();
bild.src = './Ph03nyx-Super-Mario-Retro-Mario-2.ico';
bild.addEventListener('load', function() {
    ctx.drawImage(bild, 200, 200);
});
