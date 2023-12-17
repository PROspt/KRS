let login = document.querySelector(".header .head-login");
let modalContainer = document.querySelector("#modal-container");
let closeModalButton = document.querySelector('#zakroi');

// Обработчик для открытия модального окна
login.addEventListener("click", () => {
  modalContainer.style.display = "block";
});

// Обработчик для закрытия модального окна
closeModalButton.addEventListener('click', function () {
  modalContainer.style.display = "none";
});
