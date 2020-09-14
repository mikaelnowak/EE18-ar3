<?php
	
	// Constants
	define("TITLE", "Multi-Dimensional Arrays");
	
	// Custom Variables
	$name= "Gunnar";
	$lesson_nr = 8;
	
	// Moustache Multi-Dimensional Array
	$moustaches = array(
		array(
			"name" => "Handlebar",
			"creep_factor" => "High",
			"avg_growth_d" => 14
		),

		array(
			"name" => "Salvador Dali",
			"creep_factor" => "Extreme",
			"avg_growth_d" => 62
		),

		array(
			"name"	=> "Fu Manchu",
            "creep_factor" => "Very High",
            "avg_growth_d" => 58
		)
	);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>PHP <?php echo TITLE?></title>
		<link href="../assets/styles.css" rel="stylesheet">
	</head>
	<body>
		<div class="wrapper">
			<a href="/" title="Back to directory" id="logo">
				<img src="../assets/img/logo.png" alt="PHP">
			</a>
			
			<h1>Tutorial <?php echo $lesson_nr?>: <small><?php echo TITLE?></small></h1>
			<hr>
			
			<h2>Your Example</h2>
			
			<div class="sandbox">
				<h2>The <?php echo $moustaches[0]["name"]?> Moustache!</h2>
				<p>This moustache is quite the dirt squirrel! It boasts a creep factor of <strong><?php echo $moustaches[0]["creep_factor"]?></strong> and takes <strong><?php echo $moustaches[0]["avg_growth_d"]?> days</strong> to grow on average.</strong></p>
				
				<h2>The <?php echo $moustaches[1]["name"]?> Moustache!</h2>
				<p>This moustache is quite the dirt squirrel! It boasts a creep factor of <strong><?php echo $moustaches[1]["creep_factor"]?></strong> and takes <strong><?php echo $moustaches[1]["avg_growth_d"]?> days</strong> to grow on average.</strong></p>
				
				<h2>The <?php echo $moustaches[2]["name"]?> Moustache!</h2>
				<p>This moustache is quite the dirt squirrel! It boasts a creep factor of <strong><?php echo $moustaches[2]["creep_factor"]?></strong> and takes <strong><?php echo $moustaches[2]["avg_growth_d"]?> days</strong> to grow on average.</strong></p>
			</div><!-- end sandbox -->
			
			<a href="index.php" class="button">Back to the lecture</a>
			
			<hr>
			
			<small>&copy;<?php echo date('Y') . " - " . $name?></small>
		</div><!-- end wrapper -->
		
		<div class="copyright-info">
			<?php include('../assets/includes/copyright.php'); ?>
		</div><!-- end copyright-info -->
	</body>
</html>