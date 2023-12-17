<?php
$accessToken = 'vk1.a.sHWfP7HbV8qsZSVAq6t9n2jnAKbgt4SOZvrV22AQEaXnOW9rbyyK86hRMVUuNwYApCNmiJBbFRX4qNZMf8iTxL6iSR1EOgKqICqHZswRElu5a4STlTp3-TjMNLCXrg2tyO-6IRwmCOdZ1uXjukFAlCIzjmpf3LPFCdnByX7fIvQOqeJST-VuOX1nv0mO-oHofalbeTg6iaS-hNiJt-LNIA'; // Токен доступа с правами на управление группой
$groupId = '209890831'; // ID вашей группы

// Получение текста поста из AJAX запроса
$message = $_POST['message'];

// // Загрузка фотографии на сервер и получение ее ID
// if ($_FILES['photo']['size'] > 0) {
//   $photo = $_FILES['photo'];
//   $photoPath = 'images/upload' . $photo['name'];
//   move_uploaded_file($photo['tmp_name'], $photoPath);
//   $photoId = uploadPhotoToVK($photoPath, $accessToken);
//   $attachments = 'photo' . $groupId . '_' . $photoId;
// } else {
//   $attachments = '';
// }

// Параметры для добавления поста
$params = array(
  'owner_id' => '-' . $groupId,
  'message' => $message,
  // 'attachments' => $attachments,
  'access_token' => $access_token,
  'v' => '5.199'
);

// Отправка запроса на добавление поста
$response = file_get_contents('https://api.vk.com/method/wall.post?' . http_build_query($params));
$result = json_decode($response, true);

// Проверка результата
if ($result && isset($result['response'])) {
  echo 'Пост успешно добавлен';
} else {
  echo 'Ошибка при добавлении поста: ' . $response;
}




























?>
