//Find canvas
const canvas = document.querySelector('canvas');

//Canvas
var ctx = canvas.getContext('2d');

//Variables
var radius = 100,
x = 200,
y = 200,
dy = 5;

function ball() {
    //Draw
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.beginPath();
    ctx.lineWidth = '5';
    ctx.arc(x, y, 100, 0, 2 * Math.PI);
    ctx.stroke();

    dy++;
    y += dy;

    //Ground colision
    if (y + radius > canvas.height || y - radius < 0) {
        dy *= 0.8;
        dy = -dy;
        console.log(dy);
    }
    
}

//Animation loop
function animation() {
    ball();

    requestAnimationFrame(animation);
}
animation();