<?php
session_start();
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$uid=$_SESSION['uid'];
$id=$_GET['id'];
$cname=$_SESSION['categories'];
getimage($id,$cname);
}
else{ header("Location: http//localhost/MOVinterest/index.php");}
?>
<?php
function getimage($id,$cname)
{
$link =	new mysqli('localhost','root','','movinterest');
	$sql="SELECT catname,catdesc FROM ".$cname." WHERE catid = ".$id;
	$result1=$link->query($sql);
	
	while($row = $result1->fetch_assoc())
		{
		$GLOBALS['getcatname']=$row['catname'];
}
}
?>
<!doctype html>
<html>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>MOVinterest</title>
        <!-- TODO: make sure bootstrap.min.css points to BootTheme
        generated file -->
        <link href="bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- TODO: make sure bootstrap-responsive.min.css points to BootTheme
        generated file -->
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css"
        rel="stylesheet">
    <link href="main.css" rel="stylesheet">
</head>
    
    <body>
        <div class="container-fluid" >
            <br>
            <section>
                <div class="navbar-inner">
                    <br>
                    <div class="span4" align="left">
                        <form class="form-search">
                            <div class="input-append">
                                <input type="text" class="span2 search-query" size="200" maxlength="50"
                                placeholder="Search...">
                                <button type="submit" class="btn">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="span4 offset0" align="center">
                        <a href="#" class="btn btn-large btn-danger">MOVinterest</a>
                    </div>
				
				
				
				
  
  	<div class="btn-group offset2">
	<label class="btn dropdown-toggle" data-toggle="dropdown"><strong></strong> &nbsp;
    <span class="caret"></span>
  </label>
  <ul class="dropdown-menu pull-right">
   <li><a tabindex="-1" href="profile.php">Profile</a></li>
    <li class="divider"></li>
    <li><a tabindex="-1" href="logout.php">Logout</a></li>
  </ul>
</div>

</div>
<br/><br/>
<div class="row-fluid span12">
<div class="row-fluid span6" align="center">
<h3><strong>Add Image to Board</strong></h3>
</div>
</div>
<div class="row-fluid span8" align="center">
<br/><br/>

<div class="span4 offset1" align="center">
<?php $image=$GLOBALS['getcatname'];
$_SESSION['repinimgname'] = $image;
	?>
<?php $path="http://localhost/MOVinterest/upload/$cname/$image".".JPG"; ?>
<img class="image" src="<?php echo $path; ?>" alt="placeholder image" style="{height:250px;width:250px;}" >
</div>
<div class=" span4" align="center">
<form action="insertpictoboard.php" method="POST">
<select name="bcategory">
                                
<?php
$link = new mysqli('localhost','root','','movinterest');
$sql = "SELECT uid,bid,bname FROM board WHERE 
uid ='$uid'";
$result= $link->query($sql);
while($row = $result->fetch_assoc())
{
if( $uid == $row['uid'])
{?>
<option name="<?php echo $row['bname']; ?>"><?php echo $row['bname']; ?></option>
 <?php }

}
echo "</select>";
?>
 <textarea class="field" name="pdesc" cols="100" rows="6" placeholder="Describe your movie..."></textarea>
 <br/>
 <div class="span4 offset1" align="center">
 <input type="submit" class="btn btn-danger" value="Pin it"/>
</div>
 </form>
</div>
</div>




 <!-- Le javascript==================================================-
        ->
    <!-- Placed at the end of the document so the pages load faster -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
    <script src="main.js"></script>


</body>
</html>