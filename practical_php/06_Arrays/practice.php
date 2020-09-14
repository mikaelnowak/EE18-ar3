<?php
	
	// Constants
	define("TITLE", "Arrays");
	
	// Custom Variables
	$name = "Gunnar";
	$lesson_nr = 6;
	
	// Moustache Array
	$mobiles = array("Samsung", "Iphone", "Huwaei");

?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo TITLE?></title>
		<link href="../assets/styles.css" rel="stylesheet">
	</head>
	<body>
		<div class="wrapper">
			<a href="/" title="Back to directory" id="logo">
				<img src="../assets/img/logo.png" alt="PHP">
			</a>
			
			<h1>Lecture <?php echo $lesson_nr?>: <small><?php echo TITLE?></small></h1>
			<hr>
			
			<h2>Your Example</h2>
			
			<div class="sandbox">
			
				<h2>Moustache Types</h2>
				<ul>
					<li><?php echo $mobiles[0]?></li>
					<li><?php echo $mobiles[1]?></li>
					<li><?php echo $mobiles[2]?></li>
				</ul>
				
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
