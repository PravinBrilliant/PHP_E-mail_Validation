<?php $conn=mysqli_connect("localhost","root","","validation"); 
if(isset($_POST['submit'])){
	$email=$_POST['email'];

	$dup=mysqli_query($conn,"Select * from user where email='$email' limit 1");

	if(mysqli_num_rows($dup)>0)
	{
		echo '<script>alert("Email already registered...");window.location.href="index.php";</script>';
	}else{
	$insert="Insert into user values(null,'$email')";
	if(mysqli_query($conn,$insert))
	{
		echo'<script>alert("Registered Succesfully")</script>';
	}
	else{
		echo'<script>alert("Registered Failed")</script>';
	}}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>validation</title>
</head>
<body><form method="Post">
	
	<!-- <label>Name:<br>
		<input type="text" name="name" required><br><br>
	</label> -->
	<label>E-mail:<br>
		<input type="email" name="email" required><br><br>
	</label>
	<!-- <label>Mobile:<br> -->
		<!-- <input type="tel" name="mobile"  pattern="[6789][0-9]{9}"> </label> -->
		<input type="submit" name="submit">
</form>

</body>
</html>
