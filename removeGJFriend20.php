<?php
include "connection.php";
require_once "incl/GJPCheck.php";
require_once "incl/exploitPatch.php";
$ep = new exploitPatch();
$accountID = $ep->remove($_POST["accountID"]);
$gjp = $ep->remove($_POST["gjp"]);
$targetAccountID = $ep->remove($_POST["targetAccountID"]);
// REMOVING FOR USER 1
$query = "DELETE FROM friendships WHERE person1 = :accountID AND person2 = :targetAccountID";
$query = $db->prepare($query);
$query2 = "DELETE FROM friendships WHERE person2 = :accountID AND person1 = :targetAccountID";
$query2 = $db->prepare($query2);
//EXECUTING THE QUERIES
$GJPCheck = new GJPCheck();
$gjpresult = $GJPCheck->check($gjp,$accountID);
if($gjpresult == 1){
	$query->execute([':accountID' => $accountID, ':targetAccountID' => $targetAccountID]);
	$query2->execute([':accountID' => $accountID, ':targetAccountID' => $targetAccountID]);
	echo "1";
}else{
	echo "-1";
}
?>