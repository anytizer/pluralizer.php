<?php
namespace tests;

require_once("vendor/autoload.php");

use common\pluralizer;

$word = "house";

$pluralizer = new pluralizer();
$word = $pluralizer->pluralize($word);
echo $word;
