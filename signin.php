<?php
ob_start();
session_start();
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
<link rel="stylesheet" type="text/css" href="css/pro_drop_1.css" />
<script src="js/stuHover.js" type="text/javascript"></script>
</head>
    
    <body>
        <div class="container-fluid"  align="center">
<div class="row-fluid >
<div class="" >
<br/><br/><br/><br/>
<label class="btn btn-danger btn-large"><h1>MOVinterest</h1></label>
</div>

<div class="">
<br/><br/>

		<form action="signincheck.php" method="GET">
<input type="text" name="username" placeholder="Username"/><br/>
<input type="password" name="password" placeholder="Password"/><br/>
<input class="btn btn-success" type="submit" value="Log In"/> <a href="#signin" data-toggle="modal">Forgot Password?</a>
</form>
<a class="btn" href="signup.php">JOIN MOVinterest</a>
</div>
</div>
<div id="addpin" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header" >
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">?</button>
    <h3 id="myModalLabel">Please Enter a Valid Email Address.</h3>
  </div>
  <div class="modal-body">
   <form action="">
   <input type="" name="email" placeholder="Email Address..."/>
   </form>
  </div>
  
</div>

</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</body></html>
