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
?>
		<?php include "header.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form action="addIPAddressSubmit.php" method="post" style="background-color:#27c0e7;padding: 8% 8%;border-radius:5%;" >
				<input type="hidden" name="q" value="ip1" />
				<div class="mb-3 mt-3">
				<label for="ipaddress" class="form-label">IP Address:</label>
				<input type="text" class="form-control" id="ipaddress" placeholder="Enter IP Address" name="ipaddress" required />
				</div>
				
				<div class="mb-3">
				<label for="sysname" class="form-label">System Name:</label>
				<input type="text" class="form-control" id="pwd" placeholder="Enter System Name" name="sysname" required />
				</div>
				
				<div class="mb-3">
				<label for="address" class="form-label">Address:</label>
				<textarea name="address" rows="5" cols="42" required ></textarea>
				</div>
				
				<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>

<?php
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