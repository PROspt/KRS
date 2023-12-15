<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>KRS</title>
    
</head>
<body>
    <div class="container">
        <h2>Регистрация нового чела</h2>
        
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
