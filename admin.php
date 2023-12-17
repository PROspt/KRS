<?php
    session_start();
    
    include("src/actions/db_connect.php");
    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll();

    $stmt = $pdo->prepare("SELECT * FROM user_event");
    $stmt->execute();
    $user_event = $stmt->fetchAll();
    $stmt = $pdo->prepare("SELECT token_tg, token_vk FROM admin");
    $stmt->execute();
    $admin = $stmt->fetch();
    if ($admin) {
    $token_tg = $admin["token_tg"];
    $token_vk = $admin["token_vk"];
} else {
    echo "Нет результатов";
}

if(isset($_POST['replace_token'])) {

  // Получение значений из формы
  $new_token_tg = $_POST['token_tg'];
  $new_token_vk = $_POST['token_vk'];

  // Обновление значений в базе данных
  $sql = "UPDATE admin SET token_tg=:new_token_tg, token_vk=:new_token_vk";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
    'new_token_tg' => $new_token_tg,
    'new_token_vk' => $new_token_vk
  ));


header("Location: admin.php");
exit(); 
}
?>

<!-- JQ и его фреймворки -->
<script
  src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
  integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    

    <?php
            require_once("src/blocks/header.php");
    ?>
    <link rel="stylesheet" href="styles/admin.css">
</head>
<body>
    <div class="container">
        <div class="upr-block">
                        <div class="upr-header"><h2>Управление</h2>  </div>
                        <div class="upr">
                          
<script src='tablesort.min.js'></script>

<!-- Include sort types you need -->
<script src='tablesort.number.js'></script>
<script src='tablesort.date.js'></script>
                        <div class="div-navbar">
                        <div class="div-navbar-item" id="requestsTab">
                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
  <path d="M15.2654 20.0357C12.6322 20.0357 10.4951 17.8986 10.4951 15.2654C10.4951 12.6322 12.6322 10.4951 15.2654 10.4951C17.8986 10.4951 20.0357 12.6322 20.0357 15.2654C20.0357 17.8986 17.8986 20.0357 15.2654 20.0357ZM15.2654 12.4032C13.688 12.4032 12.4032 13.688 12.4032 15.2654C12.4032 16.8428 13.688 18.1276 15.2654 18.1276C16.8428 18.1276 18.1276 16.8428 18.1276 15.2654C18.1276 13.688 16.8428 12.4032 15.2654 12.4032Z" fill="#616161"/>
  <path d="M19.3481 28.2279C19.081 28.2279 18.8139 28.1897 18.5467 28.1261C17.758 27.9099 17.0965 27.4138 16.6768 26.7141L16.5241 26.4597C15.7736 25.1622 14.7432 25.1622 13.9927 26.4597L13.8527 26.7014C13.4329 27.4138 12.7715 27.9226 11.9828 28.1261C11.1814 28.3424 10.3545 28.2279 9.65485 27.8081L7.46687 26.5488C6.6909 26.1035 6.13118 25.3784 5.88949 24.5007C5.66051 23.623 5.775 22.7198 6.22023 21.9438C6.58913 21.2951 6.6909 20.7099 6.47464 20.341C6.25839 19.9721 5.71139 19.7558 4.96086 19.7558C3.10362 19.7558 1.58984 18.2421 1.58984 16.3848V14.1459C1.58984 12.2887 3.10362 10.7749 4.96086 10.7749C5.71139 10.7749 6.25839 10.5587 6.47464 10.1898C6.6909 9.82086 6.60185 9.2357 6.22023 8.58694C5.775 7.81097 5.66051 6.89507 5.88949 6.03005C6.11846 5.15231 6.67818 4.42723 7.46687 3.982L9.66757 2.72264C11.105 1.87034 13.0004 2.36645 13.8654 3.82935L14.0181 4.08376C14.7686 5.38129 15.799 5.38129 16.5495 4.08376L16.6895 3.84207C17.5545 2.36645 19.4499 1.87034 20.9001 2.73536L23.0881 3.99472C23.864 4.43995 24.4237 5.16504 24.6654 6.04277C24.8944 6.92051 24.7799 7.82369 24.3347 8.59966C23.9658 9.24842 23.864 9.83358 24.0803 10.2025C24.2965 10.5714 24.8435 10.7876 25.5941 10.7876C27.4513 10.7876 28.9651 12.3014 28.9651 14.1587V16.3975C28.9651 18.2548 27.4513 19.7686 25.5941 19.7686C24.8435 19.7686 24.2965 19.9848 24.0803 20.3537C23.864 20.7226 23.9531 21.3078 24.3347 21.9565C24.7799 22.7325 24.9071 23.6484 24.6654 24.5134C24.4365 25.3912 23.8767 26.1162 23.0881 26.5615L20.8873 27.8208C20.404 28.088 19.8824 28.2279 19.3481 28.2279ZM15.2647 23.5212C16.3969 23.5212 17.4527 24.2336 18.1778 25.4929L18.3177 25.7346C18.4704 26.0018 18.7248 26.1926 19.0301 26.2689C19.3354 26.3452 19.6407 26.3071 19.8951 26.1544L22.0958 24.8823C22.4266 24.6915 22.681 24.3735 22.7828 23.9919C22.8845 23.6102 22.8336 23.2159 22.6428 22.8852C21.9177 21.6385 21.8287 20.3537 22.3884 19.3742C22.9481 18.3947 24.1057 17.835 25.5559 17.835C26.37 17.835 27.0188 17.1862 27.0188 16.3721V14.1332C27.0188 13.3318 26.37 12.6703 25.5559 12.6703C24.1057 12.6703 22.9481 12.1106 22.3884 11.1311C21.8287 10.1516 21.9177 8.8668 22.6428 7.62016C22.8336 7.28942 22.8845 6.89507 22.7828 6.51344C22.681 6.13182 22.4393 5.82652 22.1085 5.62299L19.9078 4.36362C19.3608 4.03288 18.6358 4.22369 18.305 4.78341L18.1651 5.02511C17.44 6.28447 16.3842 6.99684 15.252 6.99684C14.1199 6.99684 13.064 6.28447 12.3389 5.02511L12.199 4.77069C11.881 4.23641 11.1686 4.0456 10.6216 4.36362L8.42093 5.63571C8.09019 5.82652 7.83577 6.14454 7.73401 6.52617C7.63224 6.90779 7.68312 7.30214 7.87394 7.63288C8.59902 8.87952 8.68807 10.1643 8.12835 11.1438C7.56864 12.1233 6.41104 12.683 4.96086 12.683C4.14673 12.683 3.49797 13.3318 3.49797 14.1459V16.3848C3.49797 17.1862 4.14673 17.8477 4.96086 17.8477C6.41104 17.8477 7.56864 18.4074 8.12835 19.3869C8.68807 20.3664 8.59902 21.6512 7.87394 22.8979C7.68312 23.2286 7.63224 23.623 7.73401 24.0046C7.83577 24.3862 8.07747 24.6915 8.40821 24.895L10.6089 26.1544C10.8761 26.3198 11.1941 26.3579 11.4867 26.2816C11.792 26.2053 12.0464 26.0018 12.2117 25.7346L12.3517 25.4929C13.0768 24.2463 14.1326 23.5212 15.2647 23.5212Z" fill="#616161"/>
</svg>
                  Настройки
                </div>

  <div class="div-navbar-item " id="postingTab">
    <img class="navbar-icon" xmlns="images/mail.svg" width="31" height="31" viewBox="0 0 31 31">

</img>
    Постинг
  </div>

  <div class="div-navbar-item " id="databaseTab">
    <svg class="navbar-icon" xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
    <g clip-path="url(#clip0_78_500)">

<path d="M27.9826 6.99512C27.9826 6.99512 27.9825 22.9339 27.9825 24.1662C27.9825 26.2736 22.2879 27.982 15.2632 27.982C8.23857 27.982 2.54396 26.2736 2.54396 24.1662C2.54396 22.9847 2.54395 6.99512 2.54395 6.99512" stroke="white" stroke-width="2.54386" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M27.9825 18.4434C27.9825 20.5508 22.2879 22.2591 15.2632 22.2591C8.23857 22.2591 2.54395 20.5508 2.54395 18.4434" stroke="white" stroke-width="2.54386" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M27.9825 12.7188C27.9825 14.8261 22.2879 16.5345 15.2632 16.5345C8.23857 16.5345 2.54395 14.8261 2.54395 12.7188" stroke="white" stroke-width="2.54386" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M15.2632 10.1755C22.2879 10.1755 27.9825 8.46714 27.9825 6.35974C27.9825 4.25233 22.2879 2.54395 15.2632 2.54395C8.23857 2.54395 2.54395 4.25233 2.54395 6.35974C2.54395 8.46714 8.23857 10.1755 15.2632 10.1755Z" stroke="white" stroke-width="2.54386" stroke-linecap="round" stroke-linejoin="round"/>
</g>
    </svg>
    База
  </div>
</div>
 
<div class="info-block" id="infoBlock">
</div>


<div style="display:none;">

<!-- Здесь Параметры-->
<div class="info-block" id="paramsBlock">
  <div class="settings-div">
    <form action="" method="post">
      <input type="text" name="token_tg" placeholder="Токен телеграм бота" value="<?php echo $token_tg; ?>">
      <input type="text" name="token_vk" placeholder="acces_token Вконтакте" value="<?php echo $token_vk; ?>">
      <button type="submit" name = "replace_token">Обновить</button>
    </form>
  </div>
</div>


 <!-- Здесь БАЗА-->
<div class="info-block" id="databaseBlock" style="display: none">
<div class="div-table">
                            <table id="userst" class="table">
                            <caption></caption>
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach($users as $row):?>
                                    <tr>
                                      <td><?= $row['id']; ?></td>
                                      <td><?= $row['first_name']; ?></td>
                                      <td><?= $row['last_name']; ?></tdpe=>
                                      <td><?= $sum = 0;
                                    foreach($user_event as $row2) {
                                      if ($row2["id_user"] == $row['id']) {
                                        $sum += $row2["exp"];
                                      }
                                    } 
                                    
                                    echo $sum;?></td>

                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                            </table>
                            </div>  
</div>

<script>
  // Фильтр таблиц

</script>

</div>




<!-- 
                            <div class="div-navbar">
                                <div class="div-navbar-item">
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                class="navbar-icon" width="31" height="31" viewBox="0 0 31 31" fill="none">
                                            <path d="M15.2635 12.4012C15.1363 12.4012 15.0219 12.3758 14.8947 12.3249C14.5385 12.185 14.3096 11.8289 14.3096 11.4473V2.54379C14.3096 2.0223 14.742 1.58984 15.2635 1.58984C15.785 1.58984 16.2175 2.0223 16.2175 2.54379V9.14511L17.1333 8.22932C17.5021 7.86046 18.1126 7.86046 18.4815 8.22932C18.8504 8.59818 18.8504 9.2087 18.4815 9.57756L15.9376 12.1214C15.7596 12.2995 15.5179 12.4012 15.2635 12.4012Z" fill="#616161"/>
                                            <path d="M15.2642 12.4017C15.0225 12.4017 14.7808 12.3127 14.59 12.1219L12.0462 9.57802C11.6773 9.20916 11.6773 8.59863 12.0462 8.22977C12.415 7.86091 13.0256 7.86091 13.3944 8.22977L15.9383 10.7736C16.3071 11.1425 16.3071 11.753 15.9383 12.1219C15.7475 12.3127 15.5058 12.4017 15.2642 12.4017Z" fill="#616161"/>
                                            <path d="M17.5027 22.5767H13.0128C11.6773 22.5767 10.4817 21.8389 9.88385 20.6433L8.39569 17.667C8.34482 17.5525 8.23034 17.4889 8.11587 17.4889H2.51938C1.99789 17.4889 1.56543 17.0565 1.56543 16.535C1.56543 16.0135 1.99789 15.5811 2.51938 15.5811H8.12859C8.98078 15.5811 9.74394 16.0517 10.1255 16.8148L11.6137 19.7911C11.8808 20.3381 12.4277 20.6688 13.0382 20.6688H17.5281C18.1387 20.6688 18.6856 20.3381 18.9527 19.7911L20.4409 16.8148C20.8224 16.0517 21.5856 15.5811 22.4378 15.5811H27.9834C28.5049 15.5811 28.9374 16.0135 28.9374 16.535C28.9374 17.0565 28.5049 17.4889 27.9834 17.4889H22.4378C22.3106 17.4889 22.2089 17.5525 22.158 17.667L20.6698 20.6433C20.0339 21.8389 18.8382 22.5767 17.5027 22.5767Z" fill="#616161"/>
                                            <path d="M19.0789 28.9366H11.4473C4.54072 28.9366 1.58984 25.9857 1.58984 19.0792V13.9914C1.58984 8.02608 3.803 5.03705 8.76353 4.31205C9.29774 4.23573 9.76835 4.59187 9.84467 5.11337C9.92098 5.63486 9.56484 6.11819 9.04335 6.19451C5.04949 6.77959 3.49774 8.96731 3.49774 13.9914V19.0792C3.49774 24.9428 5.5837 27.0287 11.4473 27.0287H19.0789C24.9425 27.0287 27.0284 24.9428 27.0284 19.0792V13.9914C27.0284 8.96731 25.4767 6.77959 21.4828 6.19451C20.9613 6.11819 20.6052 5.63486 20.6815 5.11337C20.7578 4.59187 21.2412 4.23573 21.7627 4.31205C26.7232 5.03705 28.9363 8.02608 28.9363 13.9914V19.0792C28.9363 25.9857 25.9855 28.9366 19.0789 28.9366Z" fill="#616161"/>
                                            </svg>
                                                                Заявки
                                                            </div>


                                                            <div class="div-navbar-item div-navbar-item-enable">

                                            <svg class="navbar-icon" xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                                            <g clip-path="url(#clip0_78_500)">

                                                <path d="M27.9826 6.99512C27.9826 6.99512 27.9825 22.9339 27.9825 24.1662C27.9825 26.2736 22.2879 27.982 15.2632 27.982C8.23857 27.982 2.54396 26.2736 2.54396 24.1662C2.54396 22.9847 2.54395 6.99512 2.54395 6.99512" stroke="white" stroke-width="2.54386" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M27.9825 18.4434C27.9825 20.5508 22.2879 22.2591 15.2632 22.2591C8.23857 22.2591 2.54395 20.5508 2.54395 18.4434" stroke="white" stroke-width="2.54386" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M27.9825 12.7188C27.9825 14.8261 22.2879 16.5345 15.2632 16.5345C8.23857 16.5345 2.54395 14.8261 2.54395 12.7188" stroke="white" stroke-width="2.54386" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M15.2632 10.1755C22.2879 10.1755 27.9825 8.46714 27.9825 6.35974C27.9825 4.25233 22.2879 2.54395 15.2632 2.54395C8.23857 2.54395 2.54395 4.25233 2.54395 6.35974C2.54395 8.46714 8.23857 10.1755 15.2632 10.1755Z" stroke="white" stroke-width="2.54386" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_78_500">
                                                <rect width="30.5263" height="30.5263" fill="white"/>
                                                </clipPath>
                                            </defs>
                                            </svg>
                                База
                                </div>
                            </div>     
                            <div class="div-table">
                            <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>

                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            </table>
                            </div>  
                        </div>
                    </div> -->





    </div>
</body>

<table id="table_text">
  <thead>
    <tr>
      <th>лол</th>
      <th>лол2</th>
      <th>лол3</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>12</td>
      <td>25</td>
      <td>14</td>
    </tr>
    <tr>
      <td>14</td>
      <td>82</td>
      <td>11</td>
    </tr>
  </tbody>
</table>

<script>
  new Tablesort(document.getElementById('table_text'));

  new Tablesort(document.getElementById('userst'), {
    // descending: true
  });
</script>







<script>



  document.addEventListener('DOMContentLoaded', function() {
    // Получаем ссылки на вкладки
    var requestsTab = document.getElementById('requestsTab');
    var databaseTab = document.getElementById('databaseTab');
    var databaseBlock = document.getElementById('databaseBlock');
    var infoBlock = document.getElementById('infoBlock');
    var paramsBlock = document.getElementById('paramsBlock');
    
    //  для отображения информации для выбранного раздела
    function showInfoForSection(section) {
      // Очищаем содержимое блока информации
      infoBlock.innerHTML = '';
      
      // Проверяем, какой раздел выбран, и добавляем соответствующую информацию в блок
      if (section === 'requests') {
        infoBlock.innerHTML = '<p>Информация о разделе "Заявки"...</p>';
        infoBlock.innerHTML = paramsBlock.innerHTML;
      } else if (section === 'database') {
        infoBlock.innerHTML = '<p>Информация о разделе "База"...</p>';
        infoBlock.innerHTML = databaseBlock.innerHTML;
      }
    }
    //  обработчики событий на вкладки
    requestsTab.addEventListener('click', function() {
      // Добавляем классы активной вкладке и удаляем у второй вкладки
      requestsTab.classList.add('active', 'div-navbar-item-enable');
      databaseTab.classList.remove('active', 'div-navbar-item-enable');
      showInfoForSection('requests');
    });
    
    databaseTab.addEventListener('click', function() {
      // Добавляем классы активной вкладке и удаляем у первой вкладки
      databaseTab.classList.add('active', 'div-navbar-item-enable');
      requestsTab.classList.remove('active', 'div-navbar-item-enable');
      showInfoForSection('database');
    });
    
    // Открытие вкладки "База" по умолчанию
    databaseTab.click();
  });
</script>


  








<?php
            require_once("src/blocks/footer.php");
    ?>
</html>