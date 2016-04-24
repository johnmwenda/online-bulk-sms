<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/online-bulk-sms/includes/defines.php";
include $path;
include $db_connect_path;
include $header_path;
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
							<label style="padding: 5px;background-color:#eee;">SMS TO Individuals</label>
						</th>
					</tr>
					<tr>
						<th valign="top"><label for="tabs">Recepient List (Manually enter the telephone number)</label></th>
						<td>
						<div class="tabs" id="tabs">
							
						   <div class="tab">							  						   
							   <div class="content">
								   <p>NB: Format for entering contacts is +254719512216,+254712345214,+254713243120</p>
								   
									<textarea name="textarea-name" id="message" cols="30" rows="5"></textarea>
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
