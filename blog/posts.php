<html>
  <?php
		$conn = mysqli_connect($_ENV["DB_HOST"], $_ENV["DB_USER"], $_ENV["DB_PWD"], $_ENV["DB_NAME"]);

		if(!$conn) {
			die('Could not connect: ' . mysqli_connect_error());
		}

		$sql = 'SELECT id, title, body, created_at FROM posts ORDER BY id DESC';
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		 // output data of each row
		 while($row = mysqli_fetch_assoc($result)) {
			 echo '<a href="blog/post/'.$row['id'].'">'.$row['title'].'</a><br/>';
		 }
		}

		mysqli_close($conn);
  ?>
</html>