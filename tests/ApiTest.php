<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
	public function testLookup() {
		$config = new \IP2WHOIS\Configuration($GLOBALS['testApiKey']);
		$ip2whois = new \IP2WHOIS\Api($config);
		$result = $ip2whois->lookup('example.c');

		if ($GLOBALS['testApiKey'] == 'YOUR_API_KEY') {
			$this->assertEquals(
				'API key not found.',
				$result->error->error_message,
			);
		} else {
			$this->assertEquals(
				'Invalid domain.',
				$result->error->error_message,
			);
		}
	}

	public function testGetPunycode() {
		$config = new \IP2WHOIS\Configuration($GLOBALS['testApiKey']);
		$ip2whois = new \IP2WHOIS\Api($config);
		$result = $ip2whois->getPunycode('täst.de');

		$this->assertEquals(
			'xn--tst-qla.de',
			$result,
		);
	}

	public function testGetNormalText() {
		$config = new \IP2WHOIS\Configuration($GLOBALS['testApiKey']);
		$ip2whois = new \IP2WHOIS\Api($config);
		$result = $ip2whois->getNormalText('xn--tst-qla.de');

		$this->assertEquals(
			'täst.de',
			$result,
		);
	}

	public function testGetDomainName() {
		$config = new \IP2WHOIS\Configuration($GLOBALS['testApiKey']);
		$ip2whois = new \IP2WHOIS\Api($config);
		$result = $ip2whois->getDomainName('https://www.example.com/exe');

		$this->assertEquals(
			'example.com',
			$result,
		);
	}

	public function testGetDomainExtension() {
		$config = new \IP2WHOIS\Configuration($GLOBALS['testApiKey']);
		$ip2whois = new \IP2WHOIS\Api($config);
		$result = $ip2whois->getDomainExtension('https://www.example.com/exe');

		$this->assertEquals(
			'.com',
			$result,
		);
	}
}