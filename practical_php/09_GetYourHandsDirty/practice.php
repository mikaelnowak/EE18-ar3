<?php

	// Constants
	define("TITLE", "Arrays");

	// Variables
	$name = "Gunnar";
	
	// Arrays
	$age_group = array("child", "teenager", "adult");
	
	$handlebar = array(
		"name" => "Handlebar",
		"color" => "black"
	);

	$fu_manchu = array(
		"name" => "Fu Manchu",
		"color"	=> "brown"
	);
	
	$salvador_dali = array(
		"name" => "Salvador Dali",
		"color" => "blonde"
	);			

	$gentlemen = array (
		array (
			"name" => "Carter",
			"country" => "Canada"
		),
		array (
			"name" => "Rodrigo",
			"country" => "Uruguay"
		),
		array (
			"name" => "Giovanni",
			"country" => "Italy"
		)
  	);
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Get Your Hands Dirty: <?php echo TITLE?></title>
		<link href="../assets/styles.css" rel="stylesheet">
		<script type="text/javascript" src="../assets/syntaxhighlighter/scripts/shCore.js"></script>
		<script type="text/javascript" src="../assets/syntaxhighlighter/scripts/shBrushPhp.js"></script>
		<link type="text/css" rel="stylesheet" href="../assets/syntaxhighlighter/styles/shCoreDefault.css"/>
		<script type="text/javascript">SyntaxHighlighter.all();</script>
	</head>
	<body>
		<div class="wrapper">
			<a href="/" title="Back to directory" id="logo">
				<img src="../assets/img/logo.png" alt="PHP">
			</a>
			
			<h1>Get Your Hands Dirty: <small><!-- TITLE --></small></h1>
			<hr>
			
			<h2>Your Example</h2>
			
			<div class="sandbox">
				
				<h3><?php echo $gentlemen[0]["name"] . " from " . $gentlemen[0]["country"]?></h3>
				<p><?php echo $gentlemen[0]["name"]?> is quite the <?php echo $age_group[2]?> He sports a solid <?php echo $handlebar["name"]?> Moustache that is <?php echo $handlebar["color"]?> in color.</p>
				
				<h3><?php echo $gentlemen[1]["name"] . " from " . $gentlemen[1]["country"]?></h3>
				<p><?php echo $gentlemen[1]["name"]?> is a rather dapper <?php echo $age_group[1]?>! He proudly wears a <?php echo $fu_manchu["name"]?> that is coloured a gentle <?php echo $fu_manchu["color"]?>.</p>
				
				<h3><?php echo $gentlemen[2]["name"] . " from " . $gentlemen[2]["country"]?></h3>
				<p><?php echo $gentlemen[2]["name"]?> might seem too young for a 'stache because he is a <?php echo $age_group[0]?>. But he proudly displays his <?php echo $salvador_dali["name"]?> at school! Although, it's a little hard to see because it's light <?php echo $salvador_dali["color"]?></p>
				
			</div><!-- end sandbox -->
			
			<a href="index.php" class="button">Back to the final example</a>
			
			<div class="navs cf">
				<a href="" class="button prev">Previous Lecture</a>
				<a href="" class="button next">Next Lecture</a>
			</div><!-- end navs -->
			
			<hr>
			
			<small>&copy;<?php echo date('Y') . " - " . $name?></small>
		</div><!-- end wrapper -->
		
		<div class="copyright-info">
			<?php include('../assets/includes/copyright.php'); ?>
		</div><!-- end copyright-info -->
	</body>
</html>
