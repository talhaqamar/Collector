<?php
session_start();
if(isset($_SESSION['username'])){
$username=$_SESSION['username'];

$uid=$_SESSION['uid'];
$bid=$_SESSION['bid'];
$bname=$_POST['bname'];
$bdesc=$_POST['bdesc'];
$cat=$_POST['bcategory'];
getcategoryid($cat);
$cid=$GLOBALS['cid'];
updateboard($bname,$bdesc,$cid,$uid,$bid);
}
else{header("Location: http://localhost/MOVinterest/index.php"); }
?>
<?php
//var_dump($_POST);

?>
<?php
function updateboard($bname,$bdesc,$cid,$uid,$bid){
$link =	new mysqli('localhost','root','','movinterest');
$sql="UPDATE board SET bname ='$bname' ,bdesc = '$bdesc' ,bcategory = '$cid' WHERE uid = '$uid' AND bid = '$bid'" ;
$result=$link->query($sql);
if($result>0)
{
///echo( "Sucessfully updated.Click to go back");
header("Location: http://localhost/MOVinterest/board.php");
}
else
{
//echo"Unable to update";
}
$link->close();
}
?>
<?php
function getcategoryid($cat){
 $link =	new mysqli('localhost','root','','movinterest');
$sql="SELECT cid,cname FROM tcategories WHERE cname ='$cat'";
$result1=$link->query($sql);
while($row = $result1->fetch_assoc())
{
if($cat == $row['cname'] )
{
$GLOBALS['cid']=$row['cid'];
}
}
}

?>