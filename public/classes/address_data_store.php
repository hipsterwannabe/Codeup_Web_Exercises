<?
class AddressDataStore {

	    public $filename = '';

	    public function __construct($filename)
	    {
	    	$this->filename = $filename;
	    }

	    public function readAddressBook()
	    {
	        $handle = fopen($this->filename, 'r');
			$address_book = [];
			while (!feof($handle)){
				$row = fgetcsv($handle);
				if (is_array($row)) {
					$address_book[] = $row;
				}
			}
			fclose($handle);
			return $address_book;
	    }

	    public function writeAddressBook($addresses_array) 
	    {
	        if (is_writeable($this->filename)) {
				$handle = fopen($this->filename, 'w');
				foreach ($addresses_array as $fields) {
					fputcsv($handle, $fields);
				}
				fclose($handle);
			}
	    }    
	}
?>