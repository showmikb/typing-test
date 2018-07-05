<?php
session_start();
require_once 'api/db.php';
$id = $_SESSION['id'];
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}
     	$sql = "SELECT * FROM user WHERE id = '".$id."' ";
        $query = mysql_query($sql);
        $row1 = mysql_fetch_array($query);
        $uname = $row1['username'];

        $sql2 = "SELECT * FROM test WHERE user_id = '".$id."' ";
        $query2 = mysql_query($sql2);
        $row2 = mysql_num_rows($query2);


 $wpm = htmlspecialchars($_POST['wpm']);
if($row2  > 0){
	mysql_query("UPDATE test SET wpm ='".$wpm."' WHERE user_id = '".$id."'");
}else{
 	mysql_query("INSERT INTO test(user_id, uname, wpm) VALUES('".$id."', '".$uname."' , '".$wpm."')");
}

?>