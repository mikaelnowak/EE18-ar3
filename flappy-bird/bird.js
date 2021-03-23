const canvas = document.querySelector('canvas');
var ctx = canvas.getContext('2d');

var bird = new Image();
var bg = new Image();
var fg = new Image();
var pipeN = new Image();
var pipeS = new Image();

bird.src = './images/bird.png';
bg.src = './images/bg.png';
fg.src = './images/fg.png';
pipeN.src = './images/pipeNorth.png';
pipeS.src = './images/pipeSouth.png';

var gap = 85;
var constant = pipeN.height + gap;

var bX = 10;
var bY = 150;

var gravity = 1

var score = 0;

var fly = new Audio();
var scor = new Audio();

fly.src = './sounds/fly.mp3';
scor.src = './sounds/score.mp3';

document.addEventListener('keydown', function() {
    bY -= 20;
    fly.play();
});

var pipe = [];

pipe[0] = {
    x: canvas.width,
    y: 0
}

function animation() {
    ctx.clearRect(0, 0, canvas.width, canvas. height);

    ctx.drawImage(bg, 0, 0);

    for (let i = 0; i < pipe.length; i++) {
        ctx.drawImage(pipeN, pipe[i].x, pipe[i].y);
        ctx.drawImage(pipeS, pipe[i].x, pipe[i].y + constant);

        pipe[i].x--;

        if (pipe[i].x == 125) {
            pipe.push({
                x: canvas.width,
                y: Math.floor(Math.random() * pipeN.height) - pipeN.height
            });
        }

        if (bX + bird.width >= pipe[i].x && bX <= pipe[i].x + pipeN.width && (bY <= pipe[i].y + pipeN.height || bY+bird.height >= pipe[i].y+constant) || bY + bird.height >= canvas.height - fg.height) {
            location.reload();
        }

        if (pipe[i].x == 5) {
            score++;
            scor.play();
        }
    }

    ctx.drawImage(fg, 0, canvas.height - fg.height);

    ctx.drawImage(bird, bX, bY);

    bY += gravity;

    ctx.fillStyle = "#000";
    ctx.font = "20px Verdana";
    ctx.fillText("Score : " + score, 10, canvas.height - 20);

    requestAnimationFrame(animation);
}

animation();