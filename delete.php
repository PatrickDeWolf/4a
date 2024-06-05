<?php
session_start();

if(!isset($_SESSION['ingelogd'])){
    $backTo="index.php";
    header('Location: '.$backTo);
 }
//////////////////////////////////
if(isset($_POST['del']) ){

	include_once('db.php');
	$email = mysqli_real_escape_string($con,$_SESSION['user']);

    $sql = "DELETE FROM login WHERE email='$email'";

    if ($con->query($sql) === TRUE) {
    session_destroy();
    $backTo="index.php";
    header('Location: '.$backTo);
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo"<br> Probeer opnieuw!";
    }
}
/////////////////////////////////////
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<title>LOGIN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<br><br><br><br>
<div class="container">
	<a href='index.php'> HOME </a>
	<div class="panel panel-primary">
		<div class="panel-heading">Account verwijderen:</div>
		<div class="panel-body">
			<br>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			
				<div class="form-group">
				<label for="code">Verwijderen:</label>
                <input type='hidden' name='del' val='del'>
				</div>
				<button type="submit" class="btn btn-primary">account definitief verwijderen</button>
			</form>
			<br>
		</div>
	</div>
	
	

</div>

</body>
</html>

