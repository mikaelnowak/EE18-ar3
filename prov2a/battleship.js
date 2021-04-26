//Hitta och göra så att canvas fungerar
const canvas = document.querySelector('canvas');

var ctx = canvas.getContext('2d');
canvas.width = 1100;
canvas.height = 550;

//Globala variablar
var player = {
    row: 25,
    col: 575,
    size: 50
}

var ship1 = {
    x: 0,
    y: 0
}

var ship2 = {
    x: 0,
    y: 0
}

var ship3 = {
    x: 0,
    y: 0
}

var ship4 = {
    x: 0,
    y: 0
}

var ship5 = {
    x: 0,
    y: 0
}

//Rita karta function
function map(topleft) {
    for (var row = 0; row < 10; row++) {
        for (var col = 0; col < 10; col++) {
            ctx.strokeRect(row * 50 + topleft, col * 50 + 25, 50, 50);
            ctx.stroke();
            console.log(row, col);
        }
    }
}

//Rita ut markören
function drawPlayer() {
    ctx.fillStyle = 'pink';
    ctx.fillRect(player.col, player.row, player.size, player.size);
    ctx.fill();
}

//Rita datorns båtar
function drawShip(ship) {
    ctx.fillStyle = 'red';
    ctx.fillRect(ship.x + 575, ship.y + 25, 30, 30);
    ctx.fill();
}

//Slump functionen
function randomSpawn(ship) {
    ship.x = Math.floor(Math.random() * 10) * 50 + 10;
    ship.y = Math.floor(Math.random() * 10) * 50 + 10;
}

//Slumpa alla båtar
randomSpawn(ship1);
randomSpawn(ship2);
randomSpawn(ship3);
randomSpawn(ship4);
randomSpawn(ship5);

//loopen
function loop() {
    //Sudda canvas
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    //Hårdkoda båtar
    ctx.fillStyle = "#000";
    ctx.fillRect(435, 35, 30, 30);
    ctx.fillRect(35, 235, 30, 30);
    ctx.fillRect(235, 335, 30, 30);
    ctx.fillRect(285, 335, 30, 30);
    ctx.fillRect(35, 385, 30, 30);
    ctx.fill();

    //Rita spelarens karta
    map(25);

    //Rita datorns karta
    drawPlayer();
    map(575);
    drawShip(ship1);
    drawShip(ship2);
    drawShip(ship3);
    drawShip(ship4);
    drawShip(ship5);

    //Repetera loopen
    requestAnimationFrame(loop);
}

//Få loopen att fungera
loop();

//Flytta på markören
window.addEventListener("keypress", function (e) {
    //console.log(e.keyCode);
    switch (e.keyCode) {
        case 115: // Pil nedåt
            if (player.row + player.size < 525) {
                player.row += player.size;
            }
            break;
        case 119: // Pil uppåt
            if (player.row - player.size > 0) {
                player.row -= player.size;
            }
            break;
        case 97: // Pil vänster
            if (player.col - player.size > 525) {
            player.col -= player.size;
            }
            break;
        case 100: // Pil höger
            if (player.col + player.size < 1050) {
                player.col += player.size;
            }
            break;

        default:
            break;
    }
})