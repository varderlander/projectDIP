<?php

require('./include/db.php');

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Профиль пользователя</title>

  <link href="style.css" rel="stylesheet" type="text/css" />
  <link href="./css/all.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<div class=page>
  <?php include './templates_bd/header.php'
  ?>

  <body>


    <?php

    include './templates_bd/user.php';
    $users = get_user();
    foreach ($users as $user);
    ?>




    <div class="main-container">
      <img src="./photos/user3.png" alt="Аватар" srcset="">
      <div class="container-user">

        <div class="username">
          Логин: <? echo $_SESSION['user']['username']; ?>
        </div>
        <div class="email">
          Электронная почта: <? echo $_SESSION['user']['email']; ?>
        </div>
        <div class="datetime">
          Дата регистрации: <? echo $_SESSION['user']['date']; ?>
        </div>

      </div>
    </div>
        <div class="content_tabs">
          <div class="tabs">
            <nav class="tabs_items">
              <a href="#tab_1" class="tabs_item"><span>Редактор профиля</span></a>
              <!-- <a href="#tab_2" class="tabs_item"><span class="izbran">Избранное</span></a> -->
            </nav>
            <div class="tabs_body">
              <div id="tab_1" class="tabs_block">
                <form method="post" action="" id="changepas" name="next">
                  <input type="text" name="new_login" value="<?=$_SESSION['user']['username']; ?>">
                  <input type="password" name="opassword" placeholder="Старый пароль">
                  <input type="password" name="npassword" placeholder="Новый пароль">
                  <input type="submit" name="change" value="Сохранить">
                </form>
              </div>
              <!-- <div id="tab_2" class="tabs_block">
                Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Текстами, страну продолжил! Снова заглавных проектах маленькая назад рот переписали там строчка толку продолжил, рукопись вопроса дороге себя единственное пор!
              </div> -->
            </div>
          </div>
        </div>



        <?php

        include './include/db.php';



        if ($_POST['change']) {
          $id_us = $_SESSION['user']['id'];

          $new_login = $_POST['new_login'];
          $opassword = $_POST['opassword'];
          $npassword = $_POST['npassword'];
        
        if (empty($new_login)) {
          echo "<i class='order' style='font-size:24px; color:red; z-index: 999; position: fixed;' class='bx bx-error'></i><span style='color:red; z-index: 999; position: fixed;'>Не указан новый логин!</span><br>";
          exit();
        }
        if (($new_login) != $_SESSION['user']['username']) {
          $result = $mysql->query("UPDATE `users` SET `username` = '$new_login' WHERE `id` = '$id_us'");
          $_SESSION['user']['username'] = $new_login;
          header ("Refresh: 0");
        } else {
          echo "<div class='order' style='margin-bottom: 20px;'><i style='font-size:24px; color:red; margin-top:20px; display:flex; align-items:center; justify-content:center;' class='bx bx-error'></i><span style='color:red; margin-top:5px; display:flex; align-items:center; justify-content:center;'>Логин не может совпадать с предыдущим!</span><i style='font-size:24px; color:red; margin-top:20px; display:flex; align-items:center; justify-content:center;' class='bx bx-x'></i></div>";
          exit();
        }
        
        if (($opassword) or ($npassword)) {
            if (empty($opassword)) 
              echo "<div class='order' style='font-size:24px; color:red; z-index: 999; position: fixed; '><i class='bx bx-error'></i><span style='color:red; font-size:18px; z-index: 999; position: fixed;'>Не указан старый пароль!</span><br></div>";
              exit();

            if (empty($npassword)) 
              echo "<div class='order' style='font-size:24px; color:red; z-index: 999; position: fixed; '><i class='bx bx-error'></i><span style='color:red; font-size:18px; z-index: 999; position: fixed;'>Не указан новый пароль!</span><br></div>";
              exit();
            
            $npassword = md5($npassword . "uhfeasj345");
            if (($_SESSION['user']['password']) == ($npassword)) 
              echo "<div class='order' style='font-size:24px; color:red; z-index: 999; position: fixed; '><i class='bx bx-error'></i><span style='color:red; font-size:18px; z-index: 999; position: fixed;'>Новый пароль не должен быть старым!</span></div>";
              exit();
            // if (($_SESSION['user']['password']) == ($opassword)) 
            //   // echo "<i style='font-size:24px; color:red; margin-top:20px; display:flex; align-items:center; justify-content:center;' class='bx bx-error'></i><span style='color:red; margin-top:5px; display:flex; align-items:center; justify-content:center;'>Старый пароль введен неправильно!</span>";
            //   $result = $mysql->query("UPDATE `users` SET `password` = '$npassword' WHERE `id` = '$id_us'");
            //   // $opassword = $npassword;
            //   $_SESSION['user']['password'] = $npassword;
            
        
            
          } 
          // echo "<div style='font-size:24px; color:red; z-index: 999; position: fixed; '><i  class='bx bx-error'></i><span style='color:red; font-size:18px; z-index: 999; position: fixed;'>Данные успешно отправлены</span></div>";
        };
          
        ?>





    <?php

    include './templates_bd/footer.php'

    ?>


</div>


<script src='./libs/jQuery/jquery-3.6.0.min.js'> </script>
<!-- <script src='https://github.com/IlyaSkriblovsky/letsee.git'></script> -->
<script src="just2.js"></script>
</body>

</html>