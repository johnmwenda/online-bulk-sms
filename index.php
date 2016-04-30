<?php 
#Note, all Menus are includes based on what the user presses
define('ROOT_PATH', dirname(__FILE__) );
$_GLOBALS['root_path'] = ROOT_PATH;
$path = ROOT_PATH.'/includes/defines.php';
include $path;
include $db_connect_path;
include $functions_path;
include $header_path;
require_once(ROOT_PATH.'/africastalkingAPI/AfricasTalkingGateway.php');
// Specify your login credentials
 $username   = "johnmwenda";
 $apikey     = "85af4f5252c032cea922ee69f619113466c3e4ba2df9d121bf8c29e5917cc55b";
 $gateway    = new AfricasTalkingGateway($username, $apikey);

function getBalance(){
	global $username;
	global $apikey;
	global $gateway;	
	try
{ 
  // Fetch the data from our USER resource and read the balance
  $data = $gateway->getUserData();
  echo $data->balance;
  // The result will have the format=> KES XXX
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while fetching user data: ".$e->getMessage()."\n";
}
}

?>
	<div class="slide" id="slide3" data-slide="3" data-stellar-background-ratio="0.5">
		<div class="container clearfix">

			<div id="content" class="grid_12">
				<div><h2>Online Bulk SMS System</h2></div>			
				<!-- JOHN-EDIT replaced with tables<div id="col1" class="columns">
				<h3>Messages sent today</h3>
				<p>2000</p>
				</div>
				<div id="col2" class="columns">
				<h3>Total sent messages</h3>
				<p>2000</p>
				</div>
				<div id="col3" class="columns">
				<h3>Total Unsent messages</h3>
				<p>2000</p></div>
				<div id="col4" class="columns">
				<h3>Balance</h3>
				<p>2000</p></div>	-->
				
			<?php
			if(isset($_GET['send_sms'])): 
			include $home_path.'/includes/topMenuIncludes/send_sms_top_menu_include.php';
			?>
			
			<?php
			elseif(isset($_GET['groups'])):
			echo "<div style=\"padding: 0px 20px;\">";
			include $home_path.'/includes/topMenuIncludes/groups_top_menu_include.php';
			echo "</div>";
			
			elseif(isset($_GET['contacts'])||(isset($_GET['user_id']))):
			include $home_path.'/includes/topMenuIncludes/contacts_top_menu_include.php';
			?>

			
				
			<?php else:?>
				<div id="dashboard" >
	     			<div class="side-dashboard-wrapper">
						<div class="side-dashboard">
							
							<h3>Messages sent today</h3>
							<p>2000</p>
								
						</div>
						<div class="side-dashboard">
							
							<h3>Total sent messages</h3>
							<p>2000</p>
							
						</div>
							<div class="side-dashboard">
							
							<h3>Total Unsent messages</h3>
							<p>2000</p>
							
						</div>
						<div class="side-dashboard">
							
							<h3>Balance</h3>
							<p><?php #getBalance()?></p>											
						</div>
					</div>
					<div class="center-dashboard">
					<span>Outbox</span><span>Outbox</span><span>Outbox</span><span>Outbox</span>
					</div>
					<br style="clear:both;">
				</div>
			<?php endif;?>
				
			</div>
			<br style="clear:both" />

		</div>
	</div>
<?php include $footer_path; ?>
