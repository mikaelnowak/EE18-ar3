const eMinus = document.querySelector('.minus');
const eAntal = document.querySelector('.antal');
const ePlus = document.querySelector('.plus');
const eSumma = document.querySelector('.summa');

var antal = 1;

summa();

eMinus.addEventListener('click', function() {
    if (antal > 0) {
        antal--;
        summa();
    }
});

ePlus.addEventListener('click', function() {
    antal++;
    summa();
});

eAntal.addEventListener('input', function() {
    antal = eAntal.value;
    summa();
});

function summa() {
    eAntal.value = antal;
    eSumma.textContent = antal * 49 + ' kr';
}