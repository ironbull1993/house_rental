<?php
include "db_connect.php";

$passd=$_POST['password'];


$sql="INSERT INTO users (name,username,phone,password,type)
VALUES
('".$_POST['name']."','".$_POST['username']."','".$_POST['phone']."','".md5($passd)."','".$_POST['type']."')";


if ($conn->query($sql) === TRUE) {
 
  
  header("location:index.php?page=users");
  } 
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
  ?>