<?php

session_start();
 echo insertcomment($_REQUEST['cdesc'],$_REQUEST['pid']);

function insertcomment($cdesc,$pid)
{
$cdate = date('Y-m-d');
$ctime=time();
$uid=$_SESSION['uid'];
$bid=$_SESSION['bid'];

$link =	new mysqli('localhost','root','','movinterest');
 $sql = "INSERT INTO comments(uid,bid,pid,cdesc,ctime,cdate)
 VALUES
 ('$uid','$bid','$pid','$cdesc','$ctime','$cdate')";

$result=$link->query($sql);
//return 0;
}
?>
