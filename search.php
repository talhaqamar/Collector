<?php
session_start();
if(isset($_SESSION['username'])){
$username=$_SESSION['username'];
userdata($username);
//getabout($username);
$uid=$_SESSION['uid'];
//getboard($uid);

}
else{header("Location: http://localhost/MOVinterest/index.php"); }

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
<?php
if(isset($_POST['searchtext']))
{
$people = $_POST['searchtext'];
$GLOBALS['people']=$people;
//getpeople($people);
}

?>
<?php
function getpeople($people)
{
$link =	new mysqli('localhost','root','','movinterest');
$sql="SELECT uname,uimage FROM user WHERE uname ='$people'";
$result1=$link->query($sql);
while($row = $result1->fetch_assoc())
{
if($row['uname'] == $people)
{
//echo 'kch mila';
}
else{
//echo 'kch nae mila';

}
}
}?>


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
        <link href="css/bootstrap-responsive.min.css"
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
function sendrequest()
 {
 var pid = "add"; 
   var xmlHTTPObject=new getAjaxObject();
   var url='addrequest.php?value='+pid;
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
			   document.getElementById('friendrequest').innerHTML=XMLResponse;
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
 function cancelrequest()
 {
var pid = "cancel"; 
 var xmlHTTPObject=new getAjaxObject();
   var url='addrequest.php?value='+pid;
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
			   document.getElementById('friendrequest').innerHTML=XMLResponse;
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
   <li><a tabindex="-1" href="#">Action</a></li>
    <li><a tabindex="-1" href="#">Another action</a></li>
    <li><a tabindex="-1" href="#">Something else here</a></li>
    <li class="divider"></li>
    <li><a tabindex="-1" href="logout.php">Logout</a></li>
  </ul>
</div>

              </div>    
					
                    <br/>
                  
               
            </section>
			<section>
			<div class="row-fluid span3 offset1">
			<h3>Search Results:</h3>
			<br/>
			</div>
			</section>
            <?php
$link =	new mysqli('localhost','root','','movinterest');
$sql="SELECT uname,uimage,uid FROM user WHERE uname ='$people'";
$result1=$link->query($sql);
while($row = $result1->fetch_assoc())
{
if($row['uname'] == $people)
{ ?>
 
 <br/>
		   <div class="row-fluid span3 offset1"  >
		 <?php $var="http://localhost/MOVinterest/upload/".$row['uname']."/".$row['uimage'];?>
		     <div class="span1"  style="{width:20px;}">
			<img class="image" src=<?php echo $var; ?> alt="my profile image" width="100">  
			</div>	
						<div class="row-fluid span2">
						<?php	echo "<h4>". ucfirst($row['uname'])."</h4>"; ?>
						
			
					<div id="friendrequest">
				<a class="addfriend btn btn-primary btn-success " onclick="sendrequest()">Add Friend</a>
				</div>
			</div>
		 </div>

<?php  }
else 
{ ?>


<!--<div class="row-fluid span3 offset1"> !-->
No result found 


<?php
 
}

}
			?>
          
    </div>
            
	     <!-- Modal -->
            <div id="myModal" class="modal hide fade in" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="false" >
              

			  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">?</button>
                     <h3 id="myModalLabel">Create a Board</h3>

                </div>
				
				<form action="createboard.php" method="POST">
                <div class="modal-body">
                    <div class="row-fluid">
                        <div class="span4 offset1 " align="left">
                            <h4><strong>Name</strong></h4>
                        </div>
                        <div class="span4 offset1" align="left">
                            <input type="text" name="bname" placeholder="Board Name..." />
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span4 offset1 " align="left">
                            <h4><strong>Description</strong></h4>
                        </div>
                        <div class="span4 offset1" align="left">
                            <textarea rows="3" name="bdesc" placeholder="Board Info..."></textarea>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span4 offset1 " align="left">
                            <h4><strong> Category</strong></h4>
                        </div>
                        <div class="span4 offset1" align="left">
                            <select name="bcategory">
                                <option>Action</option>
                                <option>Adventure</option>
                                <option>Animation</option>
                                <option>Biography</option>
                                <option>Comedy</option>
                                <option>Crime</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" align="center">
                  <!--  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    !-->
					<input type="submit" class="btn btn-primary" value="Create Board" />
                </div>
				</form>
            </div>
			<!-- Modal -->
<div id="addpin" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header" >
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">?</button>
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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">?</button>
                

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
	</div>
        <!-- Le javascript==================================================-
        ->
    <!-- Placed at the end of the document so the pages load faster -->

	      

	   <script src="js/jquery.min.js">
</script>
        <script src="js/bootstrap.min.js"></script>
    <script src="main.js"></script>
	
</body>

</html>