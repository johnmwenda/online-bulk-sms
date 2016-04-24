<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/online-bulk-sms/includes/defines.php";
include $path;
include $db_connect_path;
include $header_path;
$error = array("firstname_error"=>"","secondname_error"=>"","telephone_error"=>"Format is +2547xx123456","email_error"=>""); //Store errors.
$error_flag=false; //boolean which is set to true when an error occurs


#$goback=""; //GET element; if set we just go back and edit the data we inserted
#$save=""; //GET element; if set we run insert data into mysql
		
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			
			$firstname = test_input($_POST['firstname']);
			$secondname = test_input($_POST['secondname']);
			$telephone = test_input($_POST['telephone']);
			$email = test_input($_POST['email']);
			if(!empty($_POST['group_list'])){
			$group_list = $_POST['group_list'];
			}
			
			
			if(empty($firstname)):
				$error['firstname_error'] = "*Empty name";
				$error_flag = true;				
			elseif(!ctype_alnum($firstname)):
				$error['firstname_error'] = "*Please put one name only";
			endif;
			
			
			if(empty($secondname)):
				$error['secondname_error'] = "*Empty name";
				$error_flag = true;
			elseif(!ctype_alnum($secondname)):
				$error['secondname_error'] = "*Please put one name only";	
			endif;
			
			
			if(empty($telephone)):
				$error['telephone_error']="*Telephone empty. Format is +2547xx123456";
				$error_flag = true;
			elseif(!preg_match("/^[+]{1}[0-9]{3}[0-9]{9}$/", $telephone)):
			// $phone is  invalid
				$error['telephone_error']="*Invalid format. The correct format is +254712345678";
			endif;
			
			
			if(empty($email)):
				$error['email_error'] = "*Empty email";
				$error_flag = true;
			elseif (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)): 
				$error['email_error']= "*Invalid email format";
				$error_flag = true;
			endif;
		}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
function generateAddressesCheckList(){
	global $connect;
	$SQL = 'select * from groups';
	$run_SQL = mysqli_query($connect, $SQL);
	while ($row_SQL=mysqli_fetch_array($run_SQL)){
		$group_id = $row_SQL['group_id'];
		$name = $row_SQL['name'];
		$id_name = $group_id.''.$name;
		echo "<input type=\"checkbox\" id=\"$group_id\" name=\"group_list[]\" value=\"$id_name\" style=\"width:20px\"/>";
		echo "<label for=\"$group_id\" style=\"\">$name</label><br />";
	}
}
/*Receives POST data from the first visible form*/
function rePrintItemstoInsert(){
			global $firstname;
			global $secondname;
			global $telephone;
			global $email;
			
			
			$phpself= htmlspecialchars($_SERVER["PHP_SELF"]);
		$string1 = "
				<div>
				<form action=\"$phpself\" method=\"post\">
				<table class=\"form\">
					<tr>
					<td><span>First Name</span></td>
					<td><span><input type=\"hidden\" name=\"firstname\" value=\"$firstname\"/>$firstname</span></td>
					</tr>
					
					<tr>
					<td><span>Last Name</span></td>
					<td><span><input type=\"hidden\" name=\"secondname\" value=\"$secondname\"/>$secondname</span></td>
					</tr>				
					<tr>
					<td><span>Telephone</span></td>	
					<td><span><input type=\"hidden\" name=\"telephone\" value=\"$telephone\"/>$telephone</span></td>
					</tr>
					
					<tr>
					<td><span>Email</span></td>
					<td><span><input type=\"hidden\" name=\"email\" value=\"$email\"/>$email</span></td>
					</tr>
					
					<tr>
					<td style=\"vertical-align:top\"><span>Group</span>	</td>
					<td>";
					$string2 = displayIterativeDatatoConcatenate();
					$string1.=$string2.(" 
					
					</td>
					</tr>
				</table>
				<input type=\"submit\" name=\"save\" value=\"Save\" />
				</form>
										
					
					<input type=\"button\" value=\"Go Back\" onclick=\"history.back(-1)\" />
					</div> ");
					echo $string1;
}
function displayIterativeDatatoConcatenate(){
	global $group_list;
	$string1 = null;
	if(!empty($group_list) ){
    foreach($group_list as $check) {
			$check_name=preg_replace('/[0-9]+/', '', $check);
			$string1.= "<span><input type=\"hidden\" name=\"group_list[]\" value=\"$check\"/>$check_name</span><br/>";
		}
	return $string1;
	}
}


/*Receives POST data from the second in-visible form which allows user to confirm the data input*/
function insertData(){
			global $firstname;
			global $secondname;
			global $telephone;
			global $email;
			global $group_list;
			global $connect;
			$firstname=mysqli_real_escape_string($connect, $firstname);
			$secondname= mysqli_real_escape_string($connect, $secondname);
			$telephone= mysqli_real_escape_string($connect, $telephone);
			$email= mysqli_real_escape_string($connect, $email);

	$SQL = "INSERT INTO users (user_id, firstname, lastname, telephone, email) VALUES (NULL, '$firstname', '$secondname', '$telephone', '$email')";
	if (mysqli_query($connect, $SQL)) {
    printf("Success");}
		$id = mysqli_insert_id($connect); //return Id of last inserted row
		
		//Code to link users to all groups where he is a member
		if(!empty($group_list) ){
			foreach($group_list as $check) {
					$group_id = mysqli_real_escape_string($connect, $check[0]);//$check is initially [1.CHRIST REPLICA], $check[0] returns 1}
					$SQL = "select name from groups where group_id=$group_id";
					$run_SQL = mysqli_query($connect, $SQL);
					$row_SQL=mysqli_fetch_array($run_SQL);	
					$group_name_stripped = str_replace(' ','',$row_SQL['name']);
					$SQL2 = "insert into $group_name_stripped (user_id) VALUES ($id)";
					if (mysqli_query($connect, $SQL2)) {
						printf("Success");}
					}
			
		}
		
	}
	

?>
	<div class="slide" id="slide3" data-slide="3" data-stellar-background-ratio="0.5">
		<div class="container clearfix">

			<div id="content" class="grid_12">
				<div><h2>Online Bulk SMS System</h2></div>
			<?php 
				$post=$_SERVER["REQUEST_METHOD"] == "POST"; #boolean to store whether page was posted or not
				$get=$_SERVER["REQUEST_METHOD"] == "GET"; #boolean to store whether page was posted through GET or not
				#display the view below if(POST->TRUE&&ERROR->TRUE or !POST)
				#!POST means generate form, for Initial Viewing 
				#the idea is to :
							#1. display form for initial view 
							#2. display form when data is posted with Errors
							#3. if there are no errors and the form is posted, then display next view
				if(($post && $error_flag==true)|| !$post): 
				#initialize input names to null to avoid undefined variable when viewing form for first time
							if(!$post){
								$firstname = "";
								$secondname = "";
								$telephone = "";
								$email = "";
							}      
			?>
			
				<div>
				
					<h3>Insert a new Contact</h3>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						<table class="form">
							<tr>
								<th><label for="input-one"><strong>First Name:</strong></label></th>
								<td><input class="inp-text" name="firstname" id="input-one" type="text" size="30" value="<?php echo $firstname;?>" /><span class="error"><?php echo $error['firstname_error'];?></span></td>
							</tr>

							<tr>
								<th><label for="input-two"><strong>Second Name:</strong></label></th>
								<td><input class="inp-text" name="secondname" id="input-two" type="text" value="<?php echo $secondname;?>" size="30" /><span class="error"><?php echo $error['secondname_error'];?></span></td>
							</tr>

							<tr>
								<th><label for="input-three"><strong>Telephone:</strong></label></th>
								<td><input class="inp-text" name="telephone" id="input-three" type="text" value="<?php echo $telephone;?>" size="30" /><span class="error"><?php echo $error['telephone_error'];?></span></td>
							</tr>

							<tr>
								<th><label for="input-three"><strong>Email:</strong></label></th>
								<td><input class="inp-text" name="email" id="input-three" type="text" value="<?php echo $email;?>" size="30" /><span class="error"><?php echo $error['email_error'];?></span></td>
							</tr>
							
								<tr>
								<th style="vertical-align:top"><label for="input-three"><strong>Choose Group:</strong></label></th>
								<td>
									<?php generateAddressesCheckList ();?>
									NB:/Leave unchecked if the contact is not in any group
								</td>
							</tr>
					
							<tr>
								<td colspan="2" style="text-align:center" ><input class="submit-text" type="submit" value="Submit" name="submit"/></td>
							</tr>
						</table>
					
					</form>
				</div>
				<?php elseif(isset($_POST['submit'])):
					echo "The following contacts will be added to the database";
					rePrintItemstoInsert();

					
					elseif(isset($_POST['save'])):
						insertData();
						echo "<script>alert(\"The contacts have been inserted in the database\")
						window.location = 'http://localhost/online-bulk-sms/index.php?contacts'</script>";
						
												
						
					endif;
				?>

			</div>
			<br style="clear:both" />

		</div>
	</div>
	
<?php include $footer_path; ?>
