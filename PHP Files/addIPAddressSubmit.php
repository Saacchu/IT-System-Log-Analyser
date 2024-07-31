<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
	include "headtag.php";
?>
<body>

<?php
	include "connect.php";
?>

<?php
	if(isset($_SESSION["username"]))
	{
		$q=$_POST["q"];
		if($q=="ip1")
		{
			$conn->autocommit(false);
			
			$ipaddress=$_POST["ipaddress"];
			$sysname=$_POST["sysname"];
			$address=$_POST["address"];
			
			
			$sql="INSERT INTO systemips (IPADDRESS, SYSTEMNAME, ADDRESS) VALUES (?, ?, ?)";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("sss", $ipaddress, $sysname, $address);
			
			if($stmt->execute())
			{
				$conn->commit();
				echo "<script>alert('IP Address Registered Successfully');window.location.href='home.php'; </script>";
			}
			else
			{
				$conn->rollback();
				echo "<script>alert('Registration Failed');window.location.href='home.php'; </script>";
			}
		}

		
		
	}
	else
	{
		echo "<center>";
		echo "<h1>Session Expired......!</h1>";
		echo "<h3><a href='Login.php'>Click Here</a> to Login</h3>";
		echo "</center>";
	}
?>
</body>
</html>