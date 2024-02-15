<html>
  <?php include "../../../shared_components/head.php" ?>
	<body>
		<?php include "../../../shared_components/header_nav.php" ?>
		<?php
			require_once __DIR__.'/../../../vendor/autoload.php';

			$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../../../');
			$dotenv->load();
			
			$success = $_GET["success"];
						
			if (!isset($_SERVER['PHP_AUTH_USER'])) {
				header('WWW-Authenticate: Basic realm="Create Post"');
				header('HTTP/1.0 401 Unauthorized');
				echo 'Page not found';
				exit;
			} else {
				if ($_SERVER['PHP_AUTH_USER'] == $_ENV["CREATE_POST_USER"] && $_SERVER['PHP_AUTH_PW'] == $_ENV["CREATE_POST_PWD"]) {
					echo '<form action="./create/submit_post.php"  method="post">
						<label for="title">Post Title:</label>
						<br/>
						<input name="title" id="title" type="text" size="60" />
						<br/>
						<br/>
						<label for="body">Post Body:</label>
						<br/>
						<textarea name="body" id="body" cols="60" rows="30"></textarea>
						<br/>
						<br/>
						<button type="submit">Submit</button>
					</form>';
					if ($success) {
						echo "<script type='text/javascript'>alert('Post created successfully');</script>";
					} else if ($success === false) {
						echo "<script type='text/javascript'>alert('Post creation failed');</script>";
					}
				} else {
					header('HTTP/1.1 401 Unauthorized');
					die('Page not found');
				}
			}
		?>
		<?php include "../../../shared_components/footer.php" ?>
	</body>
</html>