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
<?php
            require_once("src/blocks/header.php");
    ?>
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

    </div>

    <?php
            require_once("src/blocks/footer.php");
    ?>


</body>
</html>
