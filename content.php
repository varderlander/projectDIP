<html>

<head>
  <meta charset="UTF-8">
  <title>Кинофильмы</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link href="./css/all.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

<script src="./www/jquery.js" type="text/javascript"></script>
<script src="./www/jquery.pack.js" type="text/javascript"></script>
<script src="./www/jquery.cookies.js" type="text/javascript"></script>
<script src="./www/js/golos.js" type="text/javascript"></script>
</head>

<div class=page>

  <?php include "./templates_bd/header.php"; ?>

  <body>

    <?php include "./templates_bd/header2.php"; ?>


    <?php
    include './templates_bd/films.php';

    $film = get_films_by_id($_GET["id"]); ?>

    <p class="top_title_film">Рекомендуемый фильм</p>

    <div class="player_video">

      <div class="title_info">
        <!-- <iframe width="660" height="365" src="#" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
        <video width="660" height="365" src="<?php echo $film['trailer_film']; ?>" controls autoplay></video>

        <div class="buttons">
          <!-- <a href="#">Забронировать билет</a> -->
          <div class="likess">
            <?php


            // Выбираем данные из таблицы films
            $article = $mysql->query("SELECT * FROM `films`");
            $row_article = $article->fetch_assoc();
            $totalRows_article = $article->num_rows;
            ?> 

            <div style="margin-left:20px;">
              <!-- Система лайков - Начало -->
              <?php $id = $row_article['id'];
              $q = $mysql->query("SELECT * FROM `films` WHERE id='$id'");
              if (($q->num_rows > 0)) {
                while ($row = $q->fetch_assoc()) {
                  $net_vote = $row['count_likes']; ?>
                  
                  <div>
                    <span class="votes_count" id="votes_count<?php echo $row['id']; ?>">   
                    </span>
                    <span class="vote_buttons" id="vote_buttons<?php echo $row['id']; ?>">
                      <a href="javascript:;" class="vote_up" id="<?php echo $row['id']; ?>"><i class='bx bx-like'></i><?php echo $net_vote; ?></a>
                    </span>

                  </div>
              <?php }
              } ?>
              <!-- Система лайков - Конец -->
          
            </div>
          </div>
        </div>
       
      </div>


      <div class="video_description">
        <h2><?php echo $film["film_text"]; ?></h2>
        <div class="about_film">
          <div class="years_old about">
            <?php echo $film["years_old"]; ?>
          </div>
          <div class="year_film about">
            <?php echo $film["year_film"]; ?>
          </div>
          <div class="time_film about">
            <?php echo $film["time_film"]; ?>
          </div>
        </div>
        <h3>О фильме</h3>
        <?php echo $film["description_film"]; ?>
      </div>
    </div>

    <div class="under_video">
      <div class="about_actors">
        <h2>Актеры</h2>
      </div>
      <div class="photos_actor">
        <?php
        include('./templates_bd/autors.php');
        $autors = get_autor($film["film_text"]);
        foreach ($autors as $autor) : ?>

          <div class="about_autor">
            <img src="<?php echo $autor["image_autor"]; ?>" alt="" srcset="">
            <div class="name_autor">
              <?php echo $autor["name_autor"]; ?>
            </div>
            <div class="surname_autor">
              <?php echo $autor["surname_autor"]; ?>
            </div>
            <div class="job_actor">
              <?php echo $autor["job_autor"]; ?>
            </div>
          </div>

        <?php endforeach; ?>
      </div>
    </div>









    <?php include './templates_bd/footer.php' ?>


</div>

<script src='./libs/jQuery/jquery-3.6.0.min.js'> </script>
<!-- <script src='https://github.com/IlyaSkriblovsky/letsee.git'></script> -->
<script src="just2.js"></script>
<script src="likes.js"></script>


</body>

</html>