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
	public function lookup($params = [])
	{
		$queries = [
			'key'     => $this->ip2whoisApiKey,
			'format'  => 'json',
			'domain'  => (isset($params['domain'])) ? $params['domain'] : '',
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
	public function getPunycode($params = [])
	{
		$domain  = (isset($params['domain'])) ? $params['domain'] : '';

		return idn_to_utf8($domain);
	}

	/**
	 * Get Normal Text.
	 *
	 * @param array $params parameters of getNormalText details
	 *
	 * @return object result in JSON object
	 */
	public function getNormalText($params = [])
	{
		$domain  = (isset($params['domain'])) ? $params['domain'] : '';

		return idn_to_ascii($domain);
	}
}

class_alias('IP2WHOIS\Api', 'IP2WHOIS_Api');
