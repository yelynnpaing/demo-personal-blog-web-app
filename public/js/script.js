//NAV BAR
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

//Show Password
let old_password = document.getElementById('old_password');
let old_eye = document.getElementsByClassName('old_eye');

let new_password = document.getElementById('new_password');
let new_eye = document.getElementsByClassName('new_eye');

let confirmed_password = document.getElementById('confirmed_password');
let confirmed_eye = document.getElementsByClassName('confirmed_eye');

function showHideOldPw(){
    if(old_password.type == 'password'){
        old_password.type = 'text';
        old_eye['0'].classList.toggle('fa-eye-low-vision');
        old_eye['0'].classList.toggle('fa-eye');
    }else{
        old_password.type = 'password';
        old_eye['0'].classList.toggle('fa-eye-low-vision');
        old_eye['0'].classList.toggle('fa-eye');
    }
};
function showHideNewPw(){
    if(new_password.type == 'password'){
        new_password.type = 'text';
        new_eye['0'].classList.toggle('fa-eye-low-vision');
        new_eye['0'].classList.toggle('fa-eye');
    }else{
        new_password.type = 'password';
        new_eye['0'].classList.toggle('fa-eye-low-vision');
        new_eye['0'].classList.toggle('fa-eye');
    }
};
function showHideConfirmPw(){
    if(confirmed_password.type == 'password'){
        confirmed_password.type = 'text';
        confirmed_eye['0'].classList.toggle('fa-eye-low-vision');
        confirmed_eye['0'].classList.toggle('fa-eye');
    }else{
        confirmed_password.type = 'password';
        confirmed_eye['0'].classList.toggle('fa-eye-low-vision');
        confirmed_eye['0'].classList.toggle('fa-eye');
    }
};


