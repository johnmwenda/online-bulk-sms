<?php 


function generateAddressList(){
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

function generateGroups () {
	if(!ctype_digit($_GET['groups'])){
	$x=$_GET['groups'];
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
	<table class="form">
		<tbody>
		<tr>
			<th>
			<label for="tabs-list">Recepient List</label>
			</th>
			<td style="padding-left:35px">
				<ul id="tabs-list" class="recepient-tabs">
				<li id="manual-tab">MANUAL</li>
				<li id="address-tab">ADDRESS BOOK</li>
				<li id="groups-tab">GROUPS</li>
				</ul> 
				
				
			</td>
		</tr>
		</tbody>
	</table>
	
	<form action="" method="post" id="manual-form-id" style="display:none">	
		<table class="form">
			<tr>
				<th valign="top"><label for="tabs">Recepient List</label></th>
				<td>
				<div class="tabs" id="tabs">
					
				   <div class="tab">
					   <input type="radio" id="tab-1" name="tab-group-1" checked/>
					   <label for="tab-1">Manual</label>
					   
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
				<td><samp>3&nbsp;+&nbsp;2&nbsp;=</samp> &nbsp; <input class="answer" name="antispam" id="question" type="text" size="5" /> 
				<span><strong>(spam protection)</strong></span></td>
			</tr>
		</table>
	</form>