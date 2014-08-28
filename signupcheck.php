<?php
session_start();
//var_dump($_POST);
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$uimage=$_FILES["file"]["name"];
checkname_email($username,$email);
usercreate($uimage,$username,$email,$password,$fname,$lname,$gender);
imageupload($username); ///image uploading
if(isset($_SESSION['uimage'])){ $uimage = $_SESSION['uimage'];}

?>

<?php
function checkname_email($username,$email)
{
$link =	new mysqli('localhost','root','','movinterest');
if($link->connect_error)
die('Connection error'.$link->connect_error);
$checkrepeat="SELECT uname,uemail FROM user WHERE uname ='$username'";
$result1=$link->query($checkrepeat);
while($row = $result1->fetch_assoc()){
if($username == $row['uname']){

echo 'Username already acquired choose another one';


 header ("Location: http://localhost/MOVinterest/signup.php?namemes=User Name Already assigned. <br/> Plzz Choose a Different One.");
break;
}
else{echo 'Username not acuired'; }//in($username,$password);}

}
}
function usercreate($uimage,$username,$email,$password,$fname,$lname,$gender){
$link =	new mysqli('localhost','root','','movinterest');
 $sql = "INSERT INTO user(uimage,uname,uemail,upassword,ufname,ulname,ugender)
 VALUES
 ('$uimage','$username','$email','$password','$fname','$lname','$gender')";

$result=$link->query($sql);
if($result >0){
$_SESSION['username']=$username;

 header("Location:http://localhost/MOVinterest/profile.php"); }//echo 'kch huaha' ;}
else{ echo 'kch nae hua';}
}

//function makedir($username){
// mkdir("upload/$username");
//}
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
else
  {
 // echo "Invalid file";
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
  //  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  //  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  //  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  //  echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("upload/$username/". $_FILES["file"]["name"]))
      {
	$filename=$_FILES["file"]["name"];
        $filename = rand(10,100).$filename;
      //echo "1".$filename ."file name is";
	  $_SESSION['uimage']= $filename;
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
 function upload($username){
      move_uploaded_file($_FILES["file"]["tmp_name"],
	  
      "upload/$username/". $_FILES["file"]["name"]);
	 // header("Location:http://localhost/MOVinterest/signup.php?imgmes=<strong>Image Uploaded.</strong>");
  //    echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      }
?>