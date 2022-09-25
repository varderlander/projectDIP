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

    <div class='body__form_title'>
      <div class='body__title1'>
        <li><a href='./next1.php'>Рекомендуемые фильмы для просмотра</a></li>
        <a href='./next1.php'><i class='bx bx-right-arrow-alt'></i></a>
      </div>
      <div class='body__title2'>
        <li><a href='./next1.php'>Посмотреть все предложения</a></li>
      </div>
    </div>
    <div class="body__form" id="body__form">
      <?php
      include('./templates_bd/films.php');
      $films = get_films();
      foreach ($films as $film) : ?>
        <div class="slider__items__body">
          <a href='./content.php?id=<?php echo $film["id"]; ?>'><img src='<?php echo $film["film_photo"]; ?>'></a>
          <div class="text__slider">
            <li><a href='./content.php?id=<?php echo $film["id"]; ?>'><?php echo $film["film_text"]; ?></a></li>
          </div>
        </div>

      <?php endforeach; ?>

      <!-- <div class="slider__center__track">
        <div class="slider__center__item">
          <li class='dalee__1'><a class='dalee__2' href="#">Посмотреть все предложения<i class='bx bx-chevron-right'></i></a></li>
        </div>
      </div> -->
    </div>


    <!-- mult -->

    <div class='body__form_title'>
      <div class='body__title1'>
        <li><a href='./next2.php'>Мультфильмы</a></li>
        <a href='./next2.php'><i class='bx bx-right-arrow-alt'></i></a>
      </div>
      <div class='body__title2'>
        <li><a href='./next2.php'>Большой выбор мультфильмов</a></li>

      </div>
    </div>

    <div class="slider__center">

      <?php
      include('./templates_bd/multfilms.php');
      $multfilms = get_multfilms();
      foreach ($multfilms as $multfilm) : ?>

        <div class="slider__center__track">
          <div class="slider__center__item">
            <a href="./content_mult.php?id=<?php echo $multfilm["id"]; ?>"><img src="<?php echo $multfilm["mult_photo"]; ?>"></a>
            <div class="text__slider">
              <li><a href='./content_mult.php?id=<?php echo $multfilm["id"]; ?>'><?php echo $multfilm["mult_text"]; ?></a></li>
            </div>
          </div>
        </div>

      <?php endforeach; ?>

      <!-- <div class="slider__center__track">
        <div class="slider__center__item">
          <li class='dalee__1'><a class='dalee__2' href="#">Посмотреть все предложения<i class='bx bx-chevron-right'></i></a></li>
        </div>
      </div> -->

    </div>

    <!-- films -->

    <!-- <div class='body__form_title'>
      <div class='body__title1'>
        <li><a href='#'>Фильмы</a></li>
        <a href='#'><i class='bx bx-right-arrow-alt'></i></a>
      </div>
      <div class='body__title2'>
        <li><a href='#'>Фильмы на ваш выбор</a></li>

      </div>
    </div>

    <div class="slider__center">

      <?php
      include('./templates_bd/main_films.php');
      $main_films = get_main_films();
      foreach ($main_films as $main_film) : ?>

        <div class="slider__center__track">
          <div class="slider__center__item">
            <a href='./content.php?id=<?php echo $main_film["id"]; ?>'><img src="<?php echo $main_film["main_film_photo"]; ?>"></a>
            <div class="text__slider">
              <li><a href='./content.php?id=<?php echo $main_film["id"]; ?>'><?php echo $main_film["main_film_text"]; ?></a></li>
            </div>
          </div>
        </div>

      <?php endforeach; ?> -->

      <!-- <div class="slider__center__track">
        <div class="slider__center__item">
          <li class='dalee__1'><a class='dalee__2' href="#">Посмотреть все предложения<i class='bx bx-chevron-right'></i></a></li>
        </div>
      </div> -->

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
<!-- <script src="./likes.js"></script> -->

</body>

</html>