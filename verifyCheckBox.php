<input type="checkbox" name="feeling" value="good">Feeling good?

<?php
if( empty($_POST["feeling"]) ) { echo "Checkbox was left unchecked."; }
else { echo "Checkbox was checked."; }
?>

https://www.willmaster.com/library/manage-forms/verifying-checkboxes-are-checked-with-php.php