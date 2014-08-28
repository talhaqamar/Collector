<?php
	session_start();
	
	 // if(isset($_POST['comment']))
	 // {
	 // $var = $_POST['comment'];
	 // insertcomment($var);
	  // echo getComment($_REQUEST['image_id']);
 // }
	?>
	<?php
function getComment($id)
{
	$username=$_SESSION['username'];
$image = $_SESSION['uimage'];
	//$pname="";
	$link =	new mysqli('localhost','root','','movinterest');
	$uid=$_SESSION['uid'];
$bid=$_SESSION['bid'];
	$sql="SELECT cdesc FROM comments WHERE uid='$uid' AND pid ='$id' ORDER by ctime ASC";
	$result1=$link->query($sql);
	while($row = $result1->fetch_assoc())
		{
		$cdesc=$row['cdesc']; 
		
	
		$v="http://localhost/MOVinterest/upload/$username/".$image; 
		//echo '';
 echo '<img src="'.$v.'" class="img-polaroid" width="20" height="20" alt="" />';
 echo '&nbsp;&nbsp;&nbsp;';
	echo '<span class="span6 input-xlarge uneditable-input">';
	echo $cdesc;
	echo '</span><br/>';
	
	
	
	}
}
//echo getimageid($_REQUEST['image_id']);
?>



<?php getComment($_REQUEST['image_id']);
?>