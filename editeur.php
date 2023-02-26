<!DOCTYPE html>
<html>
<head>
	<?php include 'headers.html'; ?>
</head>
<body>

	<?php include'navbar.html';?>

	<?php 

	if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"] );
	}

	?>
	<center>
	<form method="post" action="editeur_action.php" style="padding-top: 100px;">
		<h1>Choose the size of your maze</h1>

		<select name="size" id="size-select" style="margin-right : 20px;font-size: 150%;">
            <option value="6">6</option>
            <option value="8">8</option>
            <option value="10">10</option>
            <option value="12">12</option>
            <option value="14">14</option>
            <option value="17">17</option>
		</select>

	<input type="submit" value="Submit" class="button" style="background: transparent;font-size:200%;">
	</form>
	</center>
</body>
</html>