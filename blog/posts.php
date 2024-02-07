<html>
  <?php
		$conn = mysqli_connect($_ENV["DB_HOST"], $_ENV["DB_USER"], $_ENV["DB_PWD"], $_ENV["DB_NAME"]);

		if(!$conn) {
			die('Could not connect: ' . mysqli_connect_error());
		}

		$page_size = 5;
		$page_param = is_null($_GET["page"]) ? 1 : $_GET["page"];
		$selected_page = is_numeric($page_param) ? $page_param : 1;

		$sql = 'SELECT id, title, created_at FROM posts ORDER BY id DESC';
		$result = mysqli_query($conn, $sql);
		$total_results = mysqli_num_rows($result);
		$posts = [];

		if ($total_results > 0) {
			// store row data from request
			while($row = mysqli_fetch_assoc($result)) {
				// echo '<a href="blog/post/'.$row['id'].'">'.$row['title'].'</a><br/>';
				array_push($posts, $row);
			}

			// render current page (not optimized since we always fetch all results)
			$start_index = ($selected_page - 1) * $page_size;
			$page_rows = array_slice($posts, $start_index, $page_size);

			foreach ($page_rows as $page_row) {
			  echo '<a href="blog/post/'.$page_row['id'].'">'.$page_row['title'].'</a><br/>';
			}

			// generate pagination links
			$num_pages = ceil($total_results / $page_size);
			echo '<nav>';
			for ($i = 1; $i <= $num_pages; $i++) {
				echo '<a href="/blog?page='.$i.'">'.$i.'</a>';
			}
			echo '</nav>';
		}

		mysqli_close($conn);
  ?>
</html>