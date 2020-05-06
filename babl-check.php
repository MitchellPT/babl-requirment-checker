<?php
	
	$status = true;
	
	if (version_compare(phpversion(), '7.2', '<') || version_compare(phpversion(), '7.2.999', '>')) {
		$php_status = 'Your PHP version is not supported';
		$status = false;
	} else {
		$php_status = "Your PHP Version is compatable";
	}
	
	
	if (!extension_loaded('openssl')) {
		$status = false;
		$openssl_status = "&#10060;";
	} else {
		$openssl_status = "&#9989;";
	}
	if (!extension_loaded('mbstring')) { 
		$status = false;
		$mbstring_status = "&#10060;";
	} else {
		$mbstring_status = "&#9989;";
	}
	if (!extension_loaded('tokenizer')) { 
		$status = false;
		$tokenizer_status = "&#10060;";
	} else {
		$tokenizer_status = "&#9989;";
	}
	if (!extension_loaded('xml')) { 
		$status = false;
		$xml_status = "&#10060;";
	} else {
		$xml_status = "&#9989;";
	}
	if (!extension_loaded('ctype')) { 
		$status = false;
		$ctype_status = "&#10060;";
	} else {
		$ctype_status = "&#9989;";
	}
	if (!extension_loaded('json')) { 
		$status = false;
		$json_status = "&#10060;";
	} else {
		$json_status = "&#9989;";
	}
	if (!extension_loaded('bcmath')) { 
		$status = false;
		$bcmath_status = "&#10060;";
	} else {
		$bcmath_status = "&#9989;";
	}
	if (!extension_loaded('zip')) { 
		$status = false;
		$zip_status = "&#10060;";
	} else {
		$zip_status = "&#9989;";
	}
	if (!extension_loaded('PDO')) { 
		$status = false;
		$PDO_status = "&#10060;";
	} else {
		$PDO_status = "&#9989;";
	}
	if (!extension_loaded('gmp')) { 
		$status = false;
		$gmp_status = "&#10060;";
	} else {
		$gmp_status = "&#9989;";
	}
	if (!extension_loaded('bz2')) { 
		$status = false;
		$bz2_status = "&#10060;";
	} else {
		$bz2_status = "&#9989;";
	}
	if( ini_get('allow_url_fopen') ) {
		$fopen_status = "&#9989;";
	} else {
		$status = false;
		$fopen_status = "&#10060;";
	}
	if ($status == true) {
		$babl_status = "<span style=\"font-weight:bold;font-size: 1.2em;color: green;\">Babl is compatable!</span>";
	} else {
		$babl_status = "<span style=\"font-weight:bold;color: red;\">Babl is not supported on your configuration</span>";
	}
?>
<html>
	<head>
		<title>Compatability</title>
	</head>
	<body>
		<?php echo $babl_status; ?>
		<br>
		<br>
		PHP: <?php echo $php_status; ?>
		<br>
		OpenSSL: <?php echo $openssl_status; ?>
		<br>
		Tokenizer: <?php echo $tokenizer_status; ?>
		<br>
		XML: <?php echo $xml_status; ?>
		<br>
		Ctype: <?php echo $ctype_status; ?>
		<br>
		JSON: <?php echo $json_status; ?>
		<br>
		BCMath: <?php echo $bcmath_status; ?>
		<br>
		ZIP: <?php echo $zip_status; ?>
		<br>
		PDO: <?php echo $PDO_status; ?>
		<br>
		GMP: <?php echo $gmp_status; ?>
		<br>
		Mbstring: <?php echo $mbstring_status; ?>
		<br>
		Bzip2: <?php echo $bz2_status; ?>
		<br>
		allow_url_fopen: <?php echo $fopen_status; ?>
		<br>
		<br>
		Most are the settings can be changed via your WebHosting providers panel
		
		
	</body>
	<style>
		body {background-color: #36393f;text-align: center;color:grey;}
	</style>


</html>
<?php
//You can enable if you want to see all your extentions
//print_r(get_loaded_extensions());
?>



