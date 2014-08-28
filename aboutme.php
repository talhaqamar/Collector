<?php
session_start();
//echo $_POST['aboutmesave'];
//echo $_SESSION['uid'];
//echo $_SESSION['username'];
$GLOBALS['about'] = $_POST['aboutmesave'];
$GLOBALS['uid'] = $_SESSION['uid'];
$GLOBALS['username'] = $_SESSION['username'];
if(isset($_POST['aboutmesave']))
{
$uid=$GLOBALS['uid'];
$about=$GLOBALS['about'];
$uname=$GLOBALS['username'];
setabout($uid,$uname,$about);


}

?>
<?php

function setabout($uid,$uname,$about)
{
$link =	new mysqli('localhost','root','','movinterest');
 $sql = "INSERT INTO uabout(uid,uname,uabout)
 VALUES
 ('$uid','$uname','$about')";

$result=$link->query($sql);
 if($result >0){
header("Location: http://localhost/MOVinterest/profile.php");

} 
}

?>