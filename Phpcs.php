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
	//Gets the total confirmed balance across all accounts and addresses
		
		$data = array(
			"apiKey" => $this->apikey
		);

		$url = "/auth/getallaccountsconfirmedbalance";

		return $this->process($url,$data);		
	}


    public function getaccountconfirmedbalance() {
    //Gets the confirmed balance on an account/ wallet.
        
        $data = array(
            "apiKey" => $this->apikey,
			"walletID" => $this->wid
        );

        $url = "/auth/getaccountconfirmedbalance";

        return $this->process($url,$data);      
    }


    public function getaccounts() {
    //Gets all users accounts/ wallet details.
        
        $data = array(
            "apiKey" => $this->apikey
        );

        $url = "/auth/getaccounts";

        return $this->process($url,$data);      
    }

    public function getallaccountsunconfirmedbalance() {
    //Gets the total unconfirmed balance across all accounts and addresses
        
        $data = array(
            "apiKey" => $this->apikey
        );

        $url = "/auth/getallaccountsunconfirmedbalance";

        return $this->process($url,$data);      
    }

    public function getaccountaddresses() {
    //Gets the Bitcoin address based on account/ wallet name.
        
        $data = array(
            "apiKey" => $this->apikey,
			"walletID" => $this->wid
        );

        $url = "/auth/getaccountaddresses";

        return $this->process($url,$data);      
    }

    public function getaddressunconfirmedbalance($address) {
    //Gets the total unconfirmed balance on a user addresses.
        
        $data = array(
            "apiKey" => $this->apikey,
			"address" => address
        );

        $url = "/auth/getaddressunconfirmedbalance";

        return $this->process($url,$data);      
    }

    public function getaccountunconfirmedbalance() {
    //Gets the unconfirmed balance on an account/ wallet.
        
        $data = array(
            "apiKey" => $this->apikey,
			"walletID" => $this->wid
        );

        $url = "/auth/getaccountunconfirmedbalance";

        return $this->process($url,$data);      
    }

    public function getaddressconfirmedbalance($address) {
    //Gets the total confirmed balance on a user addresses
        
        $data = array(
            "apiKey" => $this->apikey,
			"address" => address
        );

        $url = "/auth/getaddressconfirmedbalance";

        return $this->process($url,$data);      
    }

    public function getunverifiedaccountwithdraws() {
    //Gets a list of unverified Withdrawals for a Wallet.
        
        $data = array(
            "apiKey" => $this->apikey
        );

        $url = "/auth/getunverifiedaccountwithdraws";

        return $this->process($url,$data);      
    }

}

?>

