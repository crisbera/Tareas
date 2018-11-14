<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Framework Básico 
	<?php if (isset($this->titulo)) {
		echo ": ".$this->titulo;
	}?>
	</title>

	<link rel="stylesheet" href="<?php echo $_layoutParams["ruta_css"]; ?>bootstrap.min.css">
	<script src="<?php echo $_layoutParams["ruta_js"]; ?>jquery-3.3.1.min.js"></script>
	<script src="<?php echo $_layoutParams["ruta_js"]; ?>bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
	
	<?php
	if ($this->_msg->hasMessages()) {
		echo $this->_msg->display();
	}
	?>