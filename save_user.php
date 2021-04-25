<?php
include "db_connect.php";




$sql="INSERT INTO users (name,username,password,type)
VALUES
('".$_POST['name']."','".$_POST['username']."','".$_POST['password']."','".$_POST['type']."')";


if ($conn->query($sql) === TRUE) {
 
  
  header("location:index.php?page=users");
  } 
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
  ?>