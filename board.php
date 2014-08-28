<?php
 
session_start();
if(isset($_SESSION['username'])){
$username=$_SESSION['username'];

$uid=$_SESSION['uid'];
//$bid=$_SESSION['bid'];
$bid=$_GET['bid'];
$_SESSION['bid']=$_GET['bid'];
getboard($uid,$bid);
getUserProfileImage($uid);
}
else{header("Location: http://localhost/MOVinterest/index.php"); }
?>
<?php
function getUserProfileImage($uid)
{
$link = new mysqli('localhost','root','','movinterest');
$sql="SELECT uimage,ufname FROM user WHERE uid=".$uid;
$result=$link->query($sql);
while($row=$result->fetch_assoc())
{
$GLOBALS['uimage']=$row['uimage'];
$GLOBALS['fname']=$row['ufname'];
}
$_SESSION['uimage']=$GLOBALS['uimage'];
}

?>
<?php
function getboard($uid,$bid)
{
$link =	new mysqli('localhost','root','','movinterest');
$sql="SELECT uid,bid,bname FROM board WHERE uid ='$uid' AND bid = '$bid'";
$result1=$link->query($sql);
while($row = $result1->fetch_assoc())
{
if(($row['uid']==$uid) && ($row['bid']==$bid))
{
$GLOBALS['bname']=$row['bname'];
}
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
		
		<script>
		var myBookId;
		</script>
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
function insertcomment(cdesc,pid)
 {
   var xmlHTTPObject=new getAjaxObject();
   var url='insertcomment.php?pid='+pid+'&&cdesc='+cdesc;
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
			  // document.getElementById('bookId').innerHTML=XMLResponse;
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
		
		
		<script>
function getimageid(image_id)
 {
   var xmlHTTPObject=new getAjaxObject();
   var url='getimageid.php?image_id='+image_id;
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
 <script>
 
 function getcomment(image_id)
 {
   var xmlHTTPObject=new getAjaxObject();
   var url='getComment.php?image_id='+image_id;
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
			   document.getElementById('CommentId').innerHTML=XMLResponse;
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
    <link href="main.css" rel="stylesheet">
</head>
    
    <body>
        <div class="container-fluid" >
            <br/>
            <section>
                <div class="navbar-inner">
                    <br/>
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
                        <a href="profile.php" class="btn btn-large btn-danger">MOVinterest</a>
                    </div>
				
				
				
			  
  	<div class="btn-group offset1">
	<label class="btn dropdown-toggle" data-toggle="dropdown"><strong>Add</strong> &nbsp;
    <span class="caret"></span>
  </label>
  <ul class="dropdown-menu pull-right">
   <li><a href="#addpin" data-toggle="modal" tabindex="-1" >Add New Pin</a></li>
   
  </ul>
</div>
	
  
  	<div class="btn-group offset0">
	<label class="btn dropdown-toggle" data-toggle="dropdown"><strong><?php echo ucfirst($GLOBALS['fname']); ?></strong> &nbsp;
    <span class="caret"></span>
  </label>
  <ul class="dropdown-menu pull-right">
   <li><a tabindex="-1" href="profile.php">Profile</a></li>
       <li class="divider"></li>
    <li><a tabindex="-1" href="logout.php">Logout</a></li>
  </ul>
  
</div>

</section>
			
              </div>
		<section>
			<div class="row span5 offset5" >
	
	<div class="span1" align="left"><strong><h4><a href="">Following&nbsp;&nbsp; </a></h4></strong></div>

	<div class="span1 offset0" align="right">
<div class="btn-group">

	<label class="dropdown-toggle" data-toggle="dropdown"><strong><h4>&nbsp;&nbsp; Categories</h4></strong></label>
	
  <ul class="dropdown-menu pull-right">
   <li align="left"><a href="categories.php?id=1" data-toggle="modal" tabindex="1">Action</a></li>
   <li align="left"><a href="categories.php?id=2" data-toggle="modal" tabindex="1">Adventures</a></li>
   <li align="left"><a href="categories.php?id=3" data-toggle="modal" tabindex="1">Animation</a></li>
   <li align="left"><a href="categories.php?id=4" data-toggle="modal" tabindex="1">Biography</a></li>
   <li align="left"><a href="categories.php?id=5" data-toggle="modal" tabindex="1">Comedy</a></li>
   <li align="left"><a href="categories.php?id=6" data-toggle="modal" tabindex="1">Crime</a></li>
  </ul>
  </div>
</div>

	
		</div>	
		</section>		  
				
<div  align="center">
<br/><br/><br/>
<a href="editboard.php?bname=<?php echo $GLOBALS['bname']; ?>" class="btn btn-primary" >Edit Board</a>
</div>
<br/><br/>
		 <?php
		$link =	new mysqli('localhost','root','','movinterest');
$sql="SELECT pid,pname,pdesc,uid,bid FROM pictures WHERE uid ='$uid' AND bid ='$bid'";
$result1=$link->query($sql);
$i=0;
$a=0;
while($row = $result1->fetch_assoc())
{
//if(($uid == $row['uid']) && ($bid == $row['bid'])) 
//{
$i=$i+1;

//echo $row['bname'];
//echo $row['bdesc'];
//echo $row['bcategory'];
$pid= $row['pid']; 
$pname= $row['pname'];
$pdesc= $row['pdesc'];
//echo $pname;
//echo $pdesc."<br/>";
?>
		<?php if($i==5){ $i=0;  $a=1; ?> 
		<br/><br/>
<!-- <div class="row-fluid" >
!-->
	<?php	}  ?>
		<?php if($i<=4) { 
 		?> 
	
			<div class="span3" height="150" width="150" style="{background:#eee;}">
                  <?php if($a==1){echo "<br/>";} ?>
                    <div class="thumbnail" height="150" width="150" style="text-align:center"> 
					<!--style={border:2px solid;} !-->
<?php $var="http://localhost/MOVinterest/upload/$username/".$pname;?>
      
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

<div id="addpin" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header" >
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
    <h3 id="myModalLabel">ADD</h3>
  </div>
  <div class="modal-body">
     <div class="row-fluid" align="center">
         <div class="span4"><br/>
        <img class="image " src="http://mymoovie.co.uk/wp-content/uploads/2011/10/single-color-icons-movie-camera.png" alt="placeholder image" height="160" width="200">
		<strong>Add Url</strong>
		</div>
		 <div class="span4">
		
		<a href="#upload"  data-dismiss="modal" data-toggle="modal" >
		<img class="image " src="http://www.slanghoekresort.co.za/video_icon.png" alt="placeholder image" height="130" width="160"/>
		<div id="fine-uploader-basic" class="" style="position: relative; overflow: hidden; direction: ltr;">
		
		Upload Image
   
	</a>


</div>

		
		
		</div>
		 <div class="span4">
		<a href="#myModal"  data-dismiss="modal" data-toggle="modal" >
		<img class="image " src="http://cdn1.iconfinder.com/data/icons/nuvola2/128x128/apps/konqsidebar_mediaplayer.png" alt="placeholder image" height="130" width="160">
		<strong>Create a Board</strong>
	
		</a>
		 </div>
		
        
     </div>
  </div>
  
</div>
 <div id="upload" class="modal hide fade in" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="false" >
              

			  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                

                </div>
				<div class="modal-body">
				
				 <form action="uploadimage.php" method="POST"
				 enctype="multipart/form-data" >
                                
   <div id="fine-uploader-basic" class="btn btn-success" style="position: relative; overflow: hidden; direction: ltr;"><div><i class="icon-upload icon-white"></i>Choose Image
    </div>
<input type="file" multiple="multiple" name="file" id="file" style="position: absolute; right: 0px; top: 0px; font-family: Arial; font-size: 118px; margin: 0px; padding: 0px; cursor: pointer; opacity: 0;"></input></div>
				
				<input type="submit" value="Upload Image"/>
				</form>
				
				</div>
					
    </div>



<div class="modal hide" id="addBookDialog">
 <div class="modal-header">
    <button class="close" data-dismiss="modal">×</button>
  <h4><p class="text-error"><strong>Pinned On Board : <?php echo $GLOBALS['bname']; ?></strong></h4></p>
  
  <?php //if(isset($_SESSION['pdesc'])){
 // echo '<strong><h5>'.$_SESSION['pdesc'].'</h5></strong>';
  //}
  ?>
  </div>
    <div class="modal-body" id="bookId">
        
    </div>
	<!--    Post Comments here	!-->
	
<div style="width: 550px; height: 120px; overflow-y: scroll;  scrollbar-
face-color: #e7e7e7; scrollbar-3dlight-color: #a0a0a0; scrollbar-darkshadow-color:
#888888">
	<div class="row-fluid span5">	
<br/>

<div class=""  id="CommentId" >



</div>

</div>

	<!--   END Post Comments here	!-->
<div class="row-fluid span6">	

<div class="span1" align="left">
<?php $v=$GLOBALS['uimage']; ?>
<?php $var="http://localhost/MOVinterest/upload/$username/".$v; ?>
<img src="<?php echo $var; ?>" class="img-polaroid"  width="20" height="20">
</div>
<div class="" >

<form action="insertcomment.php" method="POST">
&nbsp;
<input class="span10" id="comment" type="text" placeholder="Add Comments..."><br/>
<div class="row-fluid span3 offset8">

<a  data-toggle="modal" data-id="comment" class="insert btn btn-small btn-danger">Post Comments</a> 
</form>
</div>
</div>
<br/>
</div>
</div>
</div>
</div>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>
        <script src="js/bootstrap.min.js"></script>
    <script src="main.js">
	
	</script>
	<script>
	$(document).on("click", ".insert", function () {
     var insert = document.getElementById('comment').value;
	
	 insertcomment(insert,myBookId);
	
	   getcomment(myBookId);
});

	</script>
<script>
	$(document).on("click", ".open-AddBookDialog", function () {
      myBookId = $(this).data('id');
	 //$(".modal-body #bookId").val( myBookId );
 getimageid(myBookId);
 getcomment(myBookId);
	 // insertcomment();
});

	</script>
</body>
</html>

