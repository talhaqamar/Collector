<?php
session_start();
 $fname;
 $lname;
$boardfound=0;

?>
<?php
if(isset($_SESSION['username'])){
$username=$_SESSION['username'];
userdata($username);
getabout($username);
$uid=$_SESSION['uid'];
//getboard($uid);
$catid=$_GET['id'];
$catname=getcatname($catid);

}
else{header("Location: http://localhost/MOVinterest/index.php"); }
if(isset($_SESSION['nuimage']))
{
//imageupload($username);

//echo "<a href="#uploadedimage" role="button" class="btn" data-toggle="modal"></a>";
 }
?>

<?php
function getcatname($id)
{
$link =	new mysqli('localhost','root','','movinterest');
$sql="SELECT cname FROM tcategories WHERE cid ='$id'";
$result1=$link->query($sql);
while($row = $result1->fetch_assoc())
{
$GLOBALS['cname']=$row['cname'];
}
return $GLOBALS['cname'];
}

?>



<?php
function getboard($uid)
{
global $boardfound;
$link =	new mysqli('localhost','root','','movinterest');
$sql="SELECT bid,bname,bname,bdesc,bcategory FROM board WHERE uid ='$uid'";
$result1=$link->query($sql);
while($row = $result1->fetch_assoc())
{
/* echo $row['bid'];
echo $row['bname'];
echo $row['bdesc'];
echo $row['bcategory']; */
$boardfound=1;
}
}
?>
<?php 
 function getabout($username){
 $link =	new mysqli('localhost','root','','movinterest');
$sql="SELECT uabout,uname FROM uabout WHERE uname ='$username'";
$result1=$link->query($sql);
while($row = $result1->fetch_assoc())
{
if($row['uname'] == $username)
{
$GLOBALS['uabout']=$row['uabout'];
}
}
}
?>
<?php 

function userdata($username){
$link =	new mysqli('localhost','root','','movinterest');
$sql="SELECT uimage,ufname,ulname,uid FROM user WHERE uname ='$username'";
$result1=$link->query($sql);
while($row = $result1->fetch_assoc())
{
$_SESSION['uid']=$row['uid'];
$GLOBALS['image']=$row['uimage'];
$GLOBALS['fname']=$row['ufname'];
$GLOBALS['lname']=$row['ulname'];

}
$_SESSION['uimage']=$GLOBALS['image'];
// echo $GLOBALS['image'];
// echo $GLOBALS['fname'];
// echo $GLOBALS['lname'];
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
		 <script>
function getAjaxObject()
	  {
	   var XMLHttpRequestObject = false;
	   if (window.XMLHttpRequest)
		 {
		 XMLHttpRequestObject = new XMLHttpRequest();
		 }
	   else if (window.ActiveXObject)
		 {
		 XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
		 }
	   if (!XMLHttpRequestObject)
		 {
		 alert("Your browser does not support Ajax.");    return false;
		 }
		return XMLHttpRequestObject;
	  }
	  function getimageid(image_id)
 {
   var xmlHTTPObject=new getAjaxObject();
   var url='getcatimage.php?image_id='+image_id;
   var parameters='123';

   if(xmlHTTPObject)

      {
      if (xmlHTTPObject.readyState == 4 || xmlHTTPObject.readyState == 0)
      {
        xmlHTTPObject.open("POST", url, true);
        xmlHTTPObject.onreadystatechange = function ()
      {
       if (xmlHTTPObject.readyState == 4)
          {
          if (xmlHTTPObject.status == 200)
          {
			 try
			  {
			   var XMLResponse = xmlHTTPObject.responseText;
			   document.getElementById('bookId').innerHTML=XMLResponse;
			  }
			 catch(e){}
          }
          }   
      };
      xmlHTTPObject.send(null);
      }
    }
  return false;  
 }
 </script>
	  
</head>
<body>
        <div class="container-fluid" >
            <br/>
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
				
				
				
			  
  	<div class="btn-group offset1">
	<label class="btn dropdown-toggle" data-toggle="dropdown"><strong>Add</strong> &nbsp;
    <span class="caret"></span>
  </label>
  <ul class="dropdown-menu pull-right">
   <li><a href="#addpin" data-toggle="modal" tabindex="-1" >Add New Pin</a></li>
   
  </ul>
</div>
	
  
  	<div class="btn-group offset1">
	<label class="btn dropdown-toggle" data-toggle="dropdown"><strong><?php echo ucfirst($GLOBALS['fname']); ?></strong> &nbsp;
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
		<div  align="center">
	<label class="btn btn-success">	<?php  
echo ucfirst($catname);
		?>
		</label>
		</div>
<br/><br/>
		 <?php
		 $catname=$GLOBALS['cname'];
		 $_SESSION['categories']=$catname;
		$link =	new mysqli('localhost','root','','movinterest');
$sql="SELECT catid,catname,catdesc FROM ".$catname;
$result1=$link->query($sql);
$i=0;
$a=0;
while($row = $result1->fetch_assoc())
{
$i=$i+1;
$pid= $row['catid']; 
$pname= $row['catname'];
$_SESSION['cname']=$row['catname'];
$pdesc= $row['catdesc'];
?>
		<?php if($i==5){ $i=0;  $a=1; ?> 
		<br/><br/><br/><br/>
<div class="row" >
<br/><br/><br/><br/>
	<?php	}  ?>
		<?php if($i<=4) { 
 		?> 
	
			<div class="span3" height="400" width="400" style="{background:#eee;}">
                  <?php if($a==1){echo "<br/>";} ?>
                    <div class="thumbnail" height="150" width="150" style="text-align:center"> 
					<!--style={border:2px solid;} !-->
<?php $var="http://localhost/MOVinterest/upload/$catname/".$pname.".JPG";?>
        <a data-toggle="modal" data-id="<?php echo $pid; ?>" title="<?php echo $pname; ?>" class="open-AddBookDialog" href="#addBookDialog">
		 <img class="image" src="<?php echo $var; ?>"
                        alt="my profile image"></a><br/>
                           <?php echo $pdesc;   ?>
							
                        </div> 		
            </div>
			<?php }  ?>
		<?php	 ?>
					
			
<?php 
 }
?>
</div>
<div class="modal hide" id="addBookDialog">
 <div class="modal-header">
    <button class="close" data-dismiss="modal">×</button>
  <h4><p class="text-error"><strong>Category : <?php echo ucfirst($_SESSION['categories']); ?></strong></h4></p>
  
  <?php //if(isset($_SESSION['pdesc'])){
 // echo '<strong><h5>'.$_SESSION['pdesc'].'</h5></strong>';
  //}
  ?>
  </div>
    <div class="modal-body" id="bookId">
        
    </div>
	<!--    Post Comments here	!-->
	

</div>
			  
			</div>  
			
			  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
	<script>
	$(document).on("click", ".open-AddBookDialog", function () {
      myBookId = $(this).data('id');
	 //$(".modal-body #bookId").val( myBookId );
 getimageid(myBookId);
 //alert();
 //getcomment(myBookId);
	 // insertcomment();
});

	</script>  
			  </body>
</html>

			  