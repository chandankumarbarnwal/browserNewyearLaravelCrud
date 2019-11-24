<?php


$conn = mysqli_connect("localhost","root","Chandan@123","test_upload");

$query = "SELECT * FROM person";


$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)){
  print_r(mysqli_num_rows($result));

  
}
?>