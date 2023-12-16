<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Главная КРС</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>

</head>
<body>
    
</body>
</html>
<?php
  require_once("src/blocks/header.php");
?>
<body>
    
    <div class="container">
    <header class="main-container">
  <section class="div">
    <div class="div-2">
      <div class="column">
        <img loading="lazy" class="img" src="images/image_glav.svg"/>
      </div>

      <div class="column-2">
      <header class="main-header">Стань разработчиком в нашей компании</header>
      </div>
    </div>
  </section>
</header>
        <!-- <div class="dark"></div> -->
        <?php
            include("src/actions/db_connect.php");
        ?>

        <section id="activity">
            <div class="container">
                <div class="inner">
                    <h2 class="heading">Мероприятия</h2>
                    <div class="cards">
                        <div class="card flex">
                            <div class="left">
                                <h3 class="heading-card">DevRel Hack 2.0</h3>
                                <ul class="rules list">
                                    <li class="item flex">
                                        <div class="icon"></div>
                                        <div>Хакатон</div>
                                    </li>
                                    <li class="item flex">
                                        <div class="icon"></div>
                                        <div>Команды от 2 до 5 участников</div>
                                    </li>
                                    <li class="item flex">
                                        <div class="icon"></div>
                                        <div>200 000 руб и другие призы</div> 
                                    </li>
                                </ul>
                            </div>
                            <div class="right">
                                <img src="images/1.png" alt="баннер">
                            </div>
                        </div>
                    </div>

                    <div class="cards">
                        <div class="card flex">
                            <div class="left">
                                <h3 class="heading-card">DevRel Hack 2.0</h3>
                                <ul class="rules list">
                                    <li class="item flex">
                                        <div class="icon"></div>
                                        <div>Хакатон</div>
                                    </li>
                                    <li class="item flex">
                                        <div class="icon"></div>
                                        <div>Команды от 2 до 5 участников</div>
                                    </li>
                                    <li class="item flex">
                                        <div class="icon"></div>
                                        <div>200 000 руб и другие призы</div> 
                                    </li>
                                </ul>
                            </div>
                            <div class="right">
                                <img src="images/1.png" alt="баннер">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    </body>

 




    <div id="authorization-modal" class="modal">
  
        <div class="registr-container">
  <h1 class="title_reg">Регистрация</h1>
  <section class="email">
    <label for="email" class="label">Адрес эл. почты</label>
    <input id="email" type="email" class="input" aria-label="МЫЛО" aria-role="textbox" />
  </section>
  <section class="password">
    <label for="password" class="label">Пароль</label>
    <input id="password" type="password" class="input" aria-label="Пароль" aria-role="textbox" />
    <img loading="lazy" src="images/eyes.svg" alt="Password Icon" id="img" />
  </section>
  <section class="confirm-password">
    <label for="confirm-password" class="label">Повторите пароль</label>
    <input id="confirm-password" type="password" class="input" aria-label="Подтвердите пароль" aria-role="textbox" />
    <img loading="lazy" src="images/eyes.svg" alt="Password Icon" id="img">
  <div class="checkbox-container">
    <input id="checkbox" type="checkbox" class="checkbox" aria-label="Политика" aria-role="checkbox" />
    <label for="checkbox" class="checkbox-label">Я согласен с регламентом и политикой конфиденциальности</label>
    </div>  
    <button class="submit-btn">Зарегистрироваться</button>
  
</div>











<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="login-container">
    <h1 class="title_reg">Вход в систему</h1>
    <section class="email">
      <label for="email" class="label">Адрес эл. почты</label>
      <input type="text" name="login" required class="input">
    </section>
    <section class="password">
      <label for="password" class="label">Пароль</label>
      <input type="password" name="password" class="input" required>
      <img loading="lazy" src="images/eyes.svg" alt="Password Icon" id="img" />
    </section>
    <section class="">
    <input type="submit" name="submit-btn" value="Войти" class="submit-btn">
    <p class="secondary-text">Не получается войти?</p> 
    </section>
</form>










	</div>		
</div>
<style type="text/css">

.popup-fade:before {
	content: '';
	background: #000;
	position: fixed; 
	left: 0;
	top: 0;
	width: 100%; 
	height: 100%;
	opacity: 0.7;
	z-index: 9999;
}
.popup {
	position: fixed;
	top: 20%;
	left: 50%;
	padding: 20px;
	width: 360px;
	margin-left: -200px;	
	background: #fff;
	border: 1px solid orange;
	border-radius: 4px; 
	z-index: 99999;
	opacity: 1;	
}
.popup-close {
	position: absolute;
	top: 10px;
	right: 10px;
}



.modal {
  display: none;
  position: fixed;
  z-index: 999;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal.active {
  display: flex;
  align-items: center;
  justify-content: center;
}

.popup-close {
  position: absolute;
  top: 10px;
  right: 10px;
  cursor: pointer;
  /* Другие стили для кнопки закрытия */
}

/* Другие стили для модального окна */






</style>

<script>
    // Находим все кнопки с атрибутом data-modal-target
const modalButtons = document.querySelectorAll('[data-modal-target]');

// Добавляем событие нажатия на каждую кнопку
modalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modalId = button.dataset.modalTarget;
    const modal = document.getElementById(modalId);
    
    // Открываем модальное окно
    openModal(modal);
  });
});

// Функция для открытия модального окна
function openModal(modal) {
  if (modal == null) return;
  modal.classList.add('active');
}

// Функция для закрытия модального окна
function closeModal(modal) {
  if (modal == null) return;
  modal.classList.remove('active');
}

// Находим кнопку "Закрыть" в модальном окне авторизации
const closeButton = document.querySelector('.popup-close');

// Добавляем событие нажатия на кнопку "Закрыть"
closeButton.addEventListener('click', () => {
  const modal = closeButton.closest('.modal');
  
  // Закрываем модальное окно
  closeModal(modal);
});

</script>
<!-- 
<script src="https://yandex.st/jquery/2.1.1/jquery.min.js"></script>

<script>
$(document).ready(function($) {
	$('.popup-close').click(function() {
		$(this).parents('.popup-fade').fadeOut();
		return false;
	});		

	$(document).keydown(function(e) {
		if (e.keyCode === 27) {
			e.stopPropagation();
			$('.popup-fade').fadeOut();
		}
	});

	$('.popup-fade').click(function(e) {
		if ($(e.target).closest('.popup').length == 0) {
			$(this).fadeOut();					
		}
	});	
});
</script> -->




<?php
            require_once("src/blocks/footer.php");
    ?>

<script src="scripts/master.js"></script>




</body>
</html>
