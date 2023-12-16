<?php
  mb_internal_encoding("UTF-8");
  $host_db = "81.31.246.222";
  $user_db = "root";
  $password_db = "root8934";
  $name_db = "devrel";

  $db = new mysqli($host_db, $user_db, $password_db, $name_db);
  // mysqli_set_charset($connection_db, "utf8");

  $stmt = $db->prepare("SELECT * FROM users");
  // $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();    
  print_r($row);

?>