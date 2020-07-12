<?php

use JDI\Helper\PathBuilder;

require 'vendor/autoload.php';

$startTime = microtime(true);

$array = ['a', 'b', 'c', 'd', 'efg', 1, 2, 3, 'hi'];
$bigArray = [
  '|',
  'abc',
  '',
  '',
  'defg',
  'hi',
  'ending/',
  'abc',
  '',
  '',
  'defg',
  'hi',
  'ending/',
  'abc',
  '',
  '',
  'defg',
  'hi',
  'ending/',
  'abc',
  '',
  '',
  'defg',
  'hi',
  'ending/',
  'abc',
  '',
  '',
  'defg',
  'hi',
  'ending/',
  'abc',
  '',
  '',
  'defg',
  'hi',
  'ending/',
  'abc',
  '',
  '',
  'defg',
  'hi',
  'ending/',
  'abc',
  '',
  '',
  'defg',
  'hi',
  'ending/',
  'abc',
  '',
  '',
  'defg',
  'hi',
  'ending/',
  'abc',
  '',
  '',
  'defg',
  'hi',
  'ending/',
  'abc',
  '',
  '',
  'defg',
  'hi',
  'ending/',
  'abc',
  '',
  '',
  'defg',
  'hi',
  'ending/',
  'abc',
  '',
  '',
  'defg',
  'hi',
  'ending/',
  'abc',
  '',
  '',
  'defg',
  'hi',
  'ending/',
  'abc',
  '',
  '',
  'defg',
  'hi',
  'ending/',
];

for($i = 0; $i < 100000; $i++)
{
  PathBuilder::custom('/', $bigArray);
}

for($i = 0; $i < 500000; $i++)
{
  PathBuilder::custom('/', $array);
}

echo "Processed in " . ((microtime(true) - $startTime) * 1000) . " ms\n";
