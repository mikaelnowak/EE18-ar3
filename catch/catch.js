//Canvas
const eCanvas = document.querySelector('canvas');
var canvas = eCanvas.getContext('2d');

eCanvas.width = '800';
eCanvas.height = '800';

//Variables
var dimention = 50;

let right = false,
left = false,
up = false,
down = false;

//Images
var stump = {
    x: Math.random() * eCanvas.width - dimention,
    y: Math.random() * eCanvas.height - dimention,
    width: dimention,
    height: dimention,
    pic: new Image()
}
stump.pic.src = './photos/GuHUfOOpiU.png';

var player = {
    width: 50,
    height: 50,
    x: eCanvas.width / 2 - dimention / 2,
    y: eCanvas.height / 2 - dimention / 2,
    dx: 5,
    dy: 5,
    pic: new Image()
}
player.pic.src = './photos/knight-front.png';

var apple = {
    pic: new Image(),
}
apple.pic.src = './photos/apple.png';

//Move player
function movement() {
    document.addEventListener('keydown', function(e){
        if (e.keyCode == 68) {
            right = true;
        } else if (e.keyCode == 65) {
            left = true;
        } else if (e.keyCode == 87) {
            up = true;
        } else if (e.keyCode == 83) {
            down = true;
        };
    });
    
    //No press (No movement)
    document.addEventListener('keyup', function(e){
        if (e.keyCode == 68) {
            right = false;
        } else if (e.keyCode == 65) {
            left = false;
        } else if (e.keyCode == 87) {
            up = false;
        } else if (e.keyCode == 83) {
            down = false;
        };
    });

    if (right && down && player.x + player.width < eCanvas.width && player.y + player.height < eCanvas.height) {
        player.x += player.dx;
        player.y += player.dy;
    } else if (down && left && player.y + player.height < eCanvas.height && player.x > 0) {
        player.y += player.dy;
        player.x -= player.dx;
    } else if (left && up && player.x > 0 && player.y > 0) {
        player.y -= player.dy;
        player.x -= player.dx;
    } else if (up && right && player.y > 0 && player.x + player.width < eCanvas.width) {
        player.y -= player.dy;
        player.x += player.dx;
    } else if (right && player.x + player.width < eCanvas.width) {
        player.x += player.dx;
    } else if (left && player.x > 0) {
        player.x -= player.dx;
    } else if (up && player.y > 0) {
        player.y -= player.dy;
    } else if (down && player.y + player.height < eCanvas.height) {
        player.y += player.dy;
    };
}

//Random stump spot


//loop
function loop() {
    canvas.clearRect(0, 0, 800, 800);

    canvas.drawImage(player.pic, player.x, player.y, player.width, player.height);
    //console.log(player.x, player.y, player.width, player.height);
    movement();

    requestAnimationFrame(loop);
};
loop();