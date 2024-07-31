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
				<form style="background-color:#27c0e7;padding: 2% 8%;border-radius:5%;" >
				<input type="hidden" name="q" value="ip1" />
				<div class="mb-3 mt-3">
				<label for="ipaddress" class="form-label">IP Address:</label>
				<table class="table table-bordered table-hover" >
				<?php
					$sql = "SELECT * FROM systemips ORDER BY IPADDRESS";
					$result = $conn->query($sql);
					
					while($row = $result->fetch_assoc())
					{
						$ip=$row["IPADDRESS"];
						$sysname=$row["SYSTEMNAME"];
						echo "<tr>";
						echo "<td>";
						echo "<a href='http://$ip/SIH1408/demo.php' target='_blank'>";
						echo "$sysname-$ip";
						echo "</a>";
						echo "</td>";
						echo "</tr>";
					}
				?>
				</table>
				</div>
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