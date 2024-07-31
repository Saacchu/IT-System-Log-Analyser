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
			<div class="col-sm-12">
				<div class="mt-4 p-5 bg-primary text-white rounded">
					<h1>IT System log analyzer</h1> 
					<p>CRPF units/offices and personnel are deployed in different location of CRPF. There is no centralised system to analyse the log of IT system by the experts to access threats and breaches. Proposed Solution: Centralized system should be developed for analysing the systems deployed at the different location of the country Expert per problems statement.</p> 
				</div>

			</div>
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