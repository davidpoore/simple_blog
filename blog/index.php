<html>
  <head>
		<title>Triplebatman</title>
		<link rel="icon" type="image/x-icon" href="/images/favicon.ico">
	</head>
	<body>
		<nav>
			<h1><a href="/">Home</a></h1>
			<h1><a href="/blog">Blog</a></h1>
		</nav>
		<?php
			require_once __DIR__.'/../vendor/autoload.php';

			$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
			$dotenv->load();
			
			include "posts.php"; 
		?>
	</body>
</html>