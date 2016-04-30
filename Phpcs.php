<?php

class PhpcsError extends Exception {}

class Phpcs {

	private $apikey;
	private $wid;

	function __construct($api,$wid) {
		$this->apikey = $api;
		$this->wid = $wid;

	}

	public function process($url,$data) {
		
		$curl = curl_init("https://api.coinsecure.in/v0".$url);
		curl_setopt_array($curl, array(
			CURLOPT_POST => TRUE,
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_HTTPHEADER => array(
				'Content-Type: text/json'
			),
			CURLOPT_POSTFIELDS => json_encode($data)
		));

		$response = curl_exec($curl);

		$resdata = json_decode($response, True);

		if(array_key_exists('error',$resdata)) {
			throw new PhpcsError($resdata["error"]);

		}

		return $resdata;
	}


	public function getallaccountsconfirmedbalance() {
		
		$data = array(
			"apiKey" => $this->apikey
		);

		$url = "/auth/getallaccountsconfirmedbalance";

		return $this->process($url,$data);		
	}

}

?>

