
<div id="modalContainer">
  <div id="modalContent">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
  <form action="/admin.php" method="post">
  <div class="container-white">
  <div class="form-group">
        <h1 class="title_reg">Вход в систему</h1>
        <section class="email">
          <label for="email" class="label">Адрес эл. почты</label>
          <input class="form-control" type="text" name="login" required class="input">
        </section>
        <section class="password">
          <label for="password" class="label">Пароль</label>
          <input class="form-control" type="password" name="password" class="input" required>
          <img loading="lazy" src="images/eyes.svg" alt="Password Icon" id="img" />
        </section>
        <section class="button-text">
        <input class="form-control" type="submit" name="submit-btn" value="Войти" class="submit-btn" id="zakroi">
        </section>
        
      </div>
</div>
  </form>

</div>
  </div>
</div>
<style>
    .form-group{
        margin: 0 auto;
        width: 50%;
    }
</style>