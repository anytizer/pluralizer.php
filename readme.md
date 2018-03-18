# pluralizer.php

Pluralizing words in PHP


## Installation

Use one of:

	composer require anytizer/pluralizer.php:dev-master
	composer global require anytizer/pluralizer.php:dev-master


## Example

    <?php
    namespace backend\common;

    require "vendor/autoload.php";

    $pluralizer = new pluralizer();
    $word = $pluralizer->pluralize($word);
