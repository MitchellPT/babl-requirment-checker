<?php
$status = true;
if (version_compare(phpversion(), '7.2', '<') || version_compare(phpversion(), '7.2.999', '>')) {
	$php_status = '<span class="text-danger">Your PHP version is not supported. Please switch to 7.1 or 7.2.<br> (Current Version: '. phpversion() .')</span>';
	$status = false;
} else {
	$php_status = '<span class="text-success">' . phpversion() . '</span>';
}
$extentions = array(
	"OpenSSL" => "openssl",
	"Mbstring" => "mbstring",
	"Tokenizer" => "tokenizer",
	"JSON" => "json",
	"XML" => "xml",
	"Ctype" => "ctype",
	"BCMath" => "bcmath",
	"ZIP" => "zip",
	"PDO" => "PDO",
	"ZIP" => "zip",
	"GMP" => "gmp",
	"Bzip2" => "bz2",
);
if (ini_get('allow_url_fopen')) {
	$fopen_status = '<span class="text-success">Enabled</span>';
} else {
	$status = false;
	$fopen_status = '<span class="text-danger">Disabled</span>';
}
if (function_exists("escapeshellarg")) {
	$escapeshellarg_status = '<span class="text-success">Enabled</span>';
} else {
	$status = false;
	$escapeshellarg_status = '<span class="text-danger">Disabled</span>';
}

?>
<html>

<head>
	<base target="_blank">
	<title>Babl Compatability Checker</title>
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<link href="https://driedsponge.net/resources/bablicon.ico" rel="icon" type="image/icon">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
	<style>
		body {
			background-color: #232221;
			color: white
		}
		.card{
			background-color: #31302F;
		}
		.table-dark{
			background-color: #31302F
		}
	</style>
	<div class="container" style="padding-top:10px">
		<h1>Babl Compatability Checker</h1>
		<h5><a href="https://github.com/MitchellPT/babl-requirment-checker">Github</a> &bull; <a href="https://www.gmodstore.com/market/view/babl-where-a-community-thrives">Babl</a> &bull; <a href="https://docs.rainn.xyz">Babl Docs</a> </h5>
		<hr style="background-color: white">
		<br>
		<div class="table-responsive">
		<table class="table  table-bordered table-dark table-hover" >
			<thead>
				<tr>
					<th scope="col">Name</th>
					<th scope="col">Status</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>PHP Version</td>
					<td><b><?= htmlspecialchars_decode($php_status); ?></b></td>
				</tr>
				<?php
				foreach ($extentions as  $k => $v) {
					if (!extension_loaded($v)) {
						if ($status != false) {
							$status = false;
						}
						$ext_status = '<span class="text-danger">Disabled</span>';
					} else {
						$ext_status = '<span class="text-success">Enabled</span>';
					}
				?>
					<tr>
						<td><?= htmlspecialchars($k); ?></td>
						<td><b><?= htmlspecialchars_decode($ext_status); ?></b></td>
					</tr>

				<?php
				}
				?>
				<tr>
					<td>allow_url_fopen</td>
					<td><b><?php echo $fopen_status; ?></b></td>
				</tr>
				<tr>
					<td>escapeshellarg (PHP Fucntion)</td>
					<td><b><?php echo $escapeshellarg_status; ?></b></td>
				</tr>
			</tbody>
		</table>
		</div>
		<br>
		<?php
		if ($status == true) {
			$babl_status = "<span class='text-success'>Babl is compatable!</span>";
			$msg = "Your webserver should be ready to go for babl! If you are still expieriencing issues, please create a <a href='https://www.gmodstore.com/help/tickets/create/addon/6490'>support ticket</a> on Gmodstore or come ask us in the <a href='https://discord.gg/HfgcZKs'>discord server</a>.";
		} else {
			$babl_status = "<span class='text-danger'>Babl is not supported on your configuration!</span>";
			$msg = "Please address the following issues in the above table.";
		}
		?>
		<div class="card">
			<div class="card-body">
				<h5 class="card-title" style="font-size:1.7em"><?php echo $babl_status; ?></h5>
				<p class="card-text" style="font-size:1.2em"><?php echo $msg; ?></p>
			</div>
		</div>

		<br>
	</div>
</body>
</html>
