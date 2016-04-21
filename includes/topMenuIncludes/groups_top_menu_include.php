<?php 
function groupsView(){
	global $connect;
	$SQL = 'select * from groups';
	$run_SQL = mysqli_query($connect, $SQL);
	
	while ($row_SQL=mysqli_fetch_array($run_SQL)){
		$group_id = $row_SQL['group_id'];
		$group_name= $row_SQL['name'];
		$description = $row_SQL['description'];
		$group_name_stripped = str_replace(' ','',$group_name);
	
	echo "<div class=\"group-view\">
			<h4>$group_name</h4>
			<p>$description</p>
			<a href=\"pages/$group_name_stripped.php?group_id=$group_id?\">View and Edit the members of this group</a>
		</div>";
	}
}
groupsView();
?>
