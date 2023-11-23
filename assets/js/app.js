console.log("app.js");
const icone = document.querySelector(".fa-eye-slash");
const input = document.querySelector(".password");
console.log(icone);
let show = false;
// console.log(!show);
if (icone) {
  //teste de l'existance de la variable
  icone.addEventListener("click", () => {
    console.log("icone clique "); //vérification du bon rattachement à l'écouteurs d'évènement
    if (!show) {
      icone.classList.add("fa-eye");
      icone.classList.remove("fa-eye-slash");
      show = true;
      input.setAttribute("type", "text");
    } else {
      icone.classList.add("fa-eye-slash");
      icone.classList.remove("fa-eye");
      show = false;
      input.setAttribute("type", "password");
    }
  });
}

const burger = document.querySelector(".fa-bars");
const mainMenu = document.querySelector(".main-nav");
const registerMenu = document.querySelector(".register-container");
console.log(burger);
let showMenu = false;
burger.addEventListener("click", () => {
  console.log("icone cliqué");
  if (!showMenu) {
    mainMenu.style.display = "flex";
    registerMenu.style.display = "flex";
    showMenu = true;
  } else {
    mainMenu.style.display = "none";
    registerMenu.style.display = "none";
    showMenu = false;
  }
});

let year = document.getElementById("year");
year.textContent = new Date().getFullYear();
