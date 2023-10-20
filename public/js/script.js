window.onscroll = function() { myFun() };
let navbar = document.getElementById('navbar');
let topPx = navbar.offsetTop;
function myFun() {
    if(window.pageYOffset >= topPx) {
        navbar.classList.add("fixMe");
    }else{
        navbar.classList.remove("fixMe");
    }
};

//HEADER TEXT SLIDE
let mainTextSlide = document.getElementById('mainTextSlide');
let textSlide = document.getElementsByClassName('text-slide');
let fakeData = document.getElementById('fakeData');

let slideIndex = 1;
showTextSlide(slideIndex)

function plusTextSlide(n){
    showTextSlide(slideIndex += n);
}

function showTextSlide(n){
    let i;
    if(n > textSlide.length){slideIndex = 1};
    if(n < 1)(slideIndex = textSlide.length);
    for (i=0; i<textSlide.length; i++){
        textSlide[i].style.display = 'none';
    }
    textSlide[slideIndex-1].style.display = 'block';
    textSlide[slideIndex-1].classList.add('animate__backInLeft');
};
setTimeout(() => {
    toggleShow();
}, 500);

function toggleShow(){
    mainTextSlide.classList.toggle('d-none');
    fakeData.classList.add('d-none');
}

