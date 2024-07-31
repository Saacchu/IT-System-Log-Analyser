<!DOCTYPE html>
<html lang="en">
<?php
	include "headtag.php";
?>
<script>
	setTimeout(function(){
		window.location.reload(1);
	},3000);
</script>
<body>
<hr/>

<?php
	include "connect.php";
?>

<div class="container">
	<div class="row">
		<div class="col-sm-9">
			<?php
				$output = shell_exec('python hist.py');
				echo $output;
			?>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>

</body>
</html>