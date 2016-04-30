<?php 
function allContactsViewandEdit(){
	global $connect;
	global $home;
	
	if(isset($_GET['user_id'])&&ctype_digit($_GET['user_id'])){
		#if user_id is set then retrieve details of the user so that they can be editted
		$user_id=$_GET['user_id'];
		$SQL = "select * from users where user_id=$user_id";
		$run_SQL = mysqli_query($connect, $SQL);
		$row_SQL = mysqli_fetch_array($run_SQL);
		$firstname = $row_SQL['firstname'];
		$lastname = $row_SQL['lastname'];
		$telephone = $row_SQL['telephone'];
		$email = $row_SQL['email'];
		
	
		echo "
				<h4>Edit details of member </h4>
				<div>
					<form>
					<span>First Name</span>
					<span><input type=\"text\" name=\"edit_name\" value=\"$firstname\"/></span> <br/>
					
					<span>Last Name</span>
					<span><input type=\"text\" name=\"edit_name\" value=\"$lastname\"/></span> <br/>
					
					<span>Telephone</span>	
					<span><input type=\"text\" name=\"edit_telephone\" value=\"$telephone\"/></span><br/>
					
					<span>Email</span>	
					<span><input type=\"text\" name=\"edit_email\" value=\"$email\"/></span> <br/>
					
					<input type=\"submit\" value=\"Save changes\"/>
					<input type=\"button\" value=\"Cancel\" onclick = \"goBack()\" />
					</form>
					</div> ";
	}
	else{
			echo "	<h3 style=\"display:inline\">All Contacts</h3>
					<span>&nbsp;&nbsp;&nbsp;[<a href=\"$home/pages/insert_contact.php\">Add new Contact</a>]</span>
					<span>&nbsp;&nbsp;&nbsp;[Upload Excel file]</span>
					<h5>Members that are added here will be in a default group called \"ALL\"</h5>";
		#select only members from Christ replica and display them on the table
		$SQL = "select * from users";
		$run_SQL = mysqli_query($connect, $SQL);
		$num=0;
		if(mysqli_num_rows($run_SQL)){
		while($row_SQL = mysqli_fetch_array($run_SQL) ){
			$num++;
			$user_id = $row_SQL['user_id'];
			$firstname = $row_SQL['firstname'];
			$lastname = $row_SQL['lastname'];
			$telephone = $row_SQL['telephone'];
			$email = $row_SQL['email'];
			echo "<tr>
								<td>$num</td>
								<td>$firstname $lastname </td>
								<td>$telephone</td>
								<td>$email</td>
								<td><a href=\"?user_id=$user_id\">Edit</a></td>
								<td><input type=\"checkbox\"  name=\"delete_list[]\" value=\"$user_id\" style=\"width:30px;height:15px;\"></td>
				</tr>";	
			}
		}
		
	}
}

?>
				<div>
				
					<?php if(isset($_GET['user_id'])&&ctype_digit($_GET['user_id'])):?>
					
					<?php allContactsViewandEdit() ?>
			
					
							
						<?php else: ?>
						<form action="<?php echo $home.'/pages/delete_contacts.php';?>" method="post">
						<table class="form">
							<tr>
								<th><strong>#</strong></th>
								<th><strong>Name</strong></th>
								<th><strong>Telephone</strong></th>
								<th><strong>E-Mail</strong></th>
								<th><strong>Edit</strong></th>
								<th><input style="width:60px" id="Button" type="submit" value="Delete" disabled></th>
							</tr>
							<?php allContactsViewandEdit() ?>
						</form>
						</table>
						
						<?php endif; ?>
					
				</div>
			