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
    
    width: 1410px;
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
    <img src="/images/logo-black.svg" alt="">
    <div class="head-navbar">
      <?php
        include("src/actions/db_connect.php");
        if(!empty($_POST['login'])) {
          if(!empty($_POST['password']) and !empty($_POST['email'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $queryr = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($link, $queryr) or die(mysqli_error($link));
            $user = mysqli_fetch_assoc($resultat);
            $_SESSION['user'] = $user;
            if(empty($user) || !password_verify($password,$user['password'])){
            $error[] = 'Неверный логин или пароль';
            } 
          }      
        }
        if (!empty($_SESSION['user'])){
          echo $_SESSION['user']['name'];
      ?>            
      <!-- <a href=""> Выход </a> -->
      <div class="head-login">
        <img src="/images/person.svg" alt="">
        Выход
      </div>
      <?php
        if($_GET['log'] == 'out'){
          $_SESSION['user'] = null;
        }} else {
      ?>
      <!-- <a href="#Sing" class="login white">Войти</a> -->
      <div class="head-login">
        <img src="/images/person.svg" alt="">
        Вход
      </div>
      <?php
        }
      ?>
      <div class="head-lang">
          <img src="/images/lang.svg" alt="">
      </div>
    </div>
  </div>
</header>



<main id="main">
      