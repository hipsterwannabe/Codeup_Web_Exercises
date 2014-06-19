<?php
	//initialize file location
	$new_address = [];
	$address_book = [];

	require_once('classes/address_data_store.php');

	$ads = new AddressDataStore("data/adr_bk.csv");

	//$ads->filename = 'data/adr_bk.csv'; (obsolete due to constructor)
	$address_book = $ads->read_csv();
	

	

	//checking if required fields are entered; if so, add to address book, if not, display error msg
	if(!empty($_POST['name']) && !empty($_POST['streetAddress']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['zipCode'])) {
		foreach ($_POST as $key => $value) {
			$new_address[] = $value;
		} 
		array_push($address_book, $new_address);
		$ads->write_csv($address_book);
	} else {
		foreach ($_POST as $key => $value) {
			if (empty($value)) {
				echo ucfirst($key) . " is empty, please enter.\n" ;
			}
		}
	}
	
	//removing item if link is clicked
	if (isset($_GET['id'])) {
            unset($address_book[$_GET['id']]);
            $ads->write_csv($address_book);
            
    }

   
    // Verify there were uploaded files and no errors
	if (count($_FILES) > 0 && $_FILES['file1']['error'] == 0) {

	    if ($_FILES['file1']["type"] != "text/csv") {
	        echo "ERROR: file must be in text/csv!";
	    } else {
	        // Set the destination directory for uploads
	        // Grab the filename from the uploaded file by using basename
	        $upload_dir = '/vagrant/sites/codeup.dev/public/uploads/';
	        $uploadFilename = basename($_FILES['file1']['name']);
	        // Create the saved filename using the file's original name and our upload directory
	        $saved_filename = $upload_dir . $uploadFilename;
	        // Move the file from the temp location to our uploads directory
	        move_uploaded_file($_FILES['file1']['tmp_name'], $saved_filename);

	        // load the new todos
	        // merge with existing list
	        $ups = new AddressDataStore($saved_filename);
	        $addresses_uploaded = $ups->read_csv();
	        $address_book = array_merge($address_book, $addresses_uploaded);
	        $ads->write_csv($address_book);
	    }
	}
?>
<html>
<title>Address Book</title>
<head>
</head>
<body>
<h1> ADDRESS BOOK </h1>
	<table border =1>
	<tr>
		<th>Name</th>
		<th>Address</th>
		<th>City</th>
		<th>State</th>
		<th>ZIP</th>
		<th>Phone</th>
	</tr>
	<!-- table filled out with data -->
	<? foreach ($address_book as $key => $fields): ?>
		<tr>
		<? foreach($fields as $value): ?>
			<td> <?= htmlspecialchars(strip_tags($value)); ?> </td>
		<?endforeach; ?>
		<td><a href = "?id=<?=$key;?>">Delete Contact</a></td>
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
	<form method="POST" enctype="multipart/form-data" action="/address_book.php">
           <p>
               <label for="file1">File to upload: </label>
               <input type="file" id="file1" name="file1">
           </p>

           <p><input type="submit" value="Upload"></p>

    </form>
</body>
</html>