<?php
namespace tests;

require_once("./vendor/autoload.php");

use anytizer\pluralizer;

$word = "house";

$pluralizer = new pluralizer();
$word = $pluralizer->pluralize($word);
echo $word;
