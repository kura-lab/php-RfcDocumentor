# php-RfcDocumentor
RfcDocumentor analyzes RFC in tools.ietf.org.

### Install

At first, install composer.

```
$ mkdir workspace
$ cd workspace
$ curl -s http://getcomposer.org/installer | php
```

Create composer.json.

```
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/kura-lab/php-RfcDocumentor"
        }
    ],
    "require": {
        "kura-lab/php-RfcDocumentor": "dev-master"
    }
}
```

Install RfcDocumentor library.

```
$ php composer.phar install
```

### Usage

Require autoloader in the your program.

```
<?php
// sample.php

require_once("vendor/autoload.php");

use kuralab\rfc\RfcDocumentor;

// Initialize
$rfc = new RfcDocumentor("6749");

// Generate Word Frequency of type Array
$ret = $rfc->generateWordFrequency();
var_dump($ret);
```

The following is result of implementation.

```
$ php sample.php

array(1778) {
  ["the"]=>
  int(1764)
  ["client"]=>
  int(493)
  ["authorization"]=>
  int(492)
  ["to"]=>
  int(435)
...
```
