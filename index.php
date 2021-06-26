<?php
include('index.html');
// key:epBxPu1PfrXv_FvWGHb54mptKpvRVTvA7ct , secret:SjyumAdabmubbQrxHQjM1
	// var_dump(chkAvailability());
	// getDomains();
	// purchaseDomain('semva1212c.info');
// var_dump(getIP());
	function getIP() {
		$ip = "";

		if (!empty($_SERVER["HTTP_CLIENT_IP"]))
		{
		    // Check for IP address from shared Internet
		    $ip = $_SERVER["HTTP_CLIENT_IP"];
		}
		elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
		{
		    // Check for the proxy user
		    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		}
		else
		{
		    $ip = $_SERVER["REMOTE_ADDR"];
		}
		return $ip;
	}

	function purchaseDomain($domain) {
        $url = 'https://api.godaddy.com/v1/domains/purchase';
        
        $headers = array (
            'Authorization: sso-key '.'epBxPu1PfrXv_FvWGHb54mptKpvRVTvA7ct:SjyumAdabmubbQrxHQjM1',
            'accept: application/json',
            'Content-Type: application/json',
            'X-Shopper-Id: 388790275',
        );
        $fields = array (
                'consent' => array(
                            "agreedAt" => "2019-12-05T18:50:13Z",
                            'agreedBy' => '10.76.25.3',
                            'agreementKeys' => [
                                    'DNRA'
                                ],
                        ),
                'contactAdmin' => array (
                            'addressMailing'  => array(
                                        'address1' => "l'Aigle 6 Sassel Vaud 1534",
                                        'address2' => '',
                                        'city' => 'Chemin',
                                        'country' => 'CH',
                                        'postalCode' => '8090',
                                        'state' => 'Basel',
                                    ),
                            'email'     => 'info@onhost.ch',
                            'fax'       => '',
                            'jobTitle'  => '',
                            'nameFirst'  => 'Yanick',
                            'nameLast'  => 'hausammann',
                            'nameMiddle'  => '',
                            'organization'  => '',
                            'phone'  => '+41.215102444',
                        ),
                'contactBilling' => array (
                            'addressMailing'  => array(
                                        'address1' => "l'Aigle 6 Sassel Vaud 1534",
                                        'address2' => '',
                                        'city' => 'Chemin',
                                        'country' => 'CH',
                                        'postalCode' => '8090',
                                        'state' => 'Basel',
                                    ),
                            'email'     => 'info@onhost.ch',
                            'fax'       => '',
                            'jobTitle'  => '',
                            'nameFirst'  => 'Yanick',
                            'nameLast'  => 'hausammann',
                            'nameMiddle'  => '',
                            'organization'  => '',
                            'phone'  => '+41.215102444',
                        ),
                'contactRegistrant' => array (
                            'addressMailing'  => array(
                                        'address1' => "l'Aigle 6 Sassel Vaud 1534",
                                        'address2' => '',
                                        'city' => 'Chemin',
                                        'country' => 'CH',
                                        'postalCode' => '8090',
                                        'state' => 'Basel',
                                    ),
                            'email'     => 'info@onhost.ch',
                            'fax'       => '',
                            'jobTitle'  => '',
                            'nameFirst'  => 'Yanick',
                            'nameLast'  => 'hausammann',
                            'nameMiddle'  => '',
                            'organization'  => '',
                            'phone'  => '+41.215102444',
                        ),
                'contactTech' => array (
                            'addressMailing'  => array(
                                        'address1' => "l'Aigle 6 Sassel Vaud 1534",
                                        'address2' => '',
                                        'city' => 'Chemin',
                                        'country' => 'CH',
                                        'postalCode' => '8090',
                                        'state' => 'Basel',
                                    ),
                            'email'     => 'info@onhost.ch',
                            'fax'       => '',
                            'jobTitle'  => '',
                            'nameFirst'  => 'Yanick',
                            'nameLast'  => 'hausammann',
                            'nameMiddle'  => '',
                            'organization'  => '',
                            'phone'  => '+41.215102444',
                        ),
                'domain' => $domain,
                'nameServers' => [
                            'ns23.domaincontrol.com',
                            'ns24.domaincontrol.com'
                        ],
                'period' => 1,
                'privacy' => false,
                'renewAuto' => true,
            );
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, json_encode ( $fields ) );
        $result = curl_exec ( $ch ); 
        var_dump($result);
        $s_result = json_decode($result);
        // if (isset($s_result->message_id)) {
        //     $this->add_notification($article_id, $message, $date);
        //     echo 200;
        // } else {
        //     echo 400;
        // }
        curl_close ($ch);
    }


	function chkAvailability() {
		$url = 'https://api.ote-godaddy.com/v1/domains/available?domain=semvac.info&checkType=FAST&forTransfer=false';
        
        $headers = array (
            'Authorization: sso-key '.'3mM44UbgnA6JCV_UrKqsqDyioSngM9S4yGVoN:Wuv2KZz8iE6vqXzyGZzKxu',
            'accept: application/json'
        );
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        // curl_setopt ( $ch, CURLOPT_POST, false );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        // curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
        $result = curl_exec ( $ch ); 
        var_dump($result);
        $s_result = json_decode($result);
        if (isset($s_result->available)) {
	        return $s_result->available;
        } else {
        	return false;
        }
        // if (isset($s_result->message_id)) {
        //     $this->add_notification($article_id, $message, $date);
        //     echo 200;
        // } else {
        //     echo 400;
        // }
        curl_close ($ch);
	}

	function getDomains() {
		$status = 'ACTIVE';
		$limit = 5;
		$url = 'https://api.ote-godaddy.com/v1/domains?statuses=ACTIVE&limit=5';
		$headers = array (
            'Authorization: sso-key '.'3mM44UbgnA6JCV_UrKqsqDyioSngM9S4yGVoN:Wuv2KZz8iE6vqXzyGZzKxu',
            'accept: application/json'
        );
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        // curl_setopt ( $ch, CURLOPT_POST, false );
        curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        // curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
        $result = curl_exec ( $ch ); 
        var_dump($result);
        $s_result = json_decode($result);
        // if (isset($s_result->message_id)) {
        //     $this->add_notification($article_id, $message, $date);
        //     echo 200;
        // } else {
        //     echo 400;
        // }
        curl_close ($ch);
	}

	function getTlds() {
		$url = 'https://api.ote-godaddy.com/v1/domains/tlds';
        
        $headers = array (
            'Authorization: sso-key '.'3mM44UbgnA6JCV_UrKqsqDyioSngM9S4yGVoN:Wuv2KZz8iE6vqXzyGZzKxu',
            'accept: application/json'
        );
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        // curl_setopt ( $ch, CURLOPT_POST, false );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        // curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
        $result = curl_exec ( $ch ); 
        var_dump($result);
        $s_result = json_decode($result);
        // if (isset($s_result->message_id)) {
        //     $this->add_notification($article_id, $message, $date);
        //     echo 200;
        // } else {
        //     echo 400;
        // }
        curl_close ($ch);
	}
?>