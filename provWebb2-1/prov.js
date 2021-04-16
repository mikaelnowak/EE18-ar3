const canvas = document.querySelector('canvas');
const solUpp = document.querySelector('#pilv');
const solNer = document.querySelector('#pilh');
const moln = document.querySelector('#moln');

var ctx = canvas.getContext('2d');

var summer = new Image();
summer.src = './Mikael Nowak - summer.png';

var sol = {
    y: 50,
    pic: new Image()
}
sol.pic.src = './Mikael Nowak - sun.png';

var position = 210, on = 0;

solUpp.addEventListener('click', function() {
    sol.y -= 5;
});

solNer.addEventListener('click', function() {
    sol.y += 5;
});

moln.addEventListener('click', function() {
    on = 1;
})

function animation() {
    if (on == 1) {
        position += 3;

        if (position > 700) {
            position = -150;
        }
    }

    ctx.clearRect(0, 0, canvas.width, canvas.height);

    ctx.drawImage(summer, 0, 0);
    ctx.drawImage(sol.pic, 350, sol.y, 100, 100);

    ctx.fillStyle = 'gray';
    ctx.arc(0 + position, 100, 50, 0, 2 * Math.PI);
    ctx.arc(40 + position, 100, 50, 0, 2 * Math.PI);
    ctx.arc(80 + position, 100, 50, 0, 2 * Math.PI);
    ctx.fill();

    requestAnimationFrame(animation);
}
animation();