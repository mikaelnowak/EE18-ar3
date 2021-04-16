const canvas = document.querySelector('canvas');

var ctx = canvas.getContext('2d');

canvas.width = 800;
canvas.height = 600;

var bird = {
    x: 300,
    y: 400,
    width: 50,
    height: 50,
    movement: 5,
    pic: new Image()
};
bird.pic.src = './bird.png';

var hinder = {
    x: Math.random() * canvas.width - 50,
    y: Math.random() * canvas.height - 50
}

function animation() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    ctx.drawImage(bird.pic, bird.x, bird.y, bird.width, bird.height);

    ctx.fillRect(hinder.x, hinder.y, 50, 50);

    requestAnimationFrame(animation);
}
animation();

window.addEventListener('keydown', function(e) {
    console.log(e.keyCode);
    switch (e.keyCode) {
        case 87:
            if (bird.y - bird.movement > 0) {
                if (bird.y > hinder.y + 50) {
                    bird.y -= bird.movement
                } 
            }
            break;

        case 68:
            if (bird.x + bird.width + bird.movement < canvas.width) {
                if (hinder.y > bird.y + bird.width && angry.y > hinder.y + 50) {
                    if (bird.x < hinder.x - bird.width) {
                        bird.x += bird.movement
                    }
                }
            }
            break;

        case 83:
            if (bird.y + bird.height + bird.movement < canvas.height) {
                if (bird.y < hinder.y - bird.height) {
                    bird.y += bird.movement
                }
            }
            break;

        case 65:
            if (bird.x - bird.movement > 0) {
                if (bird.x > hinder.x + 50) {
                    bird.x -= bird.movement
                }
            }
            break;
    }
    console.log(bird.x, bird.y, hinder.x, hinder.y);
});