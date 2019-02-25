<?php
$db = mysqli_connect('localhost', 'root', '', 'registration');
//total users
$sql="SELECT COUNT(ID) as total FROM users";
mysqli_select_db($db, 'registration');
$retval = mysqli_query( $db, $sql );
while ($row = mysqli_fetch_assoc($retval)) {
	$userTotal = $row['total'];
}
//total aprecieri
$sql="SELECT COUNT(likeID) as total FROM likes";
mysqli_select_db($db, 'registration');
$retval = mysqli_query( $db, $sql );
while ($row = mysqli_fetch_assoc($retval)) {
	$likeTotal = $row['total'];
}
//total comentarii
$sql="SELECT COUNT(commentID) as total FROM comments";
mysqli_select_db($db, 'registration');
$retval = mysqli_query( $db, $sql );
while ($row = mysqli_fetch_assoc($retval)) {
	$commTotal = $row['total'];
}
//total imagini
$sql="SELECT COUNT(imageID) as total FROM images";
mysqli_select_db($db, 'registration');
$retval = mysqli_query( $db, $sql );
while ($row = mysqli_fetch_assoc($retval)) {
	$imgTotal = $row['total'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="row">
		<div class="col-lg-3 col-md-9" style="margin-top: 20px">
            <div class="card border-primary">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-3">
                            <i class="far fa-thumbs-up fa-4x"></i>
                        </div>
                        <div class="col-9 text-right">
                            <h1><?php echo $likeTotal; ?></h1>
                            <h4> Aprecieri</h4>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-lg-3 col-md-6" style="margin-top: 20px">
            <div class="card border-secondary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <i class="fas fa-user fa-4x"></i>
                        </div>
                        <div class="col-9 text-right">
                            <h1><?php echo $userTotal; ?></h1>
                            <h4> Utilizatori</h4>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-lg-3 col-md-6" style="margin-top: 20px">
            <div class="card border-success">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <i class="far fa-comment fa-4x"></i>
                        </div>
                        <div class="col-9 text-right">
                            <h1><?php echo $commTotal; ?></h1>
                            <h4>  Comentarii</h4>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-lg-3 col-md-6" style="margin-top: 20px">
            <div class="card border-danger">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-3">
                            <i class="fas fa-images fa-4x"></i>
                        </div>
                        <div class="col-9 text-right">
                            <h1><?php echo $imgTotal; ?></h1>
                            <h4>  Imagini</h4>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
</div>
</div>
</body>
</html>