<?php
session_start();
//echo $_GET['bname'];
//var_dump($_GET);
if(isset($_SESSION['username']) && isset($_SESSION['uid']) && isset($_GET)){
$username=$_SESSION['username'];
$uid=$_SESSION['uid'];
$bname = $_GET['bname'];
getboardinfo($uid,$bname);
}
else{header("Location: http://localhost/MOVinterest/index.php"); }

?>
<?php
function getboardinfo($uid,$bname)
{
$link =	new mysqli('localhost','root','','movinterest');
$sql="SELECT uid,bid,bname,bdesc,bcategory FROM board WHERE uid ='$uid' AND bname ='$bname'";
$result1=$link->query($sql);
while($row = $result1->fetch_assoc())
{
if($row['uid'] == $uid && $row['bname']==$bname){
$GLOBALS['bname']=$row['bname'];
$GLOBALS['bdesc']=$row['bdesc'];
$GLOBALS['bcategory']=$row['bcategory'];
$_SESSION['bid']=$row['bid'];
}

//echo $GLOBALS['bname'];
//echo $GLOBALS['bdesc'];
//echo $GLOBALS['bcategory'];
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
<div class="span6" align="center">
<h3><strong>Edit Board/<?php echo $GLOBALS['bname'] ;?></strong></h3>
</div>

<div class="span1 offset3 " align="right">
<input type="submit" class="btn btn-danger" value="Delete Board"/></div>
</div>
<br/><br/><br/>
<div class="row-fluid span6" border="1">
<form action="updateboard.php" method="POST">
               
                    <div class="row-fluid">
                        <div class="span3 offset2 " align="left">
                            <h4><strong>Name</strong></h4>
                        </div>
                        <div class="span2 offset1" align="left">
                            <input type="text" name="bname" placeholder="" value="<?php echo $GLOBALS['bname']; ?>" />
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3 offset2 " align="left">
                            <h4><strong>Description</strong></h4>
                        </div>
                        <div class="span2 offset1" align="left">
                            <textarea rows="3" name="bdesc" placeholder=""><?php echo $GLOBALS['bdesc']; ?></textarea>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span3 offset2 " align="left">
                            <h4><strong> Category</strong></h4>
                        </div>
                        <div class="span2 offset1" align="left">
                            <select name="bcategory">
                                <option <?php if($GLOBALS['bcategory']=="1"){ echo "selected";} ?>>Action</option>
                                <option <?php if($GLOBALS['bcategory']=="2"){ echo "selected";} ?>>Adventure</option>
                                <option <?php if($GLOBALS['bcategory']=="3"){ echo "selected";} ?>>Animation</option>
                                <option <?php if($GLOBALS['bcategory']=="4"){ echo "selected";} ?>>Biography</option>
                                <option <?php if($GLOBALS['bcategory']=="5"){ echo "selected";} ?>>Comedy</option>
                                <option <?php if($GLOBALS['bcategory']=="6"){ echo "selected";} ?>>Crime</option>
                            </select>
                      <br/> <br/> <br/>
					  <div align="left">
                    <input type="submit" class="btn btn-success" value="Save Settings"/>
					  </div>
						</div>	
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
