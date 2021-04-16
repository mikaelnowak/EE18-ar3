const canvas = document.querySelector('canvas');
const score = document.querySelector('h1');

canvas.width = 800;
canvas.height = 600;

var ctx = canvas.getContext('2d');

var player1 = new Image();
player1.src = './bilder/Chanut-Role-Playing-Werewolf.ico';

var player2 = new Image();
player2.src = './bilder/Chanut-Role-Playing-Villager (1).ico';

var player1X = 0, player1Y = 0, player1Width = 100, player1Height = 100;
var player2X = 700 * Math.random(), player2Y = 500  * Math.random(), player2Width = 100, player2Height = 100;
var movement = 10, points = 0;

var size = Math.random() * 50, rectX = 700 * Math.random(), rectY = 500  * Math.random();
console.log(rectX, rectY, size);
ctx.beginPath();
ctx.fillRect(rectX, rectY, size, size);

window.addEventListener('keydown', function(e) {
    //console.log(e.keyCode);

    switch (e.keyCode) {
        case 87:
            if (player1Y > 0) {
                console.log(player1Y);
                player1Y -= movement;
            }
            break;

        case 68:
            if (player1X + player1Width < 800) {
                console.log(player1X);
                player1X += movement;
            }
            break;

        case 83:
            if (player1Y + player1Height < 600) {
                console.log(player1Y);
                player1Y += movement;
            }
            break;

        case 65:
            if (player1X > 0) {
                console.log(player1X);
                player1X -= movement;
            }
            break;
    }
});

/* canvas.addEventListener('mousemove', function(e) {
    console.log(e.offsetX, e.offsetY);
    
}); */

function loopen() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    ctx.drawImage(player1, player1X, player1Y, 100, 100);
    ctx.drawImage(player2, player2X, player2Y, 100, 100);

    var d = Math.sqrt((player1Y - player2Y)**2 + (player1X - player2X)**2);

    if (d < 100) {
        player2X = 700 * Math.random();
        player2Y = 500  * Math.random();

        points++;
        score.textContent = 'Score: ' + points;
    }

    requestAnimationFrame(loopen);
}
loopen();