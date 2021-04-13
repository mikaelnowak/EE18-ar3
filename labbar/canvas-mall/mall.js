/****************/
/* Inställnigar */
/****************/
const canvas = document.querySelector('canvas');

canvas.width = 800;
canvas.height = 600;

var ctx = canvas.getContext('2d');

/*********************/
/* Globala variabler */
/*********************/
var karta = [
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1],
    [1, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1],
    [1, 0, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1],
    [1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1],
    [1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
]

/**********/
/* Objekt */
/**********/
var piga = {

}

var monster = {

}

/********************/
/* Animationsloopen */
/********************/

function loop() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    requestAnimationFrame(loop);
}

loop();

/**************/
/* Funktioner */
/**************/
function ritapiga() {
    ctx.drawImage(piga.pic, piga.x, piga.y, 50, 50)
}

/***************/
/* Interaktion */
/***************/
window.addEventListener('keypress', function(e) {
    console.log(e.codew);
    switch (e.code) {
        case 'KeyW':
            
            break;
        case 'KeyS':
                
            break;
        case 'KeyD':
        
            break;
        case 'KeyA':
        
        break;
    }
})