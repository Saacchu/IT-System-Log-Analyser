<?php
	session_start();
?>
<?php
	include "connect.php";
?>
<?php
	
	$uname=$_POST["username"];
	$pass=$_POST["passcode"];
	
	
	$sql = "SELECT * FROM admin";
	$result = $conn->query($sql);
	
	while($row = $result->fetch_assoc())
	{
		if($uname==$row["USERNAME"] && $pass==$row["PASSWORD"])
		{
			$status=1;
			$_SESSION["username"]=$uname;
			break;
		}
	}
	if($status==1)
	{
		date_default_timezone_set("asia/kolkata");
		$last=date("d-m-Y h:i:sa");

		$sql = "UPDATE admin SET LASTLOGIN=? WHERE USERNAME=?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ss", $last, $uname);
		$stmt->execute();
		header("Location: home.php");
	}
	else
	{
		echo "<script type='text/javascript'>alert('Invalid Username/Passcode');</script>";
	}

$conn->close();

?>