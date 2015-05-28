<?php 

require 'classes/envato.api.class.php';

if (isset($_POST['submit'])) {
	
	extract($_POST);

	if (!empty($pcode)) {
		
		$API = new EnvatoAPI();
		$API->set_purchase_code($pcode);
		$result = $API->request();

	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Envato Script</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<h1>Download Your Items</h1>
<form method="post" action="">
	<p>Purchase Code</p>
	<input type="text" name="pcode"/>
	<input type="submit" name="submit"/>
</form>

<?php if (!empty($result['download-purchase'])): ?>
	
	<p><a href="<?php echo $result['download-purchase']['download_url']; ?>">Click Here</a> to download your item.</p>

<?php endif ?>
</body>
</html>