//alert(window.location.pathname);
if (window.location.pathname == "/") {
    document.querySelector("#footer--nav").classList.add('d-none');
}

/* ************** ACTIVE NAV BARE ************** */

// let a = document.querySelectorAll(".nav-link");
// for (const item of a) {
//     if (item == location.href) {
//         console.log(location.href);
//         item.classList.add("active");
//     }
// }
// const data = ["club", "pnm", "equipes"];
// for (const phath of data) {
//     console.log(window.location.pathname.search(phath))
//     if (window.location.pathname.search(phath) == 1) {
//         document.querySelector(`#${phath}`).classList.add("active");
//         document.querySelector(`#${phath} a`).classList.add("active");
//     }
// }





window.onload = () => {
    setTimeout(function() {
        document.querySelector(".baniere-match").classList.remove('d-none');
    }, 2000);
    setTimeout(function() {
        document.querySelector("#others").classList.remove('d-none');
        document.querySelector("#footer--nav").classList.remove('d-none');
    }, 2000);
    setTimeout(function() {
        document.querySelector(".actu--left").classList.remove('d-none');
    }, 700);
    setTimeout(function() {
        document.querySelector(".actu--right").classList.remove('d-none');
    }, 700);
}


const navDiv = document.querySelector(".animate--nav").classList;
const left_ul = document.querySelector("#f-nav").classList;
const right_ul = document.querySelector("#r-nav").classList;
window.onscroll = function() { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        navDiv.remove('justify-content-end');
        navDiv.add('justify-content-between');
        left_ul.add('animate__animated', 'animate__backInRight');
        right_ul.add('animate__animated', 'animate__bounceInDown');
    } else {
        navDiv.add('justify-content-end');
        navDiv.remove('justify-content-between');
        right_ul.remove('animate__animated', 'animate__bounceInDown');
    }
}