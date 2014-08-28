<?php
	session_start();
//if(isset($_SESSION['pdesc'])){ unset($_SESSION['pdesc']);}
function getimageid($id)
{
	$username=$_SESSION['username'];
	$pname="";
	$pdesc="";
	$link =	new mysqli('localhost','root','','movinterest');
	$sql="SELECT pname,pdesc FROM pictures WHERE pid ='$id'";
	$result1=$link->query($sql);
	while($row = $result1->fetch_assoc())
		{
		 //$_SESSION['pdesc'] = $row['pdesc'];
	echo '<div class="row-fluid">';	
		echo '<div align="left">'.$row['pdesc'].'</div>';
		echo '</div>';
		echo '<div class="row-fluid">';
		 echo '<div align="right">';
		// echo '<a href="#" class="btn btn-small btn-success" align="right">Repin</a>'.'&nbsp;&nbsp;';
		 echo '<a href="deletepic.php?id='.$id.'" class="btn btn-small btn-danger" align="right">Delete Pic</a>';
		
		 echo '</div>';
		 echo '</div>';
 echo '<br/>';
		 $pname="http://localhost/MOVinterest/upload/$username/".$row['pname'];
		echo '<img src="'.$pname.'" width="550" height="350"/>';
		echo '<br/>';
		
		//$GLOBALS['pdesc']=$row['pdesc'];
       	
		//$_SESSION['desc']= $row['pdesc'];
		}
	//return $pname;
}
//echo getimageid($_REQUEST['image_id']);
?>
<?php  getimageid($_REQUEST['image_id']);?>

	