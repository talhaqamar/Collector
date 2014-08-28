<?php 
session_start();
$id=$_GET['id'];
$bid = selectbid($id);
deletepic($id,$bid);
?>
<?php
function selectbid($id)
{
$link= new mysqli('localhost','root','','movinterest');
$sql="SELECT bid FROM pictures WHERE pid='$id'";
$result=$link->query($sql);
while($row = $result->fetch_assoc())
{
	return $row['bid'];
}

}
?>
<?php
function deletepic($id,$bid)
{
$link= new mysqli('localhost','root','','movinterest');
$sql="DELETE FROM pictures WHERE pid='$id'";
$result=$link->query($sql);
if($result > 0)
{
header("Location: http://localhost/MOVinterest/board.php?bid=$bid");
}

}

?>