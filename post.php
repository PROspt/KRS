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

$access_token= 'vk1.a.aAz5tHYt0nKptpfVUnHkgYdZ9LqhbjEoYAxeWYuF1tr1SpijfnMEMl1d8F3ybeAS9VGyuaACfSkiq1O_wxd559LgKedeBCdb_E849RPpFYE5tv3aGWV7Y-DwgHF0cJ7mao2gHSfAzqf7cPNxJijIidlRgFSZrBD55otodyUrD_AWTQR57j6kZWcwMkD86';




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

// // Функция для загрузки фотографии на сервер VK и получения ее ID
// function uploadPhotoToVK($photoPath, $accessToken) {
//   $uploadUrl = file_get_contents("https://api.vk.com/method/photos.getWallUploadServer?access_token={$accessToken}&v=5.131");
//   $uploadUrlResponse = json_decode($uploadUrl, true);
//   if (isset($uploadUrlResponse['response']['upload_url'])) {
//     $uploadUrl = $uploadUrlResponse['response']['upload_url'];
//   } else {
//     echo "Фотография не работает, ключ 'response' отсутствует в ответе";}
//   $photoData = array(
//     'photo' => new CURLFile($photoPath)
//   );

//   // Отправка POST-запроса на сервер VK для загрузки фотографии
//   $ch = curl_init($uploadUrl);
//   curl_setopt($ch, CURLOPT_POST, true);
//   curl_setopt($ch, CURLOPT_POSTFIELDS, $photoData);
//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//   $uploadResult = curl_exec($ch);
//   curl_close($ch);
  
//   $uploadResult = json_decode($uploadResult, true);

//   // Сохранение загруженной фотографии на сервере VK
//   $saveResult = file_get_contents("https://api.vk.com/method/photos.saveWallPhoto?access_token={$accessToken}&server={$uploadResult['server']}&photo={$uploadResult['photo']}&hash={$uploadResult['hash']}&v=5.131");
//   $saveResult = json_decode($saveResult, true);
//   $photoId = $saveResult['response'][0]['id'];

//   return $photoId;
// }




// function uploadPhotoToVKVK($photoPath, $accessToken) {
//   $uploadUrl = file_get_contents('');
//   $uploadUrl = json_decode($uploadUrl, true)[''][''];
//   $photoData = array( 
//     ''=> new CURLFile($photoPath)
//   );
//   $ch = curl_init($uploadUrl);
//   curl_setopt($ch, CURLOPT_POST, true);
//   curl_setopt($ch, CURLOPT_POSTFIELDS, $photoData);
//   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//   $uploadResult = curl_exec($ch);
//   curl_close($ch);  
//   $uploadResult = json_decode($uploadResult, true);
//   $photoId = $uploadResult[''][0]['id'];
//   return $photoId;  
// }




























?>
