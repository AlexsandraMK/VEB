document.getElementById('polosa').onmouseover = stopAutoSlider;
document.getElementById('polosa').onmouseout = continueAutoSlider;
var top_slide = 0;
var timer;

function autoSlider() {
    timer = setTimeout(sliderTop, 1000);
}

function sliderTop() {
    var list_news = document.getElementById("polosa");
    top_slide = top_slide - height;
    var max_height = height * (num_news-2);
    if (top_slide < -max_height) {
        top_slide = 0;
        clearTimeout(timer);
        console.log(timer);
    }
    list_news.style.top = top_slide + 'px';
    autoSlider();
}

function stopAutoSlider() {
    clearInterval(timer);
    //var obj = "new_info" + String(id);
    document.getElementById("one_new").style.background = "pink";
}

function continueAutoSlider() {
    timer = setTimeout(sliderTop, 1000);
    document.getElementById("one_new").style.background = "#BFBBAC";
}