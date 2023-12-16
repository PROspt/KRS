
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

    <?php
            require_once("src/blocks/footer.php");
    ?>





<header class="registr-container">
  <h1 class="title_reg">Регистрация</h1>
  <section class="email">
    <label for="email" class="label">Адрес эл. почты</label>
    <input id="email" type="email" class="input" aria-label="МЫЛО" aria-role="textbox" />
  </section>
  <section class="password">
    <label for="password" class="label">Пароль</label>
    <input id="password" type="password" class="input" aria-label="Пароль" aria-role="textbox" />
    <img loading="lazy" src="images/eyes.svg" alt="Password Icon" class="img" />
  </section>
  <section class="confirm-password">
    <label for="confirm-password" class="label">Повторите пароль</label>
    <input id="confirm-password" type="password" class="input" aria-label="Подтвердите пароль" aria-role="textbox" />
    <img loading="lazy" src="images/eyes.svg" alt="Password Icon" class="img">
  <div class="checkbox-container">
    <input id="checkbox" type="checkbox" class="checkbox" aria-label="Политика" aria-role="checkbox" />
    <label for="checkbox" class="checkbox-label">Я согласен с регламентом и политикой конфиденциальности</label>
  </div>
  <button class="submit-btn">Зарегистрироваться</button>
  <p class="secondary-text">Не получается зарегистрироваться?</p>
</header>
















</body>
</html>
