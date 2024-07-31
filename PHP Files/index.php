<?php
	session_start();
?>
<?php
	include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Login page</title>
	<link rel="icon" type="image/png" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="css/login.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <img src="images/logo.png" class="logo" width="100" height="100">
    <div class="title"><h1>केन्द्रीय रिजर्व पुलिस बल</h1> </div>
    <div class="heading"><h1>Central Reserve Police Force</h1> </div>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="New user">
				<form action="logged.php" method="post">
					<label for="chk" aria-hidden="true">Admin</label>
					<input type="text" name="username" placeholder="Username" required />
					<input type="password" name="passcode" placeholder="Passcode" required />
					<button>login</button>
				</form>
			</div>
	</div>
</body>
</html>