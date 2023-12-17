"use strict"

let login = document.querySelector(".header .head-login");

login.addEventListener("click", () => {
  // document.querySelector("body").classList.add("dark");
  document.querySelector(".dark").style.cssText = "display: block;";
  // document.querySelector(".dark").style.cssText = "display: block;";
  
  console.log("Говно")
})







// Открытие модального окна
document.querySelector('#buttonscript').addEventListener('click', function () {
  document.querySelector('#forma').style.display = 'flex';
});

// Закрытие модального окна
document.querySelector('#zakroi').addEventListener('click', function () {
  document.querySelector('#forma').style.display = 'none';
});
