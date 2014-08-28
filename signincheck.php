<?php
session_start();
$username=$_GET['username'];
$password=$_GET['password'];
validateuser($username,$password);
?>

<?php
function validateuser($username,$password)
{
$link =	new mysqli('localhost','root','','movinterest');
$sql="SELECT uid,uname,upassword FROM user WHERE uname ='$username' AND upassword ='$password'";
$result1=$link->query($sql);
while($row = $result1->fetch_assoc())
{
	if(($username==$row['uname']) && ($password==$row['upassword']))
	{
		$_SESSION['uid']=$row['uid'];
	    $_SESSION['username']=$row['uname'];
		header("Location: http://localhost/MOVinterest/profile.php");
     }
	 else{	header("Location: http://localhost/MOVinterest/index.php");}
}
}

?>