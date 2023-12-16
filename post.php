<?php
$accessToken = 'vk1.a.sHWfP7HbV8qsZSVAq6t9n2jnAKbgt4SOZvrV22AQEaXnOW9rbyyK86hRMVUuNwYApCNmiJBbFRX4qNZMf8iTxL6iSR1EOgKqICqHZswRElu5a4STlTp3-TjMNLCXrg2tyO-6IRwmCOdZ1uXjukFAlCIzjmpf3LPFCdnByX7fIvQOqeJST-VuOX1nv0mO-oHofalbeTg6iaS-hNiJt-LNIA'; // Токен доступа с правами на управление группой
$groupId = '209890831'; // ID вашей группы


// Получение текста поста и пути к загруженному изображению
$message = $_POST['message'];

// Загрузка фотографии на сервер и получение ее ID
$photoId = '';

if ($_FILES['photo']['size'] > 0) {
  $photo = $_FILES['photo'];

  // Функция для загрузки фотографии на сервер VK и получения ее ID
  $uploadUrlResponse = json_decode($uploadUrl, true); // Парсим ответ сервера
  $uploadUrl = $uploadUrlResponse['response']['upload_url'];
  // Загрузка фотографии на сервер VK
  $photoData = ['photo' => new CURLFile($photo['tmp_name'])];
  $uploadResult = json_decode(sendPostRequest($uploadUrl, $photoData), true);

  // Сохранение загруженной фотографии на сервере VK  
  $saveResult = sendPostRequest("https://api.vk.com/method/photos.saveWallPhoto?access_token={$accessToken}&server={$uploadResult['server']}&photo={$uploadResult['photo']}&hash={$uploadResult['hash']}&v=5.131", []);
  $saveResultJson = json_decode($saveResult, true);
  $photoId = $saveResultJson['response'][0]['id'];
}

// Добавление поста
$params = [
  'owner_id' => -$groupId,
  'message' => $message,
  'attachments' => $photoId !== '' ? 'photo'.$groupId.'_'.$photoId : '',
  'access_token' => $accessToken,
  'v' => '5.131'
];

$response = sendPostRequest('https://api.vk.com/method/wall.post', $params);
$result = json_decode($response, true);

// Проверка результата
if ($result && isset($result['response'])) {
  echo 'Пост успешно добавлен';
} else {
  echo 'Ошибка при добавлении поста: ' . $response;
}

// Функция для отправки POST-запросов
function sendPostRequest($url, $params) {
  $postData = http_build_query($params);

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($ch);
  curl_close($ch);

  return $response;
}















?>
