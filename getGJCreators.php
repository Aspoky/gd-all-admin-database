<?php
error_reporting(0);
include "connection.php";
require_once "incl/exploitPatch.php";
$ep = new exploitPatch();
$accountID = $ep->remove($_POST["accountID"]);
$type = $ep->remove($_POST["type"]);
$query = "SELECT * FROM users WHERE isBanned = '0' ORDER BY creatorPoints DESC LIMIT 100";
$query = $db->prepare($query);
$query->execute([':stars' => $stars, ':count' => $count]);
$result = $query->fetchAll();
$people = $query->rowCount();
for ($x = 0; $x < $people; $x++) {
	if($x != 0){
		echo "|";
	}
	$user = $result[$x];
	if(is_numeric($user["extID"])){
		$extid = $user["extID"];
	}else{
		$extid = 0;
	}
	$xi = $x + 1;
	echo "1:".$user["userName"].":2:".$user["userID"].":13:".$user["coins"].":17:".$user["userCoins"].":6:".$xi.":9:".$user["icon"].":10:".$user["color1"].":11:".$user["color2"].":14:".$user["iconType"].":15:".$user["special"].":16:".$extid.":3:".$user["stars"].":8:".$user["creatorPoints"].":4:".$user["demons"].":7:".$extid.":46:".$user["diamonds"]."";
}

?>		