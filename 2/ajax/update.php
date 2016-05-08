<?php

$comment=$_REQUEST['comment'];
$uniqueid=$_REQUEST['uniqueid'];
//echo $comment;
//exit;

$con=mysqli_connect("localhost","root","","employee");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql = "UPDATE salary SET comment='$comment' WHERE id='$uniqueid'";

if (mysqli_query($con, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
?>