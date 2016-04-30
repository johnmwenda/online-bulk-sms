<?php
// Be sure to include the file you've just downloaded
require_once('AfricasTalkingGateway.php');

// Specify your login credentials
 $username   = "johnmwenda";
 $apikey     = "85af4f5252c032cea922ee69f619113466c3e4ba2df9d121bf8c29e5917cc55b";

// Create a new instance of our awesome gateway class
$gateway    = new AfricasTalkingGateway($username, $apikey);

// Any gateway errors will be captured by our custom Exception class below, 
// so wrap the call in a try-catch block
try
{ 
  // Fetch the data from our USER resource and read the balance
  $data = $gateway->getUserData();
  echo "Balance: " . $data->balance."\n";
  // The result will have the format=> KES XXX
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while fetching user data: ".$e->getMessage()."\n";
}

// DONE!!! 
