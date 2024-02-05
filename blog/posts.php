<html>
  <?php
		$dbhost = 'REPLACE WITH DB HOST NAME';
		$dbuser = 'REPLACE WITH REAL USER';
		$dbpass = 'REPLACE WITH REAL PASSWORD';
		$dbname = 'blog';

		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

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