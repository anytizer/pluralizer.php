# pluralizer.php

Pluralizing words in PHP


## Installation

	composer require anytizer/pluralizer.php:dev-master


## Example

    namespace backend\common;

    $pluralizer = new pluralizer();
    $word = $pluralizer->pluralize($word);
