<?php

namespace IP2WHOIS;

/**
 * IP2WHOIS HTTP Client
 * Sends Http requests using curl.
 *
 * @copyright 2021 IP2WHOIS.com
 */
class Http
{
	public function __construct()
	{
	}

	public function get($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_USERAGENT, 'IP2WHOIS PHP SDK ' . Configuration::VERSION);

		$response = curl_exec($ch);

		if (empty($response)) {
			curl_close($ch);

			return false;
		}

		curl_close($ch);

		return $response;
	}
}

class_alias('IP2WHOIS\Http', 'IP2WHOIS_Http');
