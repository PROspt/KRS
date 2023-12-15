<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/master.css">
    <title>KRS</title>
    
</head>
<body>
    <div class="container">
        <h2>Регистрация нового чела</h2>
        <?php
            include("src/actions/db_connect.php");
        ?>

        <section id="activity">
            <div class="container">
                <div class="inner">
                    <h2 class="heading">Мероприятия</h2>
                    <div class="cards">
                        <div class="card">
                            <div class="left">
                                <h3 class="heading-card">DevRel Hack 2.0</h3>
                                <ul class="rules">
                                    <li class="item">
                                        <div class="icon"></div>
                                        Хакатон
                                    </li>
                                    <li class="item">
                                        <div class="icon"></div>
                                        Команды от 2 до 5 участников
                                    </li>
                                    <li class="item">
                                        <div class="icon"></div>
                                        200 000 руб и другие призы 
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
        
        <form action="register.php" method="post">
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" required>
            
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" required>
            
            <input type="submit" value="Зарегистрироваться">
        </form>
    </div>



    <footer>
      <div class="footer-logo">
         логотип
      </div>
      <div class="social-links">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
      </div>
      <div class="site-nav">
        <a href="#">Главная</a>
        <a href="#">О нас</a>
        <a href="#">Услуги</a>
        <a href="#">Контакты</a>
      </div>
      <div class="footer-buttons">

        <a href="#">Кнопка 1</a>
        <a href="#">Кнопка 2</a>
        <a href="#">Кнопка 3</a>
      </div>
      <p>&copy; 2024 РОГАТЫЙ СКОТ. Все права защищены.</p>
    </footer>

</body>
</html>
