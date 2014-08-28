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
getboard($uid);

}
else{header("Location: http://localhost/MOVinterest/index.php"); }
if(isset($_SESSION['nuimage']))
{
//imageupload($username);

//echo "<a href="#uploadedimage" role="button" class="btn" data-toggle="modal"></a>";
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
</head>
    
    <body>
        <div class="container-fluid" >
            <br/>
            <section>
                <div class="navbar-inner">
                    <br>
                    <div class="span4" align="left">
                        <form class="form-search" action="search.php" method="POST">
                            <div class="input-append">
                                <input type="text" class="span2 search-query" name="searchtext" size="200" maxlength="50"
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
                <br/>
                <br/>
                <div class="row-fluid span8 offset0">
                    <div class="span2"  style="{height:200px;width:200px;}">
					<?php $username=$_SESSION['username'];
$image=$GLOBALS['image'];
					?>
					<?php $var="http://localhost/MOVinterest/upload/$username/".$image;?>
                        <img class="image" src=<?php echo $var; ?>
                        alt="my profile image">
                    </div>
                 <div class="span6 navbar-inner" style="{height:200px;}">
                        <br>
                         <h3><strong><?php echo ucfirst($GLOBALS['fname'])." ".ucfirst($GLOBALS['lname']); ?></strong></h3>
					<?php if(empty($GLOBALS['uabout'])){ ?>
                        <form action="aboutme.php" method="POST">
                            <textarea class="field span12" name="aboutmesave" cols="100" rows="2" placeholder="About me..."></textarea>
                            <br>
                            <input class="btn btn-success btn-small " type="submit"  value="Save">
                        </form> <?php } 
						else {
						?> <div class="well well-medium">
							<?php echo $GLOBALS['uabout']; ?>
</div>
<?php } ?>
                    </div>
                </div>
            </section>
            <section>
                
                <div class="row"><br/><br/>
                    <div class="navbar">
                        <div class="navbar-inner">
                            <a class="brand span2" href="#">0 Boards</a>
                            <a class="brand span2" href="#">0 Pins</a>
                            <a class="brand span2" href="#">0 Likes</a>
                            <a class="brand span3 offset4" href="#">Edit Profile 

                            </a>
                            <a class="brand offset1" href="#">0 Following</a>
                            <a class="brand" href="#">0 Followers</a>
                        </div>
                    </div>
                </div>
            </section>
            <section>                
<?php    if($boardfound ==0) { 	?>               
			   <div class="row-fluid" align="center">
                    <!-- if not boards are created !-->
                     <h4>Create a board to collect and organize movies you're interested in.</h4>

                    <form>
                        <br/>
                        <a href="#myModal" role="button" class="btn btn-primary btn-large" data-toggle="modal">Create a Board</a>
                    </form>
                </div>
				<?php } ?>
            </section>
			<?php
			 if($boardfound ==1) {
			?>
		
			
			 <?php
		$link =	new mysqli('localhost','root','','movinterest');
$sql="SELECT bid,bname,bdesc,bcategory FROM board WHERE uid ='$uid'";
$result1=$link->query($sql);
$i=0;
$totalboards=0;
while($row = $result1->fetch_assoc())
{
 //$totalboards=totalboards+1;
//$GLOBALS['tboards']=$totalboards;
if($i>3)
{
$i=0;
}

$bid=$row['bid']; 
?>
	
		
		<?php if($i<=3) { 
		if($i%4==0){ ?>
	<div class="row-fluid"  align="center" >
		<?php }
		//$iis4=1;}
		?>
		<div class="span3" style="{background:#eee;height:226px;width:199px;}">
                    <label class="" align="center"><h5><strong><?php echo ucfirst($row['bname']); ?></strong></h5></label>
<a href="board.php?bid=<?php echo $bid; ?>"
				   
 
				<?php 
				$i=$i+1;
				 $link5 =new mysqli('localhost','root','','movinterest');
			$sql5="SELECT pname,pdesc FROM pictures WHERE uid ='$uid' AND bid ='$bid' LIMIT 0,1";
				$result15=$link5->query($sql5);
			while($row5 = $result15->fetch_assoc())
			{			$v="upload/$username/"	;
			?>				 <div class="thumbnail" >
		<!--	<style type="text/css"> a, a:hover {cursor: url(Zoom-In.ico), progress;}</style>
!-->
                          <img src="<?php if(isset($row5['pname'])){ echo $v.$row5['pname']; } else { echo 'https://placehold.it/300x200';}  ?>" alt="" height="226" width="199" ><br/>
	 <?php } ?>
	 <div class="row-fluid" border="1">
	 <?php 
				 $link5 = new mysqli('localhost','root','','movinterest');
			$sql5="SELECT pname,pdesc FROM pictures WHERE uid ='$uid' AND bid ='$bid' LIMIT 1,1";
				$rl1=$link5->query($sql5);
		
			
			while($limit11 = $rl1->fetch_assoc())
			{			$v="upload/$username/"	; ?>
				 
					<?php	  
					 if(preg_match('/.jpg/',$limit11['pname'])) 
					{ ?>
					 <img class="image img-rounded" src="<?php echo $v.$limit11['pname']; ?>" alt="<?php echo $limit11['pdesc'];?>" height="60" width="60"> 
				<?php	}
					 else
					 {
					 ?> 
	 <img class="image img-rounded" src="images/60x60.gif" alt="" height="60" width="60"> 
					<?php } ?> 
    
								
	<?php } ?>
                               <?php 
				 $link5 =new mysqli('localhost','root','','movinterest');
			$sql5="SELECT pname,pdesc FROM pictures WHERE uid ='$uid' AND bid ='$bid' LIMIT 2,1";
				$rl2=$link5->query($sql5);			
			while($limit21 = $rl2->fetch_assoc())
			{
						$v="upload/$username/"; ?>
					 
				
					<?php	  
					if(preg_match('/.jpg/',$limit21['pname'])) 
					{ ?>
					 <img class="image img-rounded" src="<?php echo $v.$limit21['pname']; ?>" alt="<?php echo $limit21['pdesc'];?>" height="60" width="60"> 
				<?php	}
					 else
					 {
					 ?> 
	 <img class="image img-rounded" src="images/60x60.gif" alt="" height="60" width="60"> 
					<?php } ?>
    
								
	<?php
			} ?>
								<?php 
				  $link5 =new mysqli('localhost','root','','movinterest');
			$sql5="SELECT pname,pdesc FROM pictures WHERE uid ='$uid' AND bid ='$bid' LIMIT 3,1";
				$rl3=$link5->query($sql5);			
			while($limit31 = $rl3->fetch_assoc())
			{
						$v="upload/$username/"; ?>
					 
				
					<?php	  
					if(preg_match('/.jpg/',$limit31['pname'])) 
					{ ?>
					 <img class="image img-rounded" src="<?php echo $v.$limit31['pname']; ?>" alt="<?php echo $limit31['pdesc'];?>" height="60" width="60"> 
				<?php	}
					 else
					 {
					 ?> 
	 <img class="image img-rounded" src="images/60x60.gif" alt="" height="60" width="60"> 
					<?php } ?>
    
								
	<?php
			} ?>
                            </div>
					
                        </div> 
						</a>
						<a href="editboard.php?bname=<?php echo $row['bname'];  ?>" class="btn" style = "width:200px">Edit</a>
							
							<br/>		

		
            </div>
			<?php } 
				if($i%4==0)
				{
				echo '</div><br/>';
				}	
					
	} 					?>
						
        	</div>
			<?php } ?>
		
			
			
		
			
			
			
			
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
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
	<?php if($boardfound ==1) {?><br/><br/><br/> <?php } ?>
</body>

</html>