<?php // Скрипт обработчик системы лайков
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASSWORD', '');
  define("DB_NAME", "cinemabaze");


  $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($mysql->connect_errno) exit('Ошибка подключения к БД');
  $mysql->set_charset('utf-8');

if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    include("config.php");
    $day = date("Y-m-d H:i:s");
    $mysql->query("DELETE FROM `vote_ip` WHERE date_resp < '$day'");

    function getAllVotes($id) {
			global $mysql;
	    $votes = array();
	    $q = $mysql->query("SELECT * FROM `films` WHERE id='$id'");
			// $row_cnt = $q->num_rows;
	    if(($q->num_rows)==$id) { //id наден в таблице
		    $row = $q->fetch_assoc();
		    $votes[0] = $row['count_likes'];
		}
	    return $votes;
	}

    function getEffectiveVotes($id) {
	    $votes = getAllVotes($id);
	    $effectiveVote = $votes[0];
	    return $effectiveVote;
	}

    $id = $_POST['id'];
    $action = $_POST['action'];
    $cur_votes = getAllVotes($id);
	
    $ip = $_SERVER['REMOTE_ADDR']; 
    $r = $mysql->query("SELECT * FROM `vote_ip` WHERE id_resp='$id' AND ip='$ip'"); // проверяем юзера на IP
    if(($q->num_rows)==1) {
        echo "<span style='color:#666;'>Понравился материал</span> ".getEffectiveVotes($id)."<span style='color:#E57057;'> 
		      Вы уже оставили свой голос!</span>"; // Ошибка если уже голосовали
        exit;
    }

    if($action=='vote_up') {
	    $count_likes = $cur_votes[0]+1;
	    $q = $mysql->query("UPDATE `films` SET count_likes='$count_likes' WHERE id='$id'");
    }
	
    if($r) {
	    $effectiveVote = getEffectiveVotes($id);
	    echo "<span style='color:#666;'>Понравился материал</span> ".$effectiveVote." <span style='color:#E57057;'>Спасибо за Ваш голос!</span>";
	    $date_resp = date("Y-m-d",time()+ 1*24*60*60); // запоминаем завтрашнююю дату
	    $res = $mysql->query("INSERT INTO vote_ip (id_resp, ip, date_resp) VALUES ('$id','$ip','$date_resp')");
	    // В таблицу vote_ip заносим id статьи, ip посетителя и завтрашнюю дату-время
	} // Добавлен голос
    else if(!$r) {
	    echo "Ошибка!";
	}
}

else exit("Посторонним вход воспрещен");
?>
