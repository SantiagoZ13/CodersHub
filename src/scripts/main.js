const hamMenu = document.querySelector(".menu-mobile");
const offScreen = document.querySelector('.off-screen-mobile-menu');

hamMenu.addEventListener("click", () =>{
    offScreen.classList.toggle("active")
})