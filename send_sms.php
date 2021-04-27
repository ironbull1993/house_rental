<?php
include('db_connect.php');
/*
//require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require __DIR__ . '/vendor/autoload.php';

$account_sid = 'ACe3ed9f50951fd38cb7f2c3e6dbef4c45';
$auth_token = 'e58fd5a62b127ab696b2f802ea405f2b';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+18583608242";

$client = new \Twilio\Rest\Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+255743997716',
    array(
        'from' => $twilio_number,
        'body' => 'I sent this message in under 10 minutes!'
    )
);
/*
//$MessageBird= new \MessageBird\Client('rn7bnZF1t4r5Q8UPXwIQOupgk');
$MessageBird= new \MessageBird\Client('gWFMgqonanHCYC8RjAIPTbme2');
$Message    = new \MessageBird\Objects\Message();
$Message->originator = 'YOUR-RENT';
//$Message->recipients = array(+255743997716);
$Message->recipients = ['+255743997716'];
$Message->body       ='Your rent status is about to expire please make payment or contact +255713616639';
print_r(json_encode($MessageBird->messages->create($Message)));




use \Vonage\Client\Credentials\Basic;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'ACe3ed9f50951fd38cb7f2c3e6dbef4c45';
$auth_token = 'e58fd5a62b127ab696b2f802ea405f2b';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+18583608242";

$client = new \Twilio\Rest\Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+255743997716',
    array(
        'from' => $twilio_number,
        'body' => 'I sent this message in under 10 minutes!'
    )
);


*/
//require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
//require __DIR__ . '/vendor/autoload.php';




/**
 * Class Basic
 * Read-only container for api key and secret.
 */







use \Vonage\Client;






//include_once "vendor/Vonage/Client.php";

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


//if(isset($_POST['smsg'])){
  //  $pno = $_POST['pno'];
 //   $msg = $_POST['msg'];
$basic  = new \Nexmo\Client\Credentials\Basic("b509304f", "yMXJtKnsJv9RhWvf");

$client = new \Nexmo\Client($basic);

//$client = new \Vonage\Client($basic);

//$guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
//$client->setHttpClient($guzzleClient);
//try {
$message = $client->message()->send([
    'to' => "255743997716",
    'from' => '255743997716',
    'text' => "testing"
]);

$response = $message->getResponseData();

if ($message->getStatus() == 0) { //echo "<script> alert('The message was sent successfully');</script>";
    echo "The message was sent successfully\n";
} else { //echo "<script> alert('The message failed!!!');</script>";
    echo "The message failed with status: " . $message->getStatus() . "\n";
}
//}catch (Exception $e) {
    //echo "<script> alert('The message was not sent!!!');</script>";
//}}
/*
if($response['messages'][0]['status'] == 0) {
            echo "<script> alert('The message was sent successfully');</script>";
        } else {
            echo "<script> alert('The message failed!!!');</script>";
        }
    } catch (Exception $e) {
        echo "<script> alert('The message was not sent!!!');</script>";
    }
  }

/*
if ($message->getStatus() == 0) {
    echo "The message was sent successfully\n";
} else {
    echo "The message failed with status: " . $message->getStatus() . "\n";
}


if(isset($_POST['smsg'])){
    $pno = $_POST['pno'];
    $msg = $_POST['msg'];
   // $basic  = new \Nexmo\Client\Credentials\Basic('855de446', 'iKYHA4zYzabA4VKb');
    $basic  = new \Nexmo\Client\Credentials\Basic("b509304f", "yMXJtKnsJv9RhWvf");
    $client = new \Nexmo\Client($basic);
  
    try {
        $message = $client->message()->send([
            'to' => "$pno",
            'from' => '255743997716',
            'text' => "$msg"
        ]);
  
        $response = $message->getResponseData();
  
        if($response['messages'][0]['status'] == 0) {
            echo "<script> alert('The message was sent successfully');</script>";
        } else {
            echo "<script> alert('The message failed!!!');</script>";
        }
    } catch (Exception $e) {
        echo "<script> alert('The message was not sent!!!');</script>";
    }
  }

*/

?>
<!--html>
<body>
<div class="container-fluid">

           
           <h1 class="h3 mb-2 text-gray-800" align = "center">Messages</h1>


           
           <div class="card shadow mb-4">
             <div class="card-body">
               <div class="table-responsive">
                 <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">

                   <tbody>
                     <form action="<?php //echo $_SERVER['PHP_SELF']; ?>" method = "POST">
                     <tr>
                       <td>
                         To:
                       </td>
                       <td><input type='text' class='form-control form-control-user' name='pno'></td>
                     </tr>
                     <tr>
                       <td>
                         Message:
                       </td>
                       <td><textarea class='form-control' name="msg"><?php //echo @$msg; ?></textarea></td>
                     </tr>
                     <tr>
                     <td></td>
                     <td><input class='btn btn-success btn-user btn-lg' type='submit' name='smsg' value='Send Message'></td>
                     </form>
                     <tr>
                   </tbody>
                 </table>
               </div>
             </div>
           </div>

         </div>
</body>
</html-->