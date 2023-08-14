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


