<?php
session_start(); 
$db = mysqli_connect('localhost', 'root', '', 'registration');
if(isset($_COOKIE["currentIDUser"])){
	$contCurent = $_COOKIE["currentIDUser"];}

if (!$db){
  die('Could not connect: ' . mysql_error());
}

$imagesid = $_POST['numarIMG'];

if (isset($_POST['likebutton'])) {
	//like
	$like = mysqli_query($db, "SELECT * FROM images WHERE imageID=$imagesid");
	$row = mysqli_fetch_array($like);
	$n = $row['likes'];

	mysqli_query($db, "INSERT INTO likes (userID, imageID) VALUES ($contCurent, $imagesid)");
	//echo "Img pt care da like: ".$imagesid;
	mysqli_query($db, "UPDATE images SET likes=$n+1 WHERE imageID=$imagesid");
}
if (isset($_POST['dislikebutton'])) {
	$like = mysqli_query($db, "SELECT * FROM images WHERE imageID=$imagesid");
	$row = mysqli_fetch_array($like);
	$n = $row['likes'];

	mysqli_query($db, "DELETE FROM likes WHERE imageID=$imagesid AND userID=$contCurent");
	//echo "Img pt care da dislike: ".$imagesid;
	mysqli_query($db, "UPDATE images SET likes=$n-1 WHERE imageID=$imagesid");
}

mysqli_close($db)
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="refresh" content="0;url=index.php" />
	<link rel="stylesheet" type="text/css" href="awj.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<p style="text-align: center;"><a class="btn btn-info" href="index.php">Go Home</a></p>
</body>
</html>