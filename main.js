var conteiner = document.getElementById('list_news');
conteiner.onmouseenter = stopAutoSlider;
conteiner.onmouseleave = continueAutoSlider;

var top_slide = -20;
var timer;

function autoSlider() {
    timer = setTimeout(sliderTop, 2000);
}

function sliderTop() {
    var list_news = document.getElementById("polosa");
    top_slide = top_slide - height;
    var max_height = height * (num_news - 2);
    if (top_slide < -max_height) {
        top_slide = -20;
        clearTimeout(timer);
    }
    list_news.style.top = top_slide + 'px';
    autoSlider();
}

var id = -1;
let global_elem;
function stopAutoSlider() {
    clearInterval(timer);
    let polosa = document.getElementById("polosa");
    polosa.onmouseover = onNew;
}

function onNew(event) {
    console.log('onmouseover');
    id = event.target.id;
    // Если событие не на полосе, а на другом обьекте внутри полосы
    if (id.toString(10).indexOf("polosa") != 0) {
        var elem = document.getElementById(id);
        while (elem.id.toString(10).indexOf("one_new") != 0) {
            elem = elem.parentNode;
        }
        elem.style.boxShadow = " 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);";
        elem.style.background = "rgb(255,192,203, .4)";
        id = elem.id;
    }
    global_elem = elem;
    if (global_elem)
        global_elem.onmouseleave = outNew;
}

function outNew() {
    global_elem.style.removeProperty("box-shadow");
    global_elem.style.removeProperty("background");
    //global_elem = null;
}

function continueAutoSlider() {
    timer = setTimeout(sliderTop, 2000);
}