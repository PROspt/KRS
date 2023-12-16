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

<style>
  .header{
    width: 100%;
    margin-bottom: 30px;
    background: #FFF;
    box-shadow: 0px 0px 16px 2px rgba(0, 0, 0, 0.25);
    padding-top: 15px;
    padding-bottom: 15px;
  }
  .head-container{
    max-width: 1410px;
    display: flex;
    margin: auto;
    justify-content: space-between;
  }
  .head-container img{
    width: 124.669px;
    height: 42.981px;
  }
  .head-navbar{
    gap: 30px;
    display: flex;
    align-items: center;
  }
  .head-navbar img{
    width: 34px;
    height: 34px;
  }
  .head-login{
    display: flex;
    align-items: center;
  }
</style>

<header class="header">
  <div class="head-container">
        <a href="index.php">  
      <img src="images/logo-black.svg" alt=""></a>
    <div class="head-navbar">
      <?php
        include("src/actions/db_connect.php");
        
        // Проверяем, была ли отправлена форма входа
        if(!empty($_POST['login'])) {
          if(!empty($_POST['password']) and !empty($_POST['email'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $query = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
            $user = mysqli_fetch_assoc($result);

            if(empty($user) || !password_verify($password, $user['password'])){
              $error[] = 'Неверный логин или пароль';
            } else {
              $_SESSION['user'] = $user;
            } 
          }      
        }

        // Проверяем, авторизован ли пользователь
        if (!empty($_SESSION['user'])){
          $login = $_SESSION['user']['login'];
      ?>            
      <!-- Отображаем ссылку на выход, если пользователь авторизован -->
      <a href="?log=out" class="head-login">
        <img src="images/person.svg" alt="">
        Выход
      </a>
      <?php
          if($_GET['log'] == 'out'){
            $_SESSION['user'] = null;
          }
        } else { 
      ?>
      <!-- Отображаем кнопку входа, если пользователь не авторизован -->
      <a href="?log=aut" class="head-login">
        <img src="images/person.svg" alt="">
        Вход
      </a>
      <?php
        }
      ?>
      <div class="head-lang">
        <img src="images/lang.svg" alt="">
      </div>
    </div>
  </div>
</header>





<?php
    include("src/actions/db_connect.php");
    if(isset($_POST['submit-btn'])) {
        if(!empty($_POST['login']) && !empty($_POST['password']) ) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $query = "SELECT * FROM users WHERE login='$login'";
            $result = mysqli_query($db, $query) or die(mysqli_error($link));
            $user = mysqli_fetch_assoc($result);
            if(empty($user) || $password != $user['password']){
                $error = 'Неверный логин или пароль';
            } else {
                $_SESSION['user'] = $user;
            }
        } else {
            $error = 'Заполните все поля';
        }
    }

    if(isset($_GET['log']) && $_GET['log'] == 'out'){
        unset($_SESSION['user']);
    }

    if(isset($_SESSION['user'])){
        echo $_SESSION['user']['login'];
        ?>
        <div class="head-login">
            <img src="images/person.svg" alt="">
            <a href="?log=out">Выход</a>
        </div>
        <?php
    } else {
?>




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

<?php 
    }

    if(isset($error)){
        echo $error;
    }
?>




<main id="main">
      