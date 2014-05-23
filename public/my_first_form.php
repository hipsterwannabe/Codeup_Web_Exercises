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
<h2>User Login</h2>
<form method="POST">
    <p>
        <label for="username">Username</label>
        <input id="username" name="username" type="text" placeholder='Username'>
    </p>
    <p>
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder='Password'>
    </p>
    <p>
        <button type="submit">Login</button>
    </p>
</form>
<h2>Compose An Email</h2>
<form method='POST'>
    <p>
        <label for="toadress">Recipient Email Address</label>
        <input id="toaddress" name="toaddress" type="email" placeholder='Email Address'
    </p>
    <p>
        <label for="fromaddress">Your Email Address</label>
        <input id="fromaddress" name="fromaddress" type="email" placeholder='Your Email'>
    </p>
    <p>
        <label for="subject">Subject</label>
        <input id="subject" name="subject" type="text" placeholder='Subject'>
    </p>
    <p>
        <label for="body">Type your message below</label>
    </p>
    <p>
        <textarea name="email_body" rows='5' cols='100' placeholder='Message Here'></textarea>
    </p>
    <p>
        <button type='send'>SEND</button>
    </p>
</form>
</body>
</html>