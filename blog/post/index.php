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
		<main>
			<?php
				$dbhost = 'REPLACE WITH DB HOST NAME';
				$dbuser = 'REPLACE WITH REAL USER';
				$dbpass = 'REPLACE WITH REAL PASSWORD';
				$dbname = 'blog';

				$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
				
				if(!$conn) {
					die('Could not connect: ' . mysqli_connect_error());
				}

				$id = basename($_SERVER['REQUEST_URI']);
				$sql = 'SELECT title, body, created_at FROM posts WHERE id='.$id;
				$result = mysqli_query($conn, $sql);
				
				if (mysqli_num_rows($result) > 0) {
					$row = mysqli_fetch_assoc($result);
					echo '<h1>'.$row['title'].'</h1>';
					echo '<article><p>'.$row['body'].'</p></article>';
				}
			?>
		</main>
	</body>
</html>