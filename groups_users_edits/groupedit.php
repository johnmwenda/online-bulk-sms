<?php 
define('ROOT_PATH', dirname(dirname(__FILE__) ));
$_GLOBALS['root_path'] = ROOT_PATH;
$path = ROOT_PATH.'/includes/defines.php';
include $path;
include $db_connect_path;
include $header_path;
function christReplicaViewandEdit(){
	global $connect;
	
	if(isset($_GET['user_id'])&&ctype_digit($_GET['user_id'])){
		#if user_id is set then retrieve details of the user so that they can be editted
		$user_id=$_GET['user_id'];
		mysqli_real_escape_string($connect, $user_id);
		$SQL = "select * from users where user_id=$user_id";
		$run_SQL = mysqli_query($connect, $SQL);
		$row_SQL = mysqli_fetch_array($run_SQL);
		$firstname = $row_SQL['firstname'];
		$lastname = $row_SQL['lastname'];
		$telephone = $row_SQL['telephone'];
		$email = $row_SQL['email'];
		
		echo "
				<h3>Christ Replica Group</h3>
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
					<input type=\"submit\" value=\"Cancel\"/>
					</form>
					</div> ";
	}
	else{
		if(isset($_GET['group_id'])){
			
		$group_id = $_GET['group_id'];
		#select only members from Christ replica and display them on the table
					$group_id = mysqli_real_escape_string($connect, $group_id);
					ECho $group_id;
					$SQL = "select name from groups where group_id=$group_id";
					$run_SQL = mysqli_query($connect, $SQL);
					$row_SQL=mysqli_fetch_array($run_SQL);	
					$group_name=$row_SQL['name'];
					$group_name_stripped = str_replace(' ','',$row_SQL['name']);
					
		$SQL = "select * from $group_name_stripped,users where $group_name_stripped.user_id=users.user_id ";
		$run_SQL = mysqli_query($connect, $SQL);
		$num=0;
		echo "<span><h3 style=\"display:inline-block;\">$group_name Group</h3></span><span>Add members to the group<span>"; //Echo customized name of the Group
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
					</tr>";	
				}
			}
		
		}
	}
}
?>
	<div class="slide" id="slide3" data-slide="3" data-stellar-background-ratio="0.5">
		<div class="container clearfix">

			<div id="content" class="grid_12">
				<div><h2>Online Bulk SMS System</h2></div>
				<div>
					<?php if(isset($_GET['user_id'])&&ctype_digit($_GET['user_id'])):?>
					
					<?php christReplicaViewandEdit() ?>
			
					
							
						<?php else: ?>
						<table class="form">
							<tr>
								<th><strong>#</strong></th>
								<th><strong>Name</strong></th>
								<th><strong>Telephone</strong></th>
								<th><strong>E-Mail</strong></th>
								
							</tr>
							<?php christReplicaViewandEdit() ?>
						</table>
						
						<?php endif; ?>
					
				</div>
			
			</div>
			<br style="clear:both" />

		</div>
	</div>
	
<?php include $footer_path; ?>
