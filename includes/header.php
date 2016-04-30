<!DOCTYPE HTML>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
	<title>Deliverance Church Majimbo</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo $home?>/css/normalize.css" type="text/css" media="screen">
	<link rel="stylesheet" href="<?php echo $home?>/css/grid.css" type="text/css" media="screen">
	<link rel="stylesheet" href="<?php echo $home?>/css/style.css" type="text/css" media="screen">
	<!-- <link rel="stylesheet" href="css/style.min.css" type="text/css" media="screen"> -->
	<!--[if IE]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<style type="text/css">
	</style>
	<script src="<?php echo $home?>/js/jquery-2.2.3.js"></script>
	
	<script> <!-- JQuery for send_sms.php page for the Recepient Tabs-->
		$(document).ready(function(){
			$('#manual-tab').click(function(){
				$("#manual-form-id").show(1000);
			 $("#address-tab").slideUp(1000);
			 $("#groups-tab").slideUp(1000);
				});
		});
	</script>
</head>
<body>
	<div class="menu">
		<div class="container clearfix">

			<div id="logo" class="grid_3">
				<h1 style="font-size: 1.8em;
	margin:0;
    color: #8a8683;
    font-weight: 400;"><a style="color:inherit;" href="<?php echo $home;?>">Deliverance Church Majimbo</a></h1>
			</div>

			<div id="nav" class="grid_9 omega">
				<ul class="navigation">
					<li><a href="<?php echo $home;?>/index.php?dashboard">DASHBOARD</a></li>
					<li><a href="<?php echo $home;?>/index.php?send_sms">SEND SMS</a></li>
					<li><a href="<?php echo $home;?>/index.php?groups">GROUPS</a></li>
					<li><a href="<?php echo $home;?>/index.php?contacts">CONTACTS</a></li>
					
				</ul>
			</div>

		</div>
	</div>