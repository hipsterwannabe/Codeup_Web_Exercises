<?php
	//initialize address book
	$address_book=[
			['Greg Vallejo', '4527 Pinehurst Mesa', 'San Antonio', 'TX', '78247', '210-288-6520'],
			['Codeup', '112 E. Pecan St', 'San Antonio', 'TX', '78205'],
			['The White House', '1600 Pennsylvania Avenue NW', 'Washington', 'DC', '20500'],
		    ['Marvel Comics', 'P.O. Box 1527', 'Long Island City', 'NY', '11101'],
		    ['LucasArts', 'P.O. Box 29901', 'San Francisco', 'CA', '94129-0901']
		];
	//initialize file location
	$new_address = [];
	$filename = "data/adr_bk.csv";
	//writing csv file
	function write_csv($bigArray, $filename) {
		if (is_writeable($filename)) {
			$handle = fopen($filename, 'w');
			foreach ($bigArray as $fields) {
				fputcsv($handle, $fields);
			}
			fclose($handle);
		}
	}
	//checking if required fields are entered; if not, display error msg
	if(!empty($_POST['name']) && !empty($_POST['streetAddress']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['zipCode'])) {
		foreach ($_POST as $key => $value) {
			$new_address[] = $value;
		} 
	} else {
		foreach ($_POST as $key => $value) {
			if (empty($value)) {
				echo $key . " is empty, please enter.\n" ;
			}
		}
	}
	array_push($address_book, $new_address);
	write_csv($address_book, $filename);
		
	
?>
<html>
<title>Address Book</title>
<head>
</head>
<body>
<h1> ADDRESS BOOK </h1>
	<table>
	<tr>
		<th>Name</th>
		<th>Address</th>
		<th>City</th>
		<th>State</th>
		<th>ZIP</th>
		<th>Phone</th>
	</tr>
	<!-- table filled out with data -->
	<? foreach ($address_book as $fields): ?>
		<tr>
		<? foreach($fields as $value): ?>
			<td> <?= htmlspecialchars(strip_tags($value)); ?> </td>
		<?endforeach; ?>
		</tr>
	<?endforeach; ?>
		

	</tr>
	</table>
	<h2>Please enter your address (Fields with * are required.)</h2>
 	<!-- user inputs address information -->
	<form method='POST' action='address_book.php'>
		<label for 'name'>Name*</label>
		<input id='name' name='name' type='text' placeholder='Enter Name'>
	
	<br>
		<label for 'streetAddress'>Address*</label>
		<input id='streetAddress' name='streetAddress' type='text' placeholder='Street Address'>
	<br>
		<label for 'city'>City*</label>
		<input id='city' name='city' type ='text' placeholder='City'>
	<br>
		<label for 'state'>State*</label>
		<input id='state' name='state' type='text' placeholder='State'>
	<br>
		<label for 'zipCode'>ZIP Code*</label>
		<input id='zipCode' name='zipCode' type='text' placeholder='ZIP Code'>
	<br>
		<label for 'phone'>Phone</label>
		<input id='phone' name='phone' type='text' placeholder='Phone'>
	<br>
	<input type='SUBMIT'></input>
	</form>	
</body>
</html>