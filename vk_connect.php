<!DOCTYPE html>
<html>
  <head>
    <title>Добавление поста в VK</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body>
    <form id="postForm">
      <input type="text" name="message" placeholder="Текст поста" required>
      <input type="file" name="photo" accept="image/*">
      <button type="submit">Отправить пост</button>
    </form>

    <script>
      $(document).ready(function() {
        $('#postForm').submit(function(e) {
          e.preventDefault();
          
          // Создание объекта FormData для отправки данных на сервер
          var formData = new FormData(this);

          // Отправка AJAX запроса на сервер с данными формы
          $.ajax({
            url: 'post.php', // Путь к файлу обработки запроса (post.php)
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
              alert(response); // Вывод ответа сервера
            }
          });
        });
      });
    </script>
  </body>
</html>





<!-- Данные о группе -->
<?php
// Замените на ваши данные
$accessToken = 'vk1.a.sHWfP7HbV8qsZSVAq6t9n2jnAKbgt4SOZvrV22AQEaXnOW9rbyyK86hRMVUuNwYApCNmiJBbFRX4qNZMf8iTxL6iSR1EOgKqICqHZswRElu5a4STlTp3-TjMNLCXrg2tyO-6IRwmCOdZ1uXjukFAlCIzjmpf3LPFCdnByX7fIvQOqeJST-VuOX1nv0mO-oHofalbeTg6iaS-hNiJt-LNIA'; // Токен доступа с правами на просмотр информации о группе
$groupId = '217529582'; // ID вашей группы

// Параметры для получения информации о группе
$params = array(
  'group_id' => $groupId,
  'fields' => 'description,members_count',
  'access_token' => $accessToken,
  'v' => '5.131'
);

// Отправка запроса на получение информации о группе
$response = file_get_contents('https://api.vk.com/method/groups.getById?' . http_build_query($params));
$result = json_decode($response, true);

// Проверка результата
if ($result && isset($result['response'][0])) {
  $groupData = $result['response'][0];
  
  // Вывод полученной информации
  echo 'ID: ' . $groupData['id'] . '<br>';
  echo 'Название: ' . $groupData['name'] . '<br>';
  
  // Проверка наличия поля "description"
  if (isset($groupData['description'])) {
    echo 'Описание: ' . $groupData['description'] . '<br>';
  } else {
    echo 'Описание: Нет данных <br>';
  }
  
  // Проверка наличия поля "members_count"
  if (isset($groupData['members_count'])) {
    echo 'Количество подписчиков: ' . $groupData['members_count'] . '<br>';
  } else {
    echo 'Количество подписчиков: Нет данных <br>';
  }
  echo "<br>";
  // Вывод фото
  if (isset($groupData['photo_200'])) {
    echo 'Ссылка на фото: <img src="' . $groupData['photo_200'] . '">';
  }
} else {
  echo 'Ошибка при получении информации о группе: ' . $response;
}
echo "<br>";

  // Получение списка подписчиков группы
  $membersParams = array(
    'group_id' => $groupId,
    'fields' => 'first_name,last_name',
    'count' => 1000,
    'access_token' => $accessToken,
    'v' => '5.131'
  );

  // Отправка запроса на получение списка подписчиков
  $membersResponse = file_get_contents('https://api.vk.com/method/groups.getMembers?' . http_build_query($membersParams));
  $membersResult = json_decode($membersResponse, true);

  // Проверка результата
  if ($membersResult && isset($membersResult['response']['items'])) {
    $members = $membersResult['response']['items'];

    // Вывод списка подписчиков
    echo 'Список подписчиков:<br>';
    foreach ($members as $member) {
      echo 'ID: ' . $member['id'] . ', Имя: ' . $member['first_name'] . ', Фамилия: ' . $member['last_name'] . '<br>';
    }
  } else {
    echo 'Ошибка при получении списка подписчиков: ' . $membersResponse;
  }































?>
