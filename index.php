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
</body>
</html>
