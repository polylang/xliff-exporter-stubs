<?php

require 'vendor/autoload.php';

use StubsGenerator\{StubsGenerator, Finder};

$generator = new StubsGenerator();

return $finder = Finder::create()->in('../xliff-exporter/modules/');
