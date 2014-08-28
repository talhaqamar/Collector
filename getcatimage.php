<?php
	session_start();
//if(isset($_SESSION['pdesc'])){ unset($_SESSION['pdesc']);}
function getimageid($id)
{

	$username = $_SESSION['username'];
	$path="";
	$cname =  $_SESSION['categories'];
	
	
	$link =	new mysqli('localhost','root','','movinterest');
	$sql="SELECT catname,catdesc FROM ".$cname." WHERE catid = ".$id;
	$result1=$link->query($sql);
	
	while($row = $result1->fetch_assoc())
		{
		
		
		 echo '<div align="right">';
		echo '<a href="repin.php?id='.$id.'" class="btn btn-small btn-success" align="right">Repin Pic</a>';
		
		 echo '</div>';
		 echo '<br/>';
		 $pname="http://localhost/MOVinterest/upload/$cname/".$row['catname'].".JPG";
		echo '<img src="'.$pname.'" width="550" height="450"/>';
		echo '<br/>';
		echo '<br/>';
		//$GLOBALS['pdesc']=$row['pdesc'];
       	
		//$_SESSION['desc']= $row['pdesc'];
		
	
		
	}
}

?>
<?php  getimageid($_REQUEST['image_id']);?>

	