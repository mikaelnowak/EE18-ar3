const ePromenad = document.querySelector(".promenad");
const eJoggning = document.querySelector(".jogging");
const eStyrka = document.querySelector(".styrka");
const eTrappor = document.querySelector(".trappor");
const eKnapp = document.querySelector("button");
const eLista1 = document.querySelector(".lista1");
const eLista2 = document.querySelector(".lista2");
const eTyngsta = document.querySelector(".tyngsta");

eKnapp.addEventListener("click", function() {
    var tidPromenad = Number(ePromenad.value);
    var tidJoggning = Number(eJoggning.value);
    var tidStyrka = Number(eStyrka.value);
    var tidTrappor = Number(eTrappor.value);

    var tid = (tidPromenad + tidJoggning + tidStyrka + tidTrappor) * 30;
    eLista1.textContent = tid;
});