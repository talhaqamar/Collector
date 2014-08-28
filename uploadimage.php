<?php
session_start();
if(isset($_SESSION['username']))
{
$username=$_SESSION['username'];
$uid=$_SESSION['uid'];
imageupload($username);
//echo $_FILES["file"]["name"];

}
else{ header("Location: http//localhost/MOVinterest/index.php");}
?>
<?php
function imageupload($username){
$filename = "upload/$username";

if (file_exists($filename)) {
   // echo "The file $filename exists";
} else {
 //   echo "The file $filename does not exist";
	 mkdir("upload/$username");
}
  
 
 
 
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
//  echo "Upload: " . $_FILES["file"]["name"] . "<br>"; //file name
 
  //echo "Type: " . $_FILES["file"]["type"] . "<br>";
 // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
 // echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }


$allowedExts = array("gif", "jpeg", "jpg", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 2000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
   // echo "Error: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
 ///   echo "Upload: " . $_FILES["file"]["name"] . "<br>";
 ///   echo "Type: " . $_FILES["file"]["type"] . "<br>";    
 //   echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
 //   echo "Stored in: " . $_FILES["file"]["tmp_name"];
    }
  }


$allowedExts = array("gif", "jpeg", "jpg", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 2000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
  //  echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
	 $GLOBALS['nuimage']= $_FILES["file"]["name"];
  //  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  //  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  //  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  //  echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("upload/$username/". $_FILES["file"]["name"]))
      {
	$filename=$_FILES["file"]["name"];
        $filename = rand(10,100).$filename;
      //echo "1".$filename ."file name is";
	  $GLOBALS['nuimage']= $filename;
	 // echo $GLOBALS['nuimage'];
	   move_uploaded_file($_FILES["file"]["tmp_name"],
	  
      "upload/$username/". $filename);
	
	  }
    else
      {
	  upload($username);
	 
	  
	  }
    }
  }
else
  {
  echo "Invalid file";
  }

}

?>
<?php
function upload($username){
      move_uploaded_file($_FILES["file"]["tmp_name"],
	  
      "upload/$username/". $_FILES["file"]["name"]);
	// header("Location: http://localhost/MOVinterest/profile.php");
  //    echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
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
   <li><a tabindex="-1" href="#">Action</a></li>
    <li><a tabindex="-1" href="#">Another action</a></li>
    <li><a tabindex="-1" href="#">Something else here</a></li>
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
<?php $name = $GLOBALS['nuimage']; $_SESSION['nuimage']=$GLOBALS['nuimage']; ?>
<?php $path="http://localhost/MOVinterest/upload/$username/$name"; ?>
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