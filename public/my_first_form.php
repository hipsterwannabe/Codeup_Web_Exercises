<!DOCTYPE html>
<html>
<head>
	My First HTML Form
</head>
<body>
	<?php
        var_dump($_GET);
        var_dump($_POST);
	?>

<form method="GET">
    <p>
        <label for="username">Username</label>
        <input id="username" name="username" type="text">
    </p>
    <p>
        <label for="password">Password</label>
        <input id="password" name="password" type="password">
    </p>
    <p>
        <input type="submit">
    </p>
</form>
</body>
</html>