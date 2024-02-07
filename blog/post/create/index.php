<html>
  <head>
		<title>Triplebatman</title>
		<link rel="icon" type="image/x-icon" href="/images/favicon.ico">
	</head>
	<body>
		<?php
			require_once __DIR__.'/../../../vendor/autoload.php';

			$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../../../');
			$dotenv->load();
			
			$success = $_GET["success"];
						
			if (!isset($_SERVER['PHP_AUTH_USER'])) {
				echo 'IN HERE';
				header('WWW-Authenticate: Basic realm="Create Post"');
				header('HTTP/1.0 401 Unauthorized');
				echo 'Page not found';
				exit;
			} else {
				if ($_SERVER['PHP_AUTH_USER'] == $_ENV["CREATE_POST_USER"] && $_SERVER['PHP_AUTH_PW'] == $_ENV["CREATE_POST_PWD"]) {
					echo '<form action="./create/submit_post.php"  method="post">
						<label for="title">Post Title:</label>
						<input name="title" id="title" type="text">

						<label for="body">Post Body:</label>
						<input name="body" id="body" type="textarea">

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
	</body>
</html>