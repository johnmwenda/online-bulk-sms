<?php 
define('ROOT_PATH', dirname(dirname(__FILE__) ));
$_GLOBALS['root_path'] = ROOT_PATH;
$path = ROOT_PATH.'/includes/defines.php';
include $path;
include $db_connect_path;

if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(!empty($_POST['delete_list'])){
			$delete_list = $_POST['delete_list'];
			}
		
}

function DeleteSlectedUsers(){
			global $delete_list;
			 foreach($delete_list as $check) {
				 echo $check;				 
			 }
			
}




include $header_path;
?>
	<div class="slide" id="slide3" data-slide="3" data-stellar-background-ratio="0.5">
		<div class="container clearfix">

			<div id="content" class="grid_12">
				<div><h2>Online Bulk SMS System</h2></div>
				<?php DeleteSlectedUsers() ?>
			</div>
			<br style="clear:both" />

		</div>
	</div>
	
<?php include $footer_path; ?>
