<!doctype html>
<html>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>New Project</title>
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
        <div class="container-fluid" align="center">
            <br/>
            <br/>
            <br/>
            <br/>
            <div class="row-fluid ">
                 <h3><strong> Create your account.</strong></h3>
            </div>
            <br/>
            <br/>
            <div class="row-fluid ">
                <div class="span2 offset3" align="center">
				 <form action="signupcheck.php" method="POST"
				 enctype="multipart/form-data" >
                                <img class="image img-polaroid" src="http://t2.gstatic.com/images?q=tbn:ANd9GcRp-MLoHVHXxaOFY6k-ZTqEkQr4Di_p-gfbWI9Mhq--x16i18tYPA" alt="Upload Image" height="250" width="250" >
  <!--  <label for="id_img" class="Button WhiteButton Button13 ContrastButton upload" data-text-uploading="Uploading">Upload your Photo</label> !-->
   <br/>
   <div id="fine-uploader-basic" class="btn btn-success" style="position: relative; overflow: hidden; direction: ltr;"><div><i class="icon-upload icon-white"></i>Upload Image
    </div>
<input type="file" multiple="multiple" name="file" id="file" style="position: absolute; right: 0px; top: 0px; font-family: Arial; font-size: 118px; margin: 0px; padding: 0px; cursor: pointer; opacity: 0;"></input></div>

	<?php  if(isset($_GET['imgmes'])){echo $_GET['imgmes'];} ?>

	
	
			  </div>
                <div class="span4">
                 
                     <input class="input-large"name="username" type="text" placeholder="Username">
 <?php   if(isset($_GET['namemes'])){
	?>				 <div class="alert alert-error">
   <?php echo $_GET['namemes']; ?>
</div>
<?php } 
 ?>
<br/><br/>
                     <input class="input-large" name="email" type="email" placeholder="Email"><br/><br/>
                     <input class="input-large" name="password" type="password" placeholder="Password"><br/>
                     <h5><strong>____________________________</strong></h5>
                     <br/><input class="input-large" name="fname" type="text" placeholder="First Name"><br/><br/>
                                          <input class="input-large" name="lname" type="text" placeholder="Last Name"><br/><br/>
                          <select name="gender">
  <option>Male</option>
  <option>Female</option>
  <option>UnSpecified</option>
</select>      <br/><br/>
<strong>By creating an account, I accept MOVinterest's Terms of Service and Privacy Policy.</strong>
<br/><br/>
<button type="submit" class="btn btn-large btn-primary">Create Account</button>
                 </form> 
                    <br/><br/>
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
</body>

</html>