const eMinus = document.querySelector('.minus');
const eAntal = document.querySelector('.antal');
const ePlus = document.querySelector('.plus');
const eSumma = document.querySelector('.summa');

var antal = 0;

eMinus.addEventListener('click', function() {
    if (antal > 0) {
        antal--;
        eAntal.value = antal;
        summa();
    }
});

ePlus.addEventListener('click', function() {
    antal++;
    eAntal.value = antal;
    summa();
});

eAntal.addEventListener('change', function() {
    antal = eAntal.value;
    summa();
});

function summa() {
    //console.log("hej");
    eSumma.textContent = antal * 49 + ' kr';
}