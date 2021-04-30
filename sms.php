<?php 
include 'db_connect.php'; 
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM tenants where id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
	$$k=$val;
}
}

use \Vonage\Client;

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
    $pno = $_POST['pno'];
    $msg = $_POST['msg'];
$basic  = new \Nexmo\Client\Credentials\Basic("b509304f", "yMXJtKnsJv9RhWvf");

$client = new \Nexmo\Client($basic);
$message = $client->message()->send([
   // 'to' => "255743997716",
   // 'from' => '255743997716',
  //  'text' => "testing"
  'to' => "$pno",
  'from' => '255743997716',
  'text' => "$msg"
]);

$response = $message->getResponseData();

if ($message->getStatus() == 0) { echo "<script> alert('The message was sent successfully');</script>";
    header("location:index.php?page=tenants_due");
   // echo "The message was sent successfully\n";
} else { echo "<script> alert('The message failed!!!');</script>";
    header("location:index.php?page=tenants_due");
   // echo "The message failed with status: " . $message->getStatus() . "\n";
}
}






?>
<div class="container-fluid" id="form1">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST" id="manage-tenant">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="row form-group">
		
			
		<div class="col-md-4">
				
				<input type="text" class="form-control" name="firstname" style="border: 0 none;"  value="<?php echo isset($firstname) ? $firstname :'' ?>" required>
			</div>
			<div class="col-md-4">
				
				<input type="text" class="form-control" name="middlename" style="border: 0 none;" value="<?php echo isset($middlename) ? $middlename :'' ?>">
			</div>
			<div class="col-md-4">
				
				<input type="text" class="form-control" name="lastname" style="border: 0 none;" value="<?php echo isset($lastname) ? $lastname :'' ?>" required>
			</div>
			
			
		</div>
		<div class="form-group row">
			
			<div class="col-md-4">
				<label for="" class="control-label">Contact #</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><input type="text" class="form-control" name="pno" style="border: 0 none;" value="<?php echo isset($contact) ? $contact :'' ?>" required></b>
			</div>
			<br><br><br><br>

            <tr>
                       
                         Message:
                       
                       <td><textarea class='form-control' name="msg"><?php //echo $msg; ?></textarea></td>
                     </tr>



		</div>




		
        <td><input class='btn btn-success btn-user btn-lg' style="float: right;  " type='submit' name='smsg' value='Send Message'></td>
		<!--td><input class='btn btn-success btn-user btn-lg' style="float: right;  " onclick="" type='button' name='smsg' value='Cancel'></td-->
	</form>
</div>
<script>
	function closeForm() {
  document.getElementById("form1").style.display = "none";
}
</script>