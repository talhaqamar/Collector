<?php
session_start();
if(isset($_SESSION['username'])){
$username=$_SESSION['username'];
$bname=$_POST['bname'];
$bdesc=$_POST['bdesc'];
$uid = $_SESSION['uid'];
//echo $_SESSION['username'];
$cat=$_POST['bcategory'];
getcategoryid($cat);
$catid = $GLOBALS['cid'];
createboard($uid,$bname,$bdesc,$catid);
}
else{header("Location: http://localhost/MOVinterest/index.php"); }
?>
<?php
function createboard($uid,$bname,$bdesc,$catid){
 $link =	new mysqli('localhost','root','','movinterest');
 $sql = "INSERT INTO board(uid,bname,bdesc,bcategory)
 VALUES
 ('$uid','$bname','$bdesc','$catid')";

$result=$link->query($sql);
if($result >0){
header("Location: http://localhost/MOVinterest/profile.php");//break;
}
}
?>

<?php
function getcategoryid($cat){
 $link =	new mysqli('localhost','root','','movinterest');
$sql="SELECT cid,cname FROM tcategories WHERE cname ='$cat'";
$result1=$link->query($sql);
while($row = $result1->fetch_assoc())
{
if($row['cname'] == $cat)
{
$GLOBALS['cid']=$row['cid'];
}
}
}

?>