```
<?php
	require('Phpcs.php');

	$cs = new Phpcs("Api Key","Wallet id");
	print_r($cs->getallaccountsconfirmedbalance());
?>
```
