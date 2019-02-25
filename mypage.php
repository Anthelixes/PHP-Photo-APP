<?php 
ob_start();
include('timesago.php');
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="awj.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="mypage.php">MyAccount</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Soon</a>
      </li>
    </ul>
  </div>
</nav>
	<div class="content">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>
	</div>
	
<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "registration");
  $userid = $_SESSION['username'];
  $result = mysqli_query($db, "SELECT id FROM users WHERE username LIKE '".$userid."%'");
  while ($row = mysqli_fetch_array($result)) {
  		$userid = $row['id'];
    }
  setcookie("currentIDUser", $userid);
  // Initialize message variable
  $msg = "";
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);
  	
  	$sql = "INSERT INTO images (image, image_text, data, userID, likes) 
  		VALUES ('$image', '$image_text', CURRENT_TIMESTAMP(), $userid, 0)";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT DISTINCT * FROM images WHERE userID='$userid' ORDER BY likes DESC, data DESC");
?>
<form method="POST" action="index.php" style="text-align: center; margin: 10px;" enctype="multipart/form-data">
 	<input type="hidden" name="size" value="1000000">
  	<div style="margin-bottom: 5px;">
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="Say something about this image..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload" class="btn btn-light">POST</button>
  	</div>
</form>
<?php
echo '<div class="container">
		<table class="table">
    		<tbody>';
while ($row = mysqli_fetch_array($result)) {
    echo "<tr id='containerImg'><td>";
	    echo "<img style='max-width: 600px; max-height: auto;' src='images/".$row['image']."' ></td>";
	    $imagesid = $row['imageID'];

		echo '<td id="containerCont">'.$row['image_text'];
		//<!-------INCEPUT PARTEA DE POSTAT ACUM X MIN -------->
		$timemsg = timeAgo($row['data']);
		$timemsg = ' '.$timemsg;
		echo '<div style="color: rgba(0, 0, 0, .40); font-size: 12px; font-weight: normal; margin-top: 2px; vertical-align: middle;"> | '.$timemsg.'</div>';
		//<!-------SFARSIT PARTEA DE POSTAT ACUM X MIN -------->
		
		echo '<hr>';
		//<!-------PARTEA DE AFISARE COMENTARII SI LASARE DE COMANTARII------->
		echo '<div id="wrapper"><div class="scrollbar" id="style-1"><div class="force-overflow">';
		$result1 = mysqli_query($db, "SELECT * FROM comments WHERE imageID = '{$imagesid}'");
		while($row = mysqli_fetch_object($result1))
		{
			echo '<span class="border border-light">'.$row->comment.'</span>';
			$timemsg = timeAgo($row->dataComm);
			$timemsg = ' '.$timemsg;
			$result2 = mysqli_query($db, "SELECT * FROM users WHERE id = '{$row->userID}'");
			while($row = mysqli_fetch_object($result2)){
				echo '<div class="comment">de<b> ';
				echo $row->username.'</b><div style="color: rgba(0, 0, 0, .40); font-size: 12px; font-weight: normal; margin-top: 2px; vertical-align: middle;"> | '.$timemsg.'</div></div>';
				echo '<br/>';
			}
		}
		echo '</div></div></div>';
		//<!---------INCEPUT PARTE DE LIKE/DISLIKE------->
		$like1 = mysqli_query($db, "SELECT COUNT(likeID) AS isLike FROM likes WHERE imageID='$imagesid' AND userID='$userid'");
		while ($row = mysqli_fetch_object($like1)) {
			$likeButt = $row->isLike;
		}
		if ($likeButt == 0){
			echo '<br/><form action="like.php" method="post">
			<input name="numarIMG" type="hidden" value="' .($_POST['numarIMG'] = $imagesid).'">
			<input type="submit" value="LIKE" name="likebutton" class="btn btn-outline-primary btn-sm"/>  ';
			/*if (isset($_POST['likebutton'])) {
				//like
				$like = mysqli_query($db, "SELECT * FROM images WHERE imageID=$imagesid");
				$row = mysqli_fetch_array($like);
				$n = $row['likes'];

				mysqli_query($db, "INSERT INTO likes (userID, imageID) VALUES ($userid, $imagesid)");
				mysqli_query($db, "UPDATE images SET likes=$n+1 WHERE imageID=$imagesid");

				echo $n+1;
				exit();
			}*/
		}
		else if($likeButt == 1){
			//dislike
			echo '<br/><form action="like.php" class="container" method="post">
			<input name="numarIMG" type="hidden" value="' .($_POST['numarIMG'] = $imagesid).'">
			<input type="submit" value="DISLIKE" name="dislikebutton" class="btn btn-outline-danger btn-sm"/>  ';
			//poate face dislike
			/*if (isset($_POST['dislikebutton'])) {
				$like = mysqli_query($db, "SELECT * FROM images WHERE imageID=$imagesid");
				$row = mysqli_fetch_array($like);
				$n = $row['likes'];

				mysqli_query($db, "DELETE FROM likes WHERE imageID=$imagesid AND userID=$userid");
				mysqli_query($db, "UPDATE images SET likes=$n-1 WHERE imageID=$imagesid");
				
				echo $n-1;
				exit();
			}*/
		}

		$result1 = mysqli_query($db, "SELECT * FROM images WHERE imageID = '$imagesid'");
		while($row = mysqli_fetch_object($result1))
		{
			echo '<span class="border border-light"><b>'.$row->likes.' aprecieri</b></span></form>';
		}
		//<!---------SFARSIT PARTE DE LIKE/DISLIKE------->
		echo '
		<form action="insertcomment.php" method="post" style="margin-top: 10px;">
			<input name="numarIMG" type="hidden" value="' .($_POST['numarIMG'] = $imagesid).'">
			<table><tr><th>
			<textarea id="text" cols="40" rows="1" name="imgComment" placeholder="Scrie un comentariu..."></textarea></th>
		    <th><input type="submit" style="margin-top:10px;" class="btn btn-light btn-sm"/></th></tr></table>
		</form>';

		//<!---------INCEPUT PARTE DE STERGERE POZA----->
		$like1 = mysqli_query($db, "SELECT COUNT(userID) AS isDel FROM images WHERE imageID='$imagesid' AND userID='$userid'");
		while ($row = mysqli_fetch_object($like1)) {
			$delButt = $row->isDel;
		}
		if($delButt == 1){
			echo '<br/><form action="delete.php" class="container" method="post">
			<input name="numarIMG" type="hidden" value="' .($_POST['numarIMG'] = $imagesid).'">
			<input type="submit" value="X" class="btn btn-danger btn-sm" name="deleteImg">
			</form>';
			/*
			if (isset($_POST['deleteImg'])) {
					//sterge si like-uri si comm-uri
					$like = mysqli_query($db, "SELECT * FROM images WHERE imageID=$imagesid");
					$row = mysqli_fetch_array($like);
					$n = $row['likes'];

					mysqli_query($db, "DELETE FROM likes WHERE imageID = '$_POST[numarIMG]'");
					mysqli_query($db, "DELETE FROM comments WHERE imageID = '$_POST[numarIMG]'");
					mysqli_query($db, "DELETE FROM images WHERE imageID = '$_POST[numarIMG]'");
					exit();
			}*/
		}
		//<!---------SFARSIT PARTE DE STERGERE POZA----->

		echo '</td></tr>';
		//<!---------SFARSIT PARTE DE COMENTARIU----->
	echo "";
    }
echo "</tbody></table></div>";
?>
</body>
</html>