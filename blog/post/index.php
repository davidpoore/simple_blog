<!DOCTYPE html>
<html>
	<?php include "../../shared_components/head.php" ?>
	<body>
		<?php include "../../shared_components/header_nav.php" ?>
		<main>
			<?php
				require_once __DIR__.'/../../vendor/autoload.php';

				$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../../');
				$dotenv->load();
			
				$conn = mysqli_connect($_ENV["DB_HOST"], $_ENV["DB_USER"], $_ENV["DB_PWD"], $_ENV["DB_NAME"]);
				
				if(!$conn) {
					die('Could not connect: ' . mysqli_connect_error());
				}

				$id = $_GET['id'];
				
				if (is_numeric($id)) {
					$sql = 'SELECT title, body, created_at FROM posts WHERE id='.$id;
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
						$row = mysqli_fetch_assoc($result);
						echo '<h1>'.$row['title'].'</h1>';
						echo '<article>'.$row['body'].'</article>';
					} else {
						echo '<h1>Invalid post id</h1>';
					}
				} else {
					echo '<h1>Invalid post id</h1>';
				}
			?>
		</main>
		<?php include "../../shared_components/footer.php" ?>
	</body>
</html>