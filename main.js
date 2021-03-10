// Наведение / отведение курсора мыши список новостей
var list_news = document.getElementById("polosa");
var conteiner = document.getElementById('list_news');
conteiner.onmouseenter = stopAutoSlider;
conteiner.onmouseleave = continueAutoSlider;

// Наведение / отведение курсора мыши верхняя стрелочка
var button_top = document.getElementById('button-arrow-top');
button_top.onmouseenter = buttonOnMouse;
button_top.onmouseleave = buttonOffMouse;

// Наведение / отведение курсора мыши нижняя стрелочка
var button_bottom = document.getElementById('button-arrow-bottom');
button_bottom.onmouseenter = buttonOnMouse;
button_bottom.onmouseleave = buttonOffMouse;

// Перемотка списка по нажатию на стрелочки
button_top.onclick = toTop;
button_bottom.onclick = toBottom;

// Автоматический слайдер по таймеру
autoSlider();

var max_height = height * (num_news - 2);
var begin_height = -20;
var top_slide = begin_height;
var timer;

function autoSlider() {
    timer = setTimeout(sliderTop, 2000);
}

function sliderTop() {
    top_slide = top_slide - height;
    if (top_slide + 1 < -max_height + begin_height) {
        top_slide = -20;
        clearTimeout(timer);
    }
    list_news.style.top = top_slide + 'px';
    autoSlider();
}

function continueAutoSlider() {
    timer = setTimeout(sliderTop, 2000);
}

function stopAutoSlider() {
    clearInterval(timer);
    let polosa = document.getElementById("polosa");
    polosa.onmouseover = onNew;
}

function buttonOnMouse(event) {
    stopAutoSlider();
    id = event.target.id;
    var button = document.getElementById(id);
    button.style.background = "rgb(138, 66, 81, .4)";
    button.firstChild.nextSibling.style.borderTop = "5px solid #F2EDE9";
    button.firstChild.nextSibling.style.borderRight = "5px solid #F2EDE9";
} 

function buttonOffMouse(event) {
    continueAutoSlider();
    id = event.target.id;
    var button = document.getElementById(id);
    button.style.background = "#F2EDE9";
    button.firstChild.nextSibling.style.borderTop = "5px solid rgb(138, 66, 81, .4)";
    button.firstChild.nextSibling.style.borderRight = "5px solid rgb(138, 66, 81, .4)";
}

function toTop() {
    alert(top_slide);
    top_slide = top_slide + parseFloat(height);
    alert(top_slide);
    if (top_slide - 1 > 0) {
        alert("Вы достигли начала новостей");
        top_slide = -20;
        clearTimeout(timer);
    }
    
    list_news.style.top = top_slide + 'px';
}

function toBottom() {
    top_slide = top_slide - height;
    if (top_slide + 1 < - max_height + begin_height) {
        alert("Вы достигли конца новостей");
        top_slide = -max_height;
        clearTimeout(timer);
    }
    list_news.style.top = top_slide + 'px';
}


var id = -1;
let global_elem;

function onNew(event) {
    console.log('onmouseover');
    id = event.target.id;
    // Если событие не на полосе, а на другом обьекте внутри полосы
    if (id.toString(10).indexOf("polosa") != 0) {
        var elem = document.getElementById(id);
        while (elem.id.toString(10).indexOf("one_new") != 0) {
            elem = elem.parentNode;
        }
        elem.style.boxShadow = " 0 0 10px 10px #EAE1E3 ";
        elem.style.background = "rgb(138, 66, 81, .4)";
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

