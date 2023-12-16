
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












</body>
</html>
