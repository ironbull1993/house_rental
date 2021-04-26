<?php
include "db_connect.php";

$passd=$_POST['password'];


$sql="INSERT INTO users (name,username,password,type)
VALUES
('".$_POST['name']."','".$_POST['username']."','".md5($passd)."','".$_POST['type']."')";


if ($conn->query($sql) === TRUE) {
 
  
  header("location:index.php?page=users");
  } 
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
  ?>