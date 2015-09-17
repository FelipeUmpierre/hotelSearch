<?php
require __DIR__ . '/../src/SplClassLoader.php';

$oClassLoader = new \SplClassLoader('hotel', __DIR__ . '/../src');
$oClassLoader->register();
