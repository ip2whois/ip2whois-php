IP2WHOIS PHP SDK
========================
[![Latest Stable Version](https://img.shields.io/packagist/v/ip2whois/ip2whois-php.svg)](https://packagist.org/packages/ip2whois/ip2whois-php)

 **_Please note that this GitHub project is no longer being maintained and has been migrated to a new repository. We recommend that you use the [IP2Location.io PHP SDK](https://github.com/ip2location/ip2location-io-php) going forward._**
 
This PHP module enables user to easily implement the checking of WHOIS information for a particular domain into their solution using the API from https://www.ip2whois.com. It is a WHOIS lookup api that helps users to obtain domain information, WHOIS record, by using a domain name. The WHOIS API returns a comprehensive WHOIS data such as creation date, updated date, expiration date, domain age, the contact information of the registrant, mailing address, phone number, email address, nameservers the domain is using and much more. IP2WHOIS supports the query for [1113 TLDs and 634 ccTLDs](https://www.ip2whois.com/tld-cctld-supported).

This module requires API key to function. You may sign up for a free API key at https://www.ip2whois.com/register. It is available on the [Packagist](https://packagist.org/packages/ip2whois/ip2whois-php).


Usage Example
============
### Lookup Domain Information
```php
<?php
require_once __DIR__.'/vendor/autoload.php';

// Configures IP2WHOIS API key
$config = new \IP2WHOIS\Configuration('YOUR_API_KEY');
$ip2whois = new \IP2WHOIS\Api($config);

// Lookup domain information
$ip2whois->lookup('example.com');
```

### Convert Normal Text to Punycode
```php
<?php
require_once __DIR__.'/vendor/autoload.php';

// Configures IP2WHOIS API key
$config = new \IP2WHOIS\Configuration('YOUR_API_KEY');
$ip2whois = new \IP2WHOIS\Api($config);

// Convert normal text to punycode
$ip2whois->getPunycode('täst.de');
```

### Convert Punycode to Normal Text
```php
<?php
require_once __DIR__.'/vendor/autoload.php';

// Configures IP2WHOIS API key
$config = new \IP2WHOIS\Configuration('YOUR_API_KEY');
$ip2whois = new \IP2WHOIS\Api($config);

// Convert punycode to normal text
$ip2whois->getNormalText('xn--tst-qla.de');
```

### Get Domain Name
```php
<?php
require_once __DIR__.'/vendor/autoload.php';

// Configures IP2WHOIS API key
$config = new \IP2WHOIS\Configuration('YOUR_API_KEY');
$ip2whois = new \IP2WHOIS\Api($config);

// Get domain name from URL
$ip2whois->getDomainName('https://www.example.com/exe');
```

### Get Domain Extension
```php
<?php
require_once __DIR__.'/vendor/autoload.php';

// Configures IP2WHOIS API key
$config = new \IP2WHOIS\Configuration('YOUR_API_KEY');
$ip2whois = new \IP2WHOIS\Api($config);

// Get domain extension (gTLD or ccTLD) from URL or domain name
$ip2whois->getDomainExtension('example.com');
```


Response Parameter
============
### Lookup function
| Parameter | Type | Description |
|---|---|---|
|domain|string|Domain name.|
|domain_id|string|Domain name ID.|
|status|string|Domain name status.|
|create_date|string|Domain name creation date.|
|update_date|string|Domain name updated date.|
|expire_date|string|Domain name expiration date.|
|domain_age|integer|Domain name age in day(s).|
|whois_server|string|WHOIS server name.|
|registrar.iana_id|string|Registrar IANA ID.|
|registrar.name|string|Registrar name.|
|registrar.url|string|Registrar URL.|
|registrant.name|string|Registrant name.|
|registrant.organization|string|Registrant organization.|
|registrant.street_address|string|Registrant street address.|
|registrant.city|string|Registrant city.|
|registrant.region|string|Registrant region.|
|registrant.zip_code|string|Registrant ZIP Code.|
|registrant.country|string|Registrant country.|
|registrant.phone|string|Registrant phone number.|
|registrant.fax|string|Registrant fax number.|
|registrant.email|string|Registrant email address.|
|admin.name|string|Admin name.|
|admin.organization|string|Admin organization.|
|admin.street_address|string|Admin street address.|
|admin.city|string|Admin city.|
|admin.region|string|Admin region.|
|admin.zip_code|string|Admin ZIP Code.|
|admin.country|string|Admin country.|
|admin.phone|string|Admin phone number.|
|admin.fax|string|Admin fax number.|
|admin.email|string|Admin email address.|
|tech.name|string|Tech name.|
|tech.organization|string|Tech organization.|
|tech.street_address|string|Tech street address.|
|tech.city|string|Tech city.|
|tech.region|string|Tech region.|
|tech.zip_code|string|Tech ZIP Code.|
|tech.country|string|Tech country.|
|tech.phone|string|Tech phone number.|
|tech.fax|string|Tech fax number.|
|tech.email|string|Tech email address.|
|billing.name|string|Billing name.|
|billing.organization|string|Billing organization.|
|billing.street_address|string|Billing street address.|
|billing.city|string|Billing city.|
|billing.region|string|Billing region.|
|billing.zip_code|string|Billing ZIP Code.|
|billing.country|string|Billing country.|
|billing.phone|string|Billing phone number.|
|billing.fax|string|Billing fax number.|
|billing.email|string|Billing email address.|
|nameservers|array|Name servers|

```json
{
  "domain": "greendot.com",
  "domain_id": "600750_DOMAIN_COM-VRSN",
  "status": "clientTransferProhibited http://www.icann.org/epp#clientTransferProhibited",
  "create_date": "1997-11-03T00:00:00Z",
  "update_date": "2021-10-29T01:13:27Z",
  "expire_date": "2023-11-02T05:00:00Z",
  "domain_age": 9319,
  "whois_server": "whois.corporatedomains.com",
  "registrar": {
    "iana_id": "299",
    "name": "CSC CORPORATE DOMAINS, INC.",
    "url": "www.cscprotectsbrands.com"
  },
  "registrant": {
    "name": "Admin Role",
    "organization": "Green Dot Corporation",
    "street_address": "3465 E. Foothill Blvd",
    "city": "Pasadena",
    "region": "CA",
    "zip_code": "91107",
    "country": "US",
    "phone": "+1.8664120548",
    "fax": "+1.8664120548",
    "email": "adminrole@greendotcorp.com"
  },
  "admin": {
    "name": "Admin Role",
    "organization": "Green Dot Corporation",
    "street_address": "3465 E. Foothill Blvd",
    "city": "Pasadena",
    "region": "CA",
    "zip_code": "91107",
    "country": "US",
    "phone": "+1.8664120548",
    "fax": "+1.8664120548",
    "email": "adminrole@greendotcorp.com"
  },
  "tech": {
    "name": "Admin Role",
    "organization": "Green Dot Corporation",
    "street_address": "3465 E. Foothill Blvd",
    "city": "Pasadena",
    "region": "CA",
    "zip_code": "91107",
    "country": "US",
    "phone": "+1.8664120548",
    "fax": "+1.8664120548",
    "email": "adminrole@greendotcorp.com"
  },
  "billing": {
    "name": "",
    "organization": "",
    "street_address": "",
    "city": "",
    "region": "",
    "zip_code": "",
    "country": "",
    "phone": "",
    "fax": "",
    "email": ""
  },
  "nameservers": [
    "dexter.ns.cloudflare.com",
    "aliza.ns.cloudflare.com"
  ]
}
```


LICENCE
=====================
See the LICENSE file.
