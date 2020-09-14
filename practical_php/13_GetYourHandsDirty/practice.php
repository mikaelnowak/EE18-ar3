<?php
	
	// Constants
	define("TITLE", "IF, Else, Elseif");
	
	// Custom Variables
	$name = "Gunnar";

	$species = "Human";
	$nativeLanguage = "Swedish";
	$yearsOnEarth = 1000000;

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
			
			<h1>Get Your Hands Dirty: <small><?php echo TITLE?></small></h1>
			<hr>
			
			<h2>Your Example</h2>
			
			<div class="sandbox">
				<?php
					if ($species == "Cat") {
						echo "<p>Meow</p>";
					} elseif ($species == "Human") {
						echo "<p>Hi</p>";
					} else {
						echo "<p>Hmmmmm</p>";
					}
				?>
				<h5>2</h5>
				<?php
				if ($yearsOnEarth == 20) {
					echo "<p>20 years</p>";
				} elseif ($yearsOnEarth < 20) {
					echo "<p>less then 20 years</p>";
				} else {
					echo "<p>more then 25 years</p>";
				}
				?>
				<h5>3</h5>
				<?php
					if($nativeLanguage == "German") {
						echo "<p>Guten tag</p>";
					} elseif ($nativeLanguage == "Swedish") {
						echo "<p>Hej</p>";
					} else {
						echo "<p>Hi</p>";
					}
				?>
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
