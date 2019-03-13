<?php
session_start();
require_once "config.php";
try {
	$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
	$sth = $dbh->prepare("SELECT players.job FROM players WHERE id = :id");
	$sth->bindValue(':id', $_SESSION['user']);
  	$sth->execute();
	$currJOB = $sth->fetch();
}
catch (PDOException $e) {
    echo "<p>Error connecting to database!</p>";
}
 ?>
{
	"currentJOB": <?php echo $currJOB[0];?>
}
