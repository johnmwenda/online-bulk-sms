<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/online-bulk-sms/includes/defines.php";
include $path;
include $db_connect_path;
include $functions_path;
include $header_path;
#generate <select></select>
function generateGroupsSelect () {
	if(isset($_GET['addressbook_dropdown'])&&ctype_digit($_GET['addressbook_dropdown'])){
	$x=$_GET['addressbook_dropdown'];
	}
	global $connect;
	$SQL = 'select * from groups';
	$run_SQL = mysqli_query($connect, $SQL);
	while ($row_SQL=mysqli_fetch_array($run_SQL)){
		$group_id = $row_SQL['group_id'];
		$group_name = $row_SQL['name'];
		echo "<option value=\"$group_id\">$group_name</option>";
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
							<label style="padding: 5px;background-color:#eee;">SMS TO GROUPS</label>
						</th>
					</tr>
					<tr>
						<th valign="top"><label for="tabs">Recepient List (Choose a group to send an SMS to)</label></th>
						<td>
						<div class="tabs" id="tabs" style="min-height:200px">
							
						   <div class="tab">							   
							   <div class="content">
												   
									<select name="addressbook_dropdown" style="padding: 2px;width: 250px;margin-top:5px;">
									<option>Select Group</option>
									<?php generateGroupsSelect ();?>
									</select>
									<p>You can counter check the members and contacts of people in a group by going to "Groups" on the Top Menu </p>
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
						<th><label for="question" class="invisible">Question:</label></th>
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
