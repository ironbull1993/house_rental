<?php 
include "db_connect.php";
								$i = 1;
								$tenant = $conn->query("SELECT t.*,concat(t.lastname,', ',t.firstname,' ',t.middlename) as name,h.house_no,h.price FROM tenants t inner join houses h on h.id = t.house_id where t.status = 1 order by h.house_no desc ");
								while($row=$tenant->fetch_assoc()):
									$months = abs(strtotime(date('Y-m-d')." 23:59:59") - strtotime($row['date_in']." 23:59:59"));
									$months = floor(($months) / (30*60*60*24));
									$payable = $row['price'] * $months;
									$paid = $conn->query("SELECT SUM(amount) as paid FROM payments where tenant_id =".$row['id']);
									
									
									$last_payment = $conn->query("SELECT * FROM payments where tenant_id =".$row['id']." order by unix_timestamp(date_created) desc limit 1");
									$rww=$last_payment->fetch_assoc();
									$paid = $paid->num_rows > 0 ? $paid->fetch_array()['paid'] : 0;
									$last_payment = $last_payment->num_rows > 0 ? date("M d, Y",strtotime($last_payment->fetch_array()['date_created'])) : 'N/A';
									$outstanding = $payable - $paid;
									$remain_month=$outstanding/$row['price'];


                                $stir="Not Sent";
                                if($rww['sms_status']==$stir){
                                
                                if($row['price']==-$outstanding){ 
								

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


    $pno = $row['contact'];
$basic  = new \Nexmo\Client\Credentials\Basic("c48eaf65", "CDDmQNOS6BOsdUVt");

$client = new \Nexmo\Client($basic);

$message = $client->message()->send([
	$query1=$conn->query("SELECT * FROM system_settings"),
$phoner=mysqli_fetch_array($query1),
$phone_sender=$phoner['contact'],
 
  'to' => "$pno",
  'from' => "$phone_sender",
  'text' => "x"
]);

$response = $message->getResponseData();

if ($message->getStatus() == 0) { 
    

    $query12=$conn->query(  "UPDATE payments SET sms_status ='Sent' WHERE  tenant_id =".$row['id']);
   
} else { 
    $query12=$conn->query(  "UPDATE payments SET sms_status ='Failed' WHERE  tenant_id =".$row['id']);
    
}

}} 
 endwhile; 
?>