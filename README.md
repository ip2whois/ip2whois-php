IP2WHOIS PHP SDK
========================
This PHP module enables user to easily implement the checking of WHOIS information for a particular domain into their solution using the API from https://www.ip2whois.com. It is a WHOIS lookup api that helps users to obtain domain information, WHOIS record, by using a domain name. The WHOIS API returns a comprehensive WHOIS data such as creation date, updated date, expiration date, domain age, the contact information of the registrant, mailing address, phone number, email address, nameservers the domain is using and much more. IP2WHOIS supports the query for [1113 TLDs and 634 ccTLDs](https://www.ip2whois.com/tld-cctld-supported).

This module requires API key to function. You may sign up for a free API key at https://www.ip2whois.com/register. It is available on the [Packagist](https://packagist.org/packages/ip2whois/ip2whois-php).



Usage Example
============
### Lookup Domain Information

```
<?php
require_once __DIR__.'/vendor/autoload.php';

// Configures IP2WHOIS API key
$config = new \IP2WHOIS\Configuration('YOUR_API_KEY');
$ip2whois = new \IP2WHOIS\Api($config);

// Lookup domain information
$ip2whois->lookup('example.com');
```



### Convert Normal Text to Punycode

```
<?php
require_once __DIR__.'/vendor/autoload.php';

// Configures IP2WHOIS API key
$config = new \IP2WHOIS\Configuration('YOUR_API_KEY');
$ip2whois = new \IP2WHOIS\Api($config);

// Convert normal text to punycode
$ip2whois->getPunycode('täst.de');
```



### Convert Punycode to Normal Text

```
<?php
require_once __DIR__.'/vendor/autoload.php';

// Configures IP2WHOIS API key
$config = new \IP2WHOIS\Configuration('YOUR_API_KEY');
$ip2whois = new \IP2WHOIS\Api($config);

// Convert punycode to normal text
$ip2whois->getNormalText('xn--tst-qla.de');
```



LICENCE
=====================
See the LICENSE file.
