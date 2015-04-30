<?php
	//error_reporting(0);
	set_include_path("../include:".get_include_path());
	require_once("PLUSPEOPLE/autoload.php");
	$pesa = new PLUSPEOPLE\PesaPI\PesaPi();

	if(isset($_POST['reciept'])){
		$transactions = $pesa->locateByReceipt($_POST['reciept']);
		if(count($transactions) > 0){
		?>
		<html>
		<head></head>
		<body>
		Payment recieved - Congrutulations
		</body>
		</html>
<?php  }else{ ?>
		
		<html>
		<head></head>
		<body>
			Sorry we dont yet recieved a payment with this code please enter the code	
			<form method="POST" action="buy.php">
			<input type="text" name="reciept" value=""><br>
		    <input type="submit" name="ok" value="Send Receipt"><br>
			</form>			
		</body>
		</html>

<?php }
}else{ ?>

		<html>
		<head></head>
		<body>
			You are ready to Pay -the price is 50KES<br>
			Send the money via Mpesa to 0723401197<br>
			<form method="POST" action="buy.php">
			<input type="text" name="reciept" value=""><br>
		    <input type="submit" name="ok" value="Send Receipt"><br>
			</form>
		</body>
		</html>
		
		
<?php } ?>


