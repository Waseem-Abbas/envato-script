<?php 
/**
* EnvatoAPI class
*/
class EnvatoAPI
{
	
	private $api_url = 'https://api.envato.com/v1/market/private/user/download-purchase:';
	private $pcode;
	private $token_code = 'ENTER PERSONAL TOKEN HERE';

	public function set_purchase_code($pcode)
	{

		$this->pcode = $pcode;

	}

	public function request()
	{

		$this->api_url .= $this->pcode . '.json';

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $this->token_code));
		curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

		$result = curl_exec($ch);
		curl_close($ch);

		return json_decode($result, true);

	}

}