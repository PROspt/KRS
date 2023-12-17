<style>

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <style>
        #send-post-div form{
            width: 300px;
            display: block;
            margin: 50px auto;
        }
        input, textarea, button{
            margin-top: 5px;
            
            width: 100%;
        }
        input{
            height: 30px;
        }
    </style>
    <?php
  require_once("src/blocks/header.php");
?>
</head>
<body>

    <div id="send-post-div">
        <form action="src/actions/post.php", method="post">
            <input type="text" name="token-vk" placeholder="Токен вк">
            <input type="text" name="token-tg" placeholder="Токен тг">
            <input type="text" name="chat_id-vk" placeholder="id паблика">
            <input type="text" name="chat_id-tg" placeholder="id канала">
            <textarea name="text" id="" cols="30" rows="10" placeholder="Текст"></textarea>
            <button type="submit">Отправить</button>
        </form>
    </div>
    <?php
            require_once("src/blocks/footer.php");
    ?>
</body>
</html>