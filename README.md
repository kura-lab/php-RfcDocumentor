# php-rfc-documentor
RFC Documentor analyzes RFC in tools.ietf.org.

[![Packagist](https://img.shields.io/packagist/v/kura-lab/php-rfc-documentor.svg)](https://packagist.org/packages/kura-lab/php-rfc-documentor)
[![license](https://img.shields.io/github/license/mashape/apistatus.svg)](https://github.com/kura-lab/php-rfc-documentor/blob/master/LICENSE)

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
    "require": {
        "kura-lab/php-rfc-documentor": "2.*"
    }
}
```

Install RFC Documentor library.

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
  array(2) {
    ["mean"]=>
    array(1) {
      ["the"]=>
      string(830) " 《前述の名詞または文脈でそれと分かる名詞に付けて》『その』,あの,名の / 《唯一の事物に付けて》 / 《方角・自然現象に付けて》 / 《用具・楽器・特定の病気などに付けて》 / 《修飾吾[句]を伴う名詞に付けて》 / 《単
数普通名詞に付けて》(1)《種族全体》…『というもの』 / 《複数名詞または集合名詞に付けて》 / 《単位》『…につき;…単位[で]』 / 《身体の一部に付けて,所有格に代わる》 / 《形容詞に付けて》 / 《固有名詞に付けて》 / 《強意用法に》『随一の』,典型的な / 《「the+比較級,the+比較級」の形で》『…すればするほどそれだけ』 / 《比較級の前に》(…につれて,のた
めに)『それだけ』,ますます"
    }
    ["frequency"]=>
    int(1764)
  }
  ["client"]=>
  array(2) {
    ["mean"]=>
    array(1) {
      ["client"]=>
      string(85) " [『弁護』]『依頼人』,訴訟依頼人 / (商売上の)おとくい(customer)"
    }
    ["frequency"]=>
    int(493)
  }
  ["authorization"]=>
  array(2) {
    ["mean"]=>
    array(1) {
      ["authorization"]=>
      string(51) " 権限を与えること,委任;許可すること"
    }
    ["frequency"]=>
    int(492)
  }
...
```
