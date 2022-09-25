<?php

  session_start();

  $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
  $pasw1 = filter_var(trim($_POST['pasw1']), FILTER_SANITIZE_STRING);

  $pasw1 = md5($pasw1."uhfeasj345");


  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASSWORD', '');
  define("DB_NAME", "cinemabaze");


  $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($mysql->connect_errno) exit('Ошибка подключения к БД');
  $mysql->set_charset('utf-8');
  
  $result = $mysql->query("SELECT * FROM `users` WHERE `username` = '$login' AND `password` = '$pasw1'");
  if ($result->num_rows > 0){
    
    $user = $result->fetch_assoc();
    
    $_SESSION['user'] = [

      "id" => $user['id'],
      "username" => $user['username'],
      "email" => $user['email'],
      "password" => $user['password'],
      "telephone" => $user['telephone'],
      "date" => $user['date']

    ];


 
  }
  if (count($user) == 0) {
    exit();
  }

  setcookie('usercookie', $user['username'], time() + 3600 * 24, "/");

  $mysql->close();

  header('Location: /');
?>