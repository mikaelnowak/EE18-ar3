const eKnapp = document.querySelector('button');
const eGrid = document.querySelector('.grid-6');

eKnapp.addEventListener('click', function() {
    console.log('hej');

    fetch('./ajax/skicka-flaggor.php')
    .then(response => response.text())
    .then(data => {
        console.log(data);

        eGrid.innerHTML += data;
    })
})