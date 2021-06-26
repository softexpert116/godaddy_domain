<?php
	// call_func();
	// getDomains();
	// getTlds();
    $sso_key_ote = "3mM44UbgnA6JCV_UrKqsqDyioSngM9S4yGVoN:Wuv2KZz8iE6vqXzyGZzKxu";
    $sso_key_product = "epBxPu1PfrXv_FvWGHb54mptKpvRVTvA7ct:SjyumAdabmubbQrxHQjM1";
    $url_ote = "https://api.ote-godaddy.com/v1";
    $url_product = "https://api.godaddy.com/v1";


    $type = $_REQUEST['type'];
    $domain = $_REQUEST['domain'];
    if ($type == 'check') {
        echo chkAvailability($domain);
    } else if ($type == 'purchase') {
        $address1 = $_REQUEST['address1'];
        $address2 = $_REQUEST['address2'];
        $city = $_REQUEST['city'];
        $country = $_REQUEST['country'];
        $postalCode = $_REQUEST['postalCode'];
        $state = $_REQUEST['state'];
        $email = $_REQUEST['email'];
        $fax = $_REQUEST['fax'];
        $jobTitle = $_REQUEST['jobTitle'];
        $nameFirst = $_REQUEST['nameFirst'];
        $nameLast = $_REQUEST['nameLast'];
        $nameMiddle = $_REQUEST['nameMiddle'];
        $organization = $_REQUEST['organization'];
        $phone = $_REQUEST['phone'];
        echo purchaseDomain($domain, $address1, $address2, $city, $country, $postalCode, $state, $email, $fax, $jobTitle, $nameFirst, $nameLast, $nameMiddle, $organization, $phone);
    }
    // if ($result->available) {
    //     echo $result;
    // } else {
    //     echo 400;
    // }



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
    function purchaseDomain($domain, $address1, $address2, $city, $country, $postalCode, $state, $email, $fax, $jobTitle, $nameFirst, $nameLast, $nameMiddle, $organization, $phone) {
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
                                        'address1' => $address1,
                                        'address2' => $address2,
                                        'city' => $city,
                                        'country' => $country,
                                        'postalCode' => $postalCode,
                                        'state' => $state,
                                    ),
                            'email'     => $email,
                            'fax'       => $fax,
                            'jobTitle'  => $jobTitle,
                            'nameFirst'  => $nameFirst,
                            'nameLast'  => $nameLast,
                            'nameMiddle'  => $nameMiddle,
                            'organization'  => $organization,
                            'phone'  => $phone,
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
        curl_close ($ch);
        return $result;
    }

	function chkAvailability($domain) {
		$url = 'https://api.godaddy.com/v1/domains/available?domain='.$domain.'&checkType=FAST&forTransfer=false';
        $headers = array (
            'Authorization: sso-key '.'epBxPu1PfrXv_FvWGHb54mptKpvRVTvA7ct:SjyumAdabmubbQrxHQjM1',
            'accept: application/json'
        );
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec ( $ch ); 
        curl_close ($ch);
        return $result;
	}

	function getDomains() {
		$status = 'ACTIVE';
		$limit = 5;
		$url = 'https://api.godaddy.com/v1/domains?statuses=ACTIVE&limit=5';
		$headers = array (
            'Authorization: sso-key '.'epBxPu1PfrXv_FvWGHb54mptKpvRVTvA7ct:SjyumAdabmubbQrxHQjM1',
            'accept: application/json'
        );
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec ( $ch ); 
        $s_result = json_decode($result);
        curl_close ($ch);
	}

	function getTlds() {
		$url = 'https://api.godaddy.com/v1/domains/tlds';
        
        $headers = array (
            'Authorization: sso-key '.'epBxPu1PfrXv_FvWGHb54mptKpvRVTvA7ct:SjyumAdabmubbQrxHQjM1',
            'accept: application/json'
        );
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec ( $ch ); 
        $s_result = json_decode($result);
        curl_close ($ch);
	}

    
?>