<!DOCTYPE html>
<html>
  <head>
    <title>VK API Example</title>
  </head>
  <body>
    <button onclick="loginWithVk()">Авторизоваться через VK</button>

    
  </body>
</html>



<script>



    // При нажатии кнопки для авторизации через VK
function loginWithVk() {
  const clientId = '51816095'; // Замените на ваш Client ID
  const redirectUri = 'https://localhost/KRS/vk_connect.php'; // Замените на ваш URL-адрес обратного вызова

  // Формирование URL для авторизации OAuth 2.0
  const authUrl = `https://oauth.vk.com/authorize?client_id=${clientId}&redirect_uri=${redirectUri}&response_type=code&v=5.131&scope=groups,wall`;

  // Открытие окна авторизации VK в новой вкладке
  window.open(authUrl, '_blank');
}

// Callback функция, которая будет вызвана после авторизации
function vkCallback(code) {
  const clientId = '51816095'; // Замените на ваш Client ID
  const clientSecret = 'kDxVhNys6Zbmvs8yTDSl'; // Замените на ваш Client Secret
  const redirectUri = 'https://localhost/KRS/vk_connect.php'; // Замените на ваш URL-адрес обратного вызова

  // Запрос access token и получение информации о группах пользователя
  fetch(`https://oauth.vk.com/access_token?client_id=${clientId}&client_secret=${clientSecret}&redirect_uri=${redirectUri}&code=${code}`)
    .then(response => response.json())
    .then(data => {
      const accessToken = data.access_token;
      const userId = data.user_id;

      // Запрос информации о группах пользователя
      fetch(`https://api.vk.com/method/groups.get?user_id=${userId}&access_token=${accessToken}&v=5.131`)
        .then(response => response.json())
        .then(data => {
          const groups = data.response.items;
          console.log(groups);
          // Обработка полученных групп
        })
        .catch(error => console.error('Ошибка при получении списка групп:', error));

      // Запрос информации о комментариях пользователя в группе
      const groupId = 'ВАШ_ID_ГРУППЫ'; // Замените на ваш ID группы
      fetch(`https://api.vk.com/method/wall.getComments?owner_id=-${groupId}&access_token=${accessToken}&v=5.131`)
        .then(response => response.json())
        .then(data => {
          const comments = data.response.items;
          console.log(comments);
          // Обработка полученных комментариев
        })
        .catch(error => console.error('Ошибка при получении комментариев:', error));
    })
    .catch(error => console.error('Ошибка при получении access token:', error));
}

</script>