<?php 

  setcookie('usercookie', $user['username'], time() - 3600 * 24, "/");
  header('Location: /');

?>