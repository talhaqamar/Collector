<?php
session_start();
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$uid=$_SESSION['uid'];
$pname=$_SESSION['nuimage'];
//$pname = $pname;
$bname=$_POST['bcategory'];
getboardid($uid,$bname);

$pdesc = $_POST['pdesc'];
$bid = $_SESSION['bid'];
//echo $pname;
insertpictoboard($uid,$bid,$pname,$pdesc);

}
else{ header("Location: http//localhost/MOVinterest/index.php");}
?>
<?php
function getboardid($uid,$bname)
{

$link =	new mysqli('localhost','root','','movinterest');
$sql="SELECT uid,bid,bname FROM board WHERE uid ='$uid' AND bname = '$bname'";
$result1=$link->query($sql);
while($row = $result1->fetch_assoc())
{
if(($row['uid']==$uid) && ($row['bname']==$bname))
{
$_SESSION['bid']=$row['bid'];
}
}}
?>
<?php
function insertpictoboard($uid,$bid,$pname,$pdesc)
{
$link = new mysqli('localhost','root','','movinterest');
$sql = "INSERT INTO pictures(uid,bid,pname,pdesc)
 VALUES
 ('$uid','$bid','$pname','$pdesc')";
 $result = $link->query($sql);
 if($result > 0)
 {
 //echo 'kch hua ha';
 header("Location: http://localhost/MOVinterest/board.php?bid=$bid");
 }
 else{
 echo 'kch nae hua ha'; }



}

?>