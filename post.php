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
  $uploadUrlResponse = callAPI('photos.getWallUploadServer', array('access_token' => $accessToken, 'v' => '5.131'));
  $uploadUrl = $uploadUrlResponse['response']['upload_url'];

  // Загрузка фотографии на сервер VK
  $photoData = array('photo' => new CURLFile($photo['tmp_name']));
  $uploadResult = json_decode(callAPI($uploadUrl, $photoData), true);

  // Сохранение загруженной фотографии на сервере VK
  $saveResult = callAPI('photos.saveWallPhoto', array(
    'access_token' => $accessToken,
    'server' => $uploadResult['server'],
    'photo' => $uploadResult['photo'],
    'hash' => $uploadResult['hash'],
    'v' => '5.131'
  ));
  $photoId = $saveResult['response'][0]['id'];
}

// Добавление поста
$params = array(
  'owner_id' => '-' . $groupId,
  'message' => $message,
  'attachments' => $photoId !== '' ? 'photo' . $groupId . '_' . $photoId : '',
  'access_token' => $accessToken,
  'v' => '5.131'
);

$response = callAPI('wall.post', $params);

// Проверка результата
if (isset($response['response'])) {
  echo 'Пост успешно добавлен';
} else {
  echo 'Ошибка при добавлении поста: ' . $response;
  echo $response;
}

// Функция для отправки API-запросов к серверу VK
function callAPI($method, $params) {
  $url = 'https://api.vk.com/method/' . $method;
  $params['access_token'] = $params['access_token'] ?? $GLOBALS['accessToken'];
  $params['v'] = $params['v'] ?? '5.131';

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
  $response = curl_exec($ch);
  curl_close($ch);

  return json_decode($response, true);

}















?>
