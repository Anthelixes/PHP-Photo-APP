<?php
session_start(); 
$db = mysqli_connect('localhost', 'root', '', 'registration');
if(isset($_COOKIE["currentIDUser"])){
	$contCurent = $_COOKIE["currentIDUser"];}

if (!$db){
  die('Could not connect: ' . mysql_error());
}

mysqli_select_db($db, "comments");
$imgComment = $_POST['imgComment'];
if ($imgComment == NULL)
	echo 'Nu puteti trimite camp gol.';
else{
	$sql="INSERT INTO comments (imageID, comment, userID) VALUES ('$_POST[numarIMG]','$_POST[imgComment]',$contCurent)";
	if (!mysqli_query($db, $sql)){
	  die('Error: ' . mysqli_error($db));
	}
	echo 'Inserare adaugata cu succes!';
}
mysqli_close($db)
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inserare comentariu</title>
	<meta http-equiv="refresh" content="0;url=index.php" />
	<link rel="stylesheet" type="text/css" href="awj.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<!--<p style="text-align: center;"><a class="btn btn-info" href="index.php">Go Home</a></p>-->
</body>
</html>