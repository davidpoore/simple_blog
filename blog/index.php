<html>
  <?php include "../shared_components/head.php" ?>
	<body>
		<?php include "../shared_components/header_nav.php" ?>
		<?php
			require_once __DIR__.'/../vendor/autoload.php';

			$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
			$dotenv->load();
			
			include "posts.php"; 
		?>
		<?php include "../shared_components/footer.php" ?>
	</body>
</html>