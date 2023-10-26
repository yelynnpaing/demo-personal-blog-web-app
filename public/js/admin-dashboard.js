//ADMIN SIDE BAR
let sideLabels = document.querySelectorAll('.side-label');
let sideMain = document.querySelector('.side-main');
let sideBar = document.querySelectorAll('.side-bar');
let navBar = document.querySelector('#navBar');
let sidebarToggler = document.querySelector('#sidebarToggler');

    function sidebarToggle(){
        sidebarToggler.classList.toggle('ps-5','pe-1');
        sideMain.classList.toggle('col-md-1');
        sideMain.classList.toggle('col-md-2');
        navBar.classList.toggle('col-md-11');
        navBar.classList.toggle('col-md-10');
        sideBar.forEach(element => {
            element.classList.toggle('text-center');
        });
        sideLabels.forEach(label => {
            label.classList.toggle('d-none');
            console.log(label);
        });
    };

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
