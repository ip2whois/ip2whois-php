<?php

namespace IP2WHOIS;

/**
 * IP2WHOIS API module.
 */
class Api
{

	private $ip2whoisApiKey = '';

	public function __construct($config)
	{
		$this->ip2whoisApiKey = $config->apiKey;
	}

	/**
	 * Lookup domain WHOIS information.
	 *
	 * @param array $params parameters of lookup details
	 *
	 * @return object result in JSON object
	 */
	public function lookup($domain)
	{
		$queries = [
			'key'     => $this->ip2whoisApiKey,
			'format'  => 'json',
			'domain'  => (isset($domain)) ? $domain : '',
		];

		$http = new Http();
		$response = $http->get('https://api.ip2whois.com/v2?' . http_build_query($queries));

		if (($json = json_decode($response)) === null) {
			return false;
		}

		return $json;
	}

	/**
	 * Get Punycode.
	 *
	 * @param array $params parameters of getPunycode details
	 *
	 * @return object result in JSON object
	 */
	public function getPunycode($domain)
	{
		$result  = (isset($domain)) ? $domain : '';

		return idn_to_utf8($result);
	}

	/**
	 * Get Normal Text.
	 *
	 * @param array $params parameters of getNormalText details
	 *
	 * @return object result in JSON object
	 */
	public function getNormalText($domain)
	{
		$result  = (isset($domain)) ? $domain : '';

		return idn_to_ascii($result);
	}
}

class_alias('IP2WHOIS\Api', 'IP2WHOIS_Api');
