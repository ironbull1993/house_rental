<?php
include "db_connect.php";




$qry=$conn->query("SELECT * from users where phone=".$_POST['phone']); 
$rw=$qry->fetch_assoc();



if ($rw['phone'] ==$_POST['phone']) {

    
    function random_password( $length = 8 ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }
    //echo random_password( $length = 1 );
    
     $password = random_password(1); 

    include 'db_connect.php'; 



include_once "vendor/nexmo/Client.php";
include_once "vendor/nexmo/Entity/HasEntityTrait.php";
include_once "vendor/nexmo/client/Exception/Exception.php";
include_once "vendor/nexmo/client/Exception/Request.php";
include_once "vendor/nexmo/Entity/EntityInterface.php";
include_once "vendor/nexmo/Message/MessageInterface.php";
include_once "vendor/nexmo/Message/CollectionTrait.php";
include_once "vendor/nexmo/Entity/RequestArrayTrait.php";
include_once "vendor/nexmo/Entity/JsonResponseTrait.php";
include_once "vendor/nexmo/Entity/Psr7Trait.php";
include_once "vendor/nexmo/Message/Message.php";
include_once "vendor/nexmo/client/ClientAwareInterface.php";
include_once "vendor/nexmo/client/ClientAwareTrait.php";
include_once "vendor/nexmo/Message/Client.php";
include_once "vendor/nexmo/client/Factory/FactoryInterface.php";
include_once "vendor/nexmo/client/Factory/MapFactory.php";
include_once "vendor/nexmo/client/Credentials/CredentialsInterface.php";
include_once "vendor/nexmo/client/Credentials/AbstractCredentials.php";
include_once "vendor/nexmo/client/Credentials/Basic.php";
require_once "vendor/autoload.php";

if(isset($_POST['smsg'])){
    $pno = $_POST['phone'];
$basic  = new \Nexmo\Client\Credentials\Basic("b509304f", "yMXJtKnsJv9RhWvf");

$client = new \Nexmo\Client($basic);
$message = $client->message()->send([
	$query1=$conn->query("SELECT * FROM system_settings"),
$phoner=mysqli_fetch_array($query1),
$phone_sender=$phoner['contact'],
   // 'to' => "255743997716",
   // 'from' => '255743997716',
  //  'text' => "testing"
  'to' => "$pno",
  'from' => "$phone_sender",
  'text' => "$password"
]);

$response = $message->getResponseData();

if ($message->getStatus() == 0) { //echo "<script> alert('The message was sent successfully');</script>";
    header("location:login.php");

    $query12=$conn->query(  "UPDATE users SET password ='".md5($password)."' WHERE  phone=".$_POST['phone']);


   // echo "The message was sent successfully\n";
} else { //echo "<script> alert('The message failed!!!');</script>";
    //header("location:index.php?page=tenants_due");
    echo "The message failed with status: " . $message->getStatus() . "\n";
}

}
  
  header("location:login.php");
  } 
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
  ?>