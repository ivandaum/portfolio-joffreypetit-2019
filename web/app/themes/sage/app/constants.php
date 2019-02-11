<?php

$constants = [
  'POST_TYPE__DEFAULT' => 'post',
  'POST_TYPE__PROJECT' => 'project',
  // Posts types
  'URL' => (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
];

foreach($constants as $name => $string) {
  if(!defined($name)) define($name, $string);
}
