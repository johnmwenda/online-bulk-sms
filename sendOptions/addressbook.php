<?php 
define('ROOT_PATH', dirname(dirname(__FILE__) ));
$_GLOBALS['root_path'] = ROOT_PATH;
$path = ROOT_PATH.'/includes/defines.php';
include $path;
include $db_connect_path;
include $functions_path;
include $header_path;

function generateAddressesCheckList(){
	global $connect;
	$SQL = 'select * from users';
	$run_SQL = mysqli_query($connect, $SQL);
	while ($row_SQL=mysqli_fetch_array($run_SQL)){
		$address_id = $row_SQL['user_id'];
		$address_name = $row_SQL['firstname'].' '.$row_SQL['lastname'];
		$address_telephone = $row_SQL['telephone'];
		echo "<input type=\"checkbox\" id=\"$address_id\" name=\"address_list[]\" value=\"$address_id\" />";
		echo "<label for=\"$address_id\" style=\"\">$address_name $address_telephone</label><br />";
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
			<div>
	
			<form action="" method="post" id="manual-form-id">	
				<table class="form">
					<tr>
						<th>
							<label style="padding: 5px;background-color:#eee;">SMS TO Contacts</label>
						</th>
					</tr>
					<tr>
						<th valign="top"><label for="tabs">Recepient List (Select contacts to send an SMS to)</label></th>
						<td>
						<div class="tabs" id="tabs" style="min-height:200px">
							
						   <div class="tab">							   
							  <div class="content"  id="content-tab-2" style="margin-top:5px;overflow-y:scroll;">										   
									<p style="margin-bottom:5px">Select contacts</p>
									<?php generateAddressesCheckList ();?>
									
							   </div> 
						   </div>
							
					
							
						</div>
						</td>
					</tr>
					<tr>
						<th class="message-up"><label for="message">Type your message here:</label></th>
						<td>
						<textarea name="textarea-name" id="message" cols="30" rows="5"></textarea>
						</td>
					</tr>
					<tr>
						<th><label for="submit" class="invisible">Question:</label></th>
						<td><input id="submit-button" type="submit" value="Send SMS"/></td>
					</tr>
				</table>
			</form>
				</div>
			</div>
			<br style="clear:both" />

		</div>
	</div>
<?php include $footer_path; ?>

