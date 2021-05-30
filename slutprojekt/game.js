const canvas = document.querySelector('canvas');

const displayWood = document.getElementById('woodAmount');
const displayStone = document.getElementById('stoneAmount');
const displayPlant = document.getElementById('plantAmount');

const buyWoodUpgrade = document.getElementById('wood');
const buyStoneUpgrade = document.getElementById('stone');
const buyPlantUpgrade = document.getElementById('plant');
const buySpeedUpgrade = document.getElementById('speed');

const woodCost = document.getElementById('woodCost');
const stoneCost = document.getElementById('stoneCost');
const plantCost = document.getElementById('plantCost');

const speedWoodCost = document.getElementById('speedWoodCost');
const speedStoneCost = document.getElementById('speedStoneCost');
const speedPlantCost = document.getElementById('speedPlantCost');

var ctx = canvas.getContext('2d');

canvas.width = 600;
canvas.height = 600;

var recources = {
    map: [304,305,305,305,305,305,305,305,305,305,305,306,
    340,341,341,341,341,341,341,341,341,341,341,342,
    340,341,341,341,341,341,341,341,341,341,341,342,
    340,341,341,341,341,341,341,341,341,341,341,342,
    340,341,341,341,341,341,341,341,341,341,341,342,
    340,341,341,341,341,341,341,341,341,341,341,342,
    340,341,341,341,341,341,341,341,341,341,341,342,
    340,341,341,341,341,341,341,341,341,341,341,342,
    340,341,341,341,341,341,341,341,341,341,341,342,
    340,341,341,341,341,341,341,341,341,341,341,342,
    340,341,341,341,341,341,341,341,341,341,341,342,
    376,377,377,377,377,377,377,377,377,377,377,378],
    sprite: new Image()
}

var player = {
    index: 0,
    x: canvas.width / 2,
    y: canvas.height / 2,
    level: 0,
    speed: 3,
    speedUpgrade: 1,
    animate: false,
    pic: new Image(),
    sections: [0, 1, 2, 3]
}

var wood = {
    amount: 0,
    upgrade: 1,
    x: 0,
    y: 0,
    pic: 830 
}

var stone = {
    amount: 0,
    upgrade: 1,
    x: 0,
    y: 0,
    pic: 246
}
var plant = {
    amount: 0,
    upgrade: 1,
    x: 0,
    y: 0,
    pic: 876
}

recources.sprite.src = './pictures/terrain-sprite.png';
player.pic.src = "./pictures/player-model-sprite.png";

function showLayer() {
    var index = 0;

    for (var row = 0; row < 12; row++) {
        for (var col = 0; col < 12; col++) {
            var x = Math.floor(recources.map[index] % 36 - 1) * 32;
            var y = Math.floor(recources.map[index] / 32 - 1) * 32;

            ctx.drawImage(recources.sprite, x, y, 32, 32, col * 50, row * 50, 50, 50);

            index++;
        }
    }
}

function showPlayer() {
    // Rita en ruta
    var x = Math.floor(player.sections[Math.floor(player.index)] % 4) * 64;

    ctx.save();
    ctx.translate(player.x, player.y);
    ctx.drawImage(player.pic, x, player.level * 64, 64, 64, -25, -25, 50, 50);
    ctx.restore();

    if (player.animate) {
        player.index += 0.1;
    }

    if (player.index > player.sections.length) {
        player.index = 0;
    }
}

function showItem(item) {
    var x = Math.floor(item.pic % 36 - 1) * 32;
    var y = Math.floor(item.pic / 32 - 1) * 32;

    ctx.drawImage(recources.sprite, x, y, 32, 32, item.x - 25, item.y - 25, 50, 50);
}

function spawnaItem(item) {
    while (true) {
        item.x = Math.floor(Math.random() * 500) + 50;
        item.y = Math.floor(Math.random() * 500) + 50;

        var distance = Math.sqrt((player.y - item.y)**2 + (player.x - item.x)**2);

        if (distance > 25) {
            break;
        }
    }
}

function collectItem(item) {
    var distance = Math.sqrt((player.y - item.y)**2 + (player.x - item.x)**2);

    if (distance < 25) {
        item.amount += item.upgrade;
        console.log(item.amount);
        updateItemAmount();
        spawnaItem(item);
    }
}

function updateItemAmount() {
    displayWood.textContent = wood.amount;
    displayStone.textContent = stone.amount;
    displayPlant.textContent = plant.amount;
}

// Run functions before loop
spawnaItem(wood);
spawnaItem(stone);
spawnaItem(plant);
updateItemAmount();

function loop() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    showLayer();

    showItem(wood);
    showItem(stone);
    showItem(plant);

    collectItem(wood);
    collectItem(stone);
    collectItem(plant);

    showPlayer();

    requestAnimationFrame(loop);
}

loop();

window.addEventListener("keypress", function(e) {
    player.animate = true;

    // Move the player
    switch (e.keyCode) {
        case 115:
            if (player.y + 25 + player.speed * player.speedUpgrade < canvas.height - 40) {
                player.y += player.speed * player.speedUpgrade;
                player.level = 0
            }
            break;
        case 119:
            if (player.y - 25 - player.speed * player.speedUpgrade > 10) {
                player.y -= player.speed * player.speedUpgrade;
                player.level = 3;
            }
            break;
        case 97: 
            if (player.x - 25 - player.speed * player.speedUpgrade > 25) {
                player.x -= player.speed * player.speedUpgrade;
                player.level = 1;
            }
            break;
        case 100:
            if (player.x + 25 + player.speed * player.speedUpgrade < canvas.width - 35) {
                player.x += player.speed * player.speedUpgrade + player.speedUpgrade;
                player.level = 2;
            }
            break;
    }
});

window.addEventListener("keyup", function() {
    player.animate = false;
    player.index = 0;
});

buyWoodUpgrade.addEventListener('click', function() {
    if (wood.amount >= 3 * wood.upgrade) {
        wood.amount -= 3 * wood.upgrade;
        wood.upgrade++;
        displayWood.textContent = wood.amount;
        woodCost.textContent = wood.upgrade * 3 + ' wood';
    }
});

buyStoneUpgrade.addEventListener('click', function() {
    if (stone.amount >= 3 * stone.upgrade) {
        stone.amount -= 3 * stone.upgrade;
        stone.upgrade++;
        displayStone.textContent = stone.amount;
        stoneCost.textContent = stone.upgrade * 3 + ' wood';
    }
});

buyPlantUpgrade.addEventListener('click', function() {
    if (plant.amoun >= 3 * player.speed) {
        plant.amount -= 3 * plant.upgrade;
        plant.upgrade++;
        displayPlant.textContent = plant.amount;
        plantCost.textContent = plant.upgrade * 3 + ' wood';
    }
});

buySpeedUpgrade.addEventListener('click', function() {
    if (wood.amount && stone.amount && plant.amount >= 3 * player.speedUpgrade) {
        wood.amount -= 3 * player.speedUpgrade;
        stone.amount -= 3 * player.speedUpgrade;
        plant.amount -= 3 * player.speedUpgrade;

        player.speedUpgrade++;

        displayWood.textContent = wood.amount;
        displayStone.textContent = stone.amount;
        displayPlant.textContent = plant.amount;

        speedWoodCost.textContent = player.speedUpgrade * 3 + ' wood';
        speedStoneCost.textContent = player.speedUpgrade * 3 + ' stone';
        speedPlantCost.textContent = player.speedUpgrade * 3 + ' plant';
    }
});