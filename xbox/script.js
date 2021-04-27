const canvas = document.querySelector("canvas");

canvas.width = 800;
canvas.height = 600;

var ctx = canvas.getContext("2d");

var size = 25, speed = 5;

var p1 = {
    x: canvas.width / 2 - 100,
    y: canvas.height / 2 - size / 2,
    color: "#f00"
}

var p2 = {
    x: canvas.width / 2,
    y: canvas.height / 2 - size / 2,
    color: "#00f"
}

var p3 = {
    x: canvas.width / 2 + 100,
    y: canvas.height / 2 - size / 2,
    color: "#0f0"
}

function positionDraw(player) {
    ctx.fillStyle = player.color;
    ctx.fillRect(player.x, player.y, size, size);
    ctx.fill();
}

function loop() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    positionDraw(p1);
    positionDraw(p2);
    positionDraw(p3);

    requestAnimationFrame(loop);
}
loop();

document.addEventListener('keydown', function(e) {
    console.log(e.keyCode);
    
    switch (e.keyCode) {
        case 87:
            p1.y -= speed;
            break;
        case 68:
            p1.x += speed;
            break;
        case 83:
            p1.y += speed;
            break;
        case 65:
            p1.x -= speed;
            break;
    }
})

document.addEventListener("gamepadButtonDown", (e) => {

})