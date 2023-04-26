// const bar = document.getElementById('bar');
// const close = document.getElementById('close');
// const nav = document.getElementById('navbar');

// if (bar) {
//     bar.addEventListener('click', () => {
//         nav.classList.add('active');
//     })
// }
// if (close) {
//     bar.addEventListener('click', () => {
//         nav.classList.remove('active');
//     })
// }
var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn-account");

function register() {
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "110px";
}

function login() {
    x.style.left = "50px";
    y.style.left = "450px";
    z.style.left = "0";
}

const pass = document.getElementsById("passs")
const user = document.getElementsById("use")

function azert() {
    if ((pass.value).length < 7) {
        return alert("pass no valide")
    } else if ((user.value).length < 5) {
        return alert("user name no valide")
    }
}