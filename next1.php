<html>

<head>
  <meta charset="UTF-8">
  <title>Кинофильмы</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link href="./css/all.css" rel="stylesheet">

  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<!-- 
    require_once 'include/db.php';

    // -->
<div class=page>

  <!-- Основные кнопки верхнего меню and header-->
  <?php

  include './templates_bd/header.php'

  ?>

  <body>

    <!-- Меню верхнего типа -->
    <?php

    include './templates_bd/header2.php'

    ?>
    <!--____________________________________________________________-->

    <div class="tema_buttn">
      <button class="butn" id="progrButn"> <i class="fa fa-moon-o" aria-hidden="true"></i> Смени тему</button>
    </div>
    <!-- <i class="fa fa-sun-o" aria-hidden="true"></i> -->

    <!-- Body Фильм -->

    <div class="body__form1" id="body__form1">
      <?php
      include('./templates_bd/films.php');
      $films = get_films_no_limit();
      foreach ($films as $film) : ?>
        <div class="slider__items__body1">
          <a href='./content.php?id=<?php echo $film["id"]; ?>'><img src='<?php echo $film["film_photo"]; ?>'></a>
          <div class="text__slider1">
            <li><a href='./content.php?id=<?php echo $film["id"]; ?>'><?php echo $film["film_text"]; ?></a></li>
          </div>
        </div>

      <?php endforeach; ?>

    </div>



    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <df-messenger intent="WELCOME" chat-title="Фильмы" agent-id="57a71d9f-b456-4eb2-82e4-b82dbc7a741a" language-code="ru"></df-messenger>


    <?php

    include './templates_bd/footer.php'

    ?>


</div>
<script src="./www/jquery.js" type="text/javascript"></script>
<script src="./www/jquery.pack.js" type="text/javascript"></script>
<script src="./www/jquery.cookies.js" type="text/javascript"></script>
<script src="./www/js/golos.js" type="text/javascript"></script>
<script src="./auth.js"></script>
<!-- <script src='./libs/jQuery/jquery-3.6.0.min.js'> </script> -->
<!-- <script src='https://github.com/IlyaSkriblovsky/letsee.git'></script> -->
<script src="./just.js"></script>

</body>

</html>