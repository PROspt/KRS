<?php
    session_start();
    
    include("src/actions/db_connect.php");
    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll();
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/admin.css">

    <?php
            require_once("src/blocks/header.php");
    ?>
</head>
<body>
    <div class="container">
        <div class="upr-block">
                        <div class="upr-header"><h2>Управление</h2>  </div>
                        <div class="upr">   







                        <div class="div-navbar">
  <div class="div-navbar-item" id="requestsTab">
    <svg xmlns="http://www.w3.org/2000/svg" class="navbar-icon" width="31" height="31" viewBox="0 0 31 31" fill="none">
    <path d="M15.2635 12.4012C15.1363 12.4012 15.0219 12.3758 14.8947 12.3249C14.5385 12.185 14.3096 11.8289 14.3096 11.4473V2.54379C14.3096 2.0223 14.742 1.58984 15.2635 1.58984C15.785 1.58984 16.2175 2.0223 16.2175 2.54379V9.14511L17.1333 8.22932C17.5021 7.86046 18.1126 7.86046 18.4815 8.22932C18.8504 8.59818 18.8504 9.2087 18.4815 9.57756L15.9376 12.1214C15.7596 12.2995 15.5179 12.4012 15.2635 12.4012Z" fill="#616161"/>
    <path d="M15.2642 12.4017C15.0225 12.4017 14.7808 12.3127 14.59 12.1219L12.0462 9.57802C11.6773 9.20916 11.6773 8.59863 12.0462 8.22977C12.415 7.86091 13.0256 7.86091 13.3944 8.22977L15.9383 10.7736C16.3071 11.1425 16.3071 11.753 15.9383 12.1219C15.7475 12.3127 15.5058 12.4017 15.2642 12.4017Z" fill="#616161"/>
    <path d="M17.5027 22.5767H13.0128C11.6773 22.5767 10.4817 21.8389 9.88385 20.6433L8.39569 17.667C8.34482 17.5525 8.23034 17.4889 8.11587 17.4889H2.51938C1.99789 17.4889 1.56543 17.0565 1.56543 16.535C1.56543 16.0135 1.99789 15.5811 2.51938 15.5811H8.12859C8.98078 15.5811 9.74394 16.0517 10.1255 16.8148L11.6137 19.7911C11.8808 20.3381 12.4277 20.6688 13.0382 20.6688H17.5281C18.1387 20.6688 18.6856 20.3381 18.9527 19.7911L20.4409 16.8148C20.8224 16.0517 21.5856 15.5811 22.4378 15.5811H27.9834C28.5049 15.5811 28.9374 16.0135 28.9374 16.535C28.9374 17.0565 28.5049 17.4889 27.9834 17.4889H22.4378C22.3106 17.4889 22.2089 17.5525 22.158 17.667L20.6698 20.6433C20.0339 21.8389 18.8382 22.5767 17.5027 22.5767Z" fill="#616161"/>
    <path d="M19.0789 28.9366H11.4473C4.54072 28.9366 1.58984 25.9857 1.58984 19.0792V13.9914C1.58984 8.02608 3.803 5.03705 8.76353 4.31205C9.29774 4.23573 9.76835 4.59187 9.84467 5.11337C9.92098 5.63486 9.56484 6.11819 9.04335 6.19451C5.04949 6.77959 3.49774 8.96731 3.49774 13.9914V19.0792C3.49774 24.9428 5.5837 27.0287 11.4473 27.0287H19.0789C24.9425 27.0287 27.0284 24.9428 27.0284 19.0792V13.9914C27.0284 8.96731 25.4767 6.77959 21.4828 6.19451C20.9613 6.11819 20.6052 5.63486 20.6815 5.11337C20.7578 4.59187 21.2412 4.23573 21.7627 4.31205C26.7232 5.03705 28.9363 8.02608 28.9363 13.9914V19.0792C28.9363 25.9857 25.9855 28.9366 19.0789 28.9366Z" fill="#616161"/>                      
    </svg>
    Заявки
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

<!-- Здесь ЗАЯВКИ-->
<div class="info-block" id="requestsBlock">
<div class="div-table">
                            <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($event as $row):?>
                                    <tr>
                                    <td scope="row"><?= $row['id']; ?></td>
                                    <td scope="row"><?= $row['first_name']; ?></td>
                                    <td scope="row"><?= $row['last_name']; ?></td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                            </table>
                            </div>  
</div>
</div>


 <!-- Здесь БАЗА-->
<div class="info-block" id="databaseBlock">
<div class="div-table">
                            <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($users as $row):?>
                                    <tr>
                                    <td scope="row"><?= $row['id']; ?></td>
                                    <td scope="row"><?= $row['first_name']; ?></td>
                                    <td scope="row"><?= $row['last_name']; ?></td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                            </table>
                            </div>  
</div>

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
                            <?php foreach($users as $row):?>
                                    <tr>
                                    <td scope="row"><?= $row['id']; ?></td>
                                    <td scope="row"><?= $row['first_name']; ?></td>
                                    <td scope="row"><?= $row['last_name']; ?></td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                            </table>
                            </div>  
                        </div>
                    </div> -->




    </div>
</body>







<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Получаем ссылки на вкладки
    var requestsTab = document.getElementById('requestsTab');
    var databaseTab = document.getElementById('databaseTab');
    var databaseBlock = document.getElementById('databaseBlock');
    var infoBlock = document.getElementById('infoBlock');
    var requestsBlock = document.getElementById('requestsBlock');
    
    //  для отображения информации для выбранного раздела
    function showInfoForSection(section) {
      // Очищаем содержимое блока информации
      infoBlock.innerHTML = '';
      
      // Проверяем, какой раздел выбран, и добавляем соответствующую информацию в блок
      if (section === 'requests') {
        infoBlock.innerHTML = '<p>Информация о разделе "Заявки"...</p>';
        infoBlock.innerHTML = requestsBlock.innerHTML;
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



<!-- 
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var requestsTab = document.getElementById('requestsTab');
    var databaseTab = document.getElementById('databaseTab');
    var infoBlock = document.getElementById('infoBlock');
    
    // Функция для отображения информации для выбранного раздела
    function showInfoForSection(section) {
      // Очищаем содержимое блока информации
      infoBlock.innerHTML = '';
      
      // Проверяем, какой раздел выбран, и добавляем соответствующую информацию в блок
      if (section === 'requests') {
        infoBlock.innerHTML = '<p>Информация о разделе "Заявки"...</p>';
      } else if (section === 'database') {
        infoBlock.innerHTML = '<p>Информация о разделе "База"...</p>';
      }
    }
    
    requestsTab.addEventListener('click', function() {
      requestsTab.classList.add('active');
      databaseTab.classList.remove('active');
      
      showInfoForSection('requests');
    });
    
    databaseTab.addEventListener('click', function() {
      databaseTab.classList.add('active');
      requestsTab.classList.remove('active');
      
      showInfoForSection('database');
    });
    
    // Открытие раздела "Заявки" по умолчанию
    requestsTab.click();
  });
</script> -->








<?php
            require_once("src/blocks/footer.php");
    ?>
</html>

