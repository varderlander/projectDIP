 <?php

  $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
  $email = filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL);
  $pasw1 = filter_var(trim($_POST['pasw1']), FILTER_SANITIZE_STRING);
  $telephone = filter_var(trim($_POST['phoneN']), FILTER_SANITIZE_STRING);
  
  $cortele = '/^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/';

  if (mb_strlen($login) < 2 || mb_strlen($login) > 90){
  echo 'Недопустимая длина логина';
  exit();} 
  else if (mb_strlen($pasw1) < 3 || mb_strlen($pasw1) > 50){
  echo 'Недопустимая длина пароля';
  exit();} 
  else if (preg_match($cortele, $telephone)) {
  echo 'Номер отображается корректно'; } 
  else {
    echo 'Ошибка';
  }

  $pasw1 = md5($pasw1."uhfeasj345");


  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASSWORD', '');
  define("DB_NAME", "cinemabaze");


  $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($mysql->connect_errno) exit('Ошибка подключения к БД');
  $mysql->set_charset('utf-8');
  

  $mysql->query("INSERT INTO `users` (`username`, `email`, `password`, `telephone`) VALUES('$login','$email','$pasw1','$telephone')");
  

  $result = $mysql->query("SELECT * FROM `users` WHERE `username` = '$login'");
  
  $user = $result->fetch_assoc();

  if (count($user) == 0) {
    echo "Такой пользователь не найден";
    exit();
  }

  setcookie('usercookie', $user['username'], time() + 3600 * 24, "/");
  
  
  $mysql->close();
  header('Location: /');
?>