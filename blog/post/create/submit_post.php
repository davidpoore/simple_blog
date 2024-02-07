<?php
	require_once __DIR__.'/../../../vendor/autoload.php';

	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../../../');
	$dotenv->load();
	
	$conn = mysqli_connect($_ENV["DB_HOST"], $_ENV["DB_USER"], $_ENV["DB_PWD"], $_ENV["DB_NAME"]);
	
	$title = addslashes($_REQUEST["title"]);
	$body = addslashes($_REQUEST["body"]);
	
	$sql = "INSERT INTO posts (title, body, created_at) VALUES('$title', '$body', NOW())";
	echo $sql;
	
	$success = false;
	if(mysqli_query($conn, $sql)){
		header('Location: /blog/post/create?success=true');
		exit();
	} else{
		header('Location: /blog/post/create?success=false');
		exit();
	}
	 
	// Close connection
	mysqli_close($conn);
?>