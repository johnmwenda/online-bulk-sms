<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/online-bulk-sms/includes/defines.php";
include $path;
include $db_connect_path;
include $functions_path;
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
				
			<?php
			if(isset($_GET['send_sms'])): 
			include $_SERVER['DOCUMENT_ROOT'].'/online-bulk-sms/includes/topMenuIncludes/send_sms_top_menu_include.php';
			?>
			
			<?php
			elseif(isset($_GET['groups'])):
			echo "<div style=\"padding: 0px 20px;\">";
			include $_SERVER['DOCUMENT_ROOT'].'/online-bulk-sms/includes/topMenuIncludes/groups_top_menu_include.php';
			echo "</div>";
			
			elseif(isset($_GET['contacts'])):
			include $_SERVER['DOCUMENT_ROOT'].'/online-bulk-sms/includes/topMenuIncludes/contacts_top_menu_include.php';
			?>

			
				
			<?php else:?>
				<table id="home-table" style="width:100%">
					  <tr>
						<td>
						<h3>Messages sent today</h3>
						<p>2000</p>
						</td>		
						<td>
						<h3>Total sent messages</h3>
						<p>2000</p>
						</td>
						<td>
						<h3>Total Unsent messages</h3>
						<p>2000</p>
						</td>
						<td>
						<h3>Balance</h3>
						<p>2000</p>
						</td>
					  </tr>
				</table>
			<?php endif;?>
				
			</div>
			<br style="clear:both" />

		</div>
	</div>
<?php include $footer_path; ?>
