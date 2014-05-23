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
        Would you like to save this message to your Sent folder?
        <label for='save_to_folder'>
        <input type='checkbox' id='save_to_folder' name='save_to_folder' value='yes'>
        </label>
    </p>
    <p>
        <button type="send">SEND</button>
    </p>
</form>
<form>
    <h2>Multiple Choice Test</h2>
    <p>What basketball team will win the NBA Championship?</p>
    <label for "q1a">
        <input type='radio' id='q1a' name='q1' value='heat'>Miami Heat
    </label>
    <label>
        <input type='radio' id='q1b' name='q1' value='pacers'>Indiana Pacers
    </label>
    <label>
        <input type='radio' id='q1c' name='q1' value='thunder'>Oklahoma City Thunder
    </label>
    <label>
        <input type='radio' id='q1d' name='q1' value='spurs'>SAN ANTONIO SPURS
    </label>
    <p>
    <button type='submit'>SUBMIT</button>
    </p>
</form>
<form>
    <p>Are programmer jokes ever funny?</p>
    <label for "q2a">
        <input type='radio' id='q2a' name='q2' value='No'>No
    </label>
    <label>
        <input type='radio' id='q2b' name='q2' value='Hellno'>Hell No
    </label>
    <label>
        <input type='radio' id='q2c' name='q2' value="seriously">Seriously?
    </label>
    <p>
    <button type='submit'>SUBMIT</button>
    </p>
</form>
<form>
    <p>Where would you like to work after Codeup?</p>
    <label for='city1'><input type='checkbox' id='city1' name='city[]' value='San Antonio'>San Antonio</label>
    <label for='city2'><input type='checkbox' id='city2' name='city[]' value='Austin'>Austin</label>    
    <label for='city3'><input type='checkbox' id='city3' name='city[]' value='Dallas'>Dallas</label>
    <label for='city4'><input type='checkbox' id='city4' name='city[]' value='Houston'>Houston</label>
    <label for='city5'><input type='checkbox' id='city5' name='city[]' value='Wherever There Is Work'>Wherever There Is Work</label>
    </p>
    <p><button type='submit'>VOTE HERE</button></p>
</form>
</body>
</html>