<?php
$value=$_REQUEST['value'];
 if($value == "add"){
 addrequest();
  }
 else if($value == "cancel")
  {
  cancelrequest();
 }
?>
<?php
function addrequest()
{
echo '<a class="addfriend btn btn-primary btn-danger" onclick="cancelrequest()">Cancel Request</a>';
}
?>
<?php
function cancelrequest()
{
echo '<a class="addfriend btn btn-primary btn-success" onclick="sendrequest()">Add Friend</a>';
}
?>