<?php

require "db_connect.php";


$url = 'http://185.185.68.228:5000/send/message/vk?';
$data = ['token' => $token_vk, 'channel_id' => $_POST['chat_id-vk'], 'text' => $_POST['text']];
// $data = ['key1' => 'value1', 'key2' => 'value2'];
$options = [
    'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data),
    ],
];

$context = stream_context_create($options);
$result = file_get_contents($url . http_build_query($data), false, $context);
if ($result === false) {
    /* Handle error */
}   
print_r($result);
$url = 'http://185.185.68.228:5000/send/message/tg?';
$data = ['token' => $token_tg, 'chat_id' => $_POST['chat_id-tg'], 'text' => $_POST['text']];
// $data = ['key1' => 'value1', 'key2' => 'value2'];
$options = [
    'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data),
    ],
];

$context = stream_context_create($options);
$result = file_get_contents($url . http_build_query($data), false, $context);
if ($result === false) {
    /* Handle error */
}

print_r($result);
?>