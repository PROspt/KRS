<?php
  mb_internal_encoding("UTF-8");
  $host_db = "81.31.246.222";
  $user_db = "root";
  $password_db = "root8934";
  $name_db = "devrel";

  $connection_db = new mysqli($host_db, $user_db, $password_db, $name_db);
  // mysqli_set_charset($connection_db, "utf8");
  if ($connection_db == False) {
    echo "Сорян";
  }

  // $results = mysqli_query("SELECT first_name FROM users");
  // var_dump($results);
?>