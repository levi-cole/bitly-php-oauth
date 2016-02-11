<?php
	$params = [
		'client_id' => '', // Enter your Client ID
		'client_secret' => '', // Enter your Client Secret
		'code' => $_GET['code'],
		'redirect_uri' => 'http://.../oauth.php' // The redirect_uri is just pointing back to the location of this file
	];

	$output = '';
	try {
		$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://api-ssl.bitly.com/oauth/access_token');
			curl_setopt($ch, CURLOPT_POST, count($params));
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
	// Returns a URL encoded string in the format of "access_token=%s&login=%s&apiKey=%s"
	
	// parse_str() creates variables $access_token, $login, $apiKey (http://php.net/manual/en/function.parse-str.php)
	parse_str($output);

	//the OAuth access token for specified user
	echo $access_token;

	//the end-user's bitly username
	echo $login;

	//echo $apiKey;  
	//API keys are deprecated. This value will be removed in the future.
