<?php

// Load our autoloader
require_once __DIR__.'/vendor/autoload.php';

$MainViews = __DIR__.'/views';

$ViewsParts = __DIR__.'/views/parts';

// Specify our Twig templates location
$loader = new Twig_Loader_Filesystem(array( $MainViews, $ViewsParts ));

$SiteTitle = 'Your Site Title';

$SomeOtherVariable = 'Lorem Ipsum Dolor';

// Instantiate our Twig
$twig = new Twig_Environment($loader);
$twig->addGlobal('SiteTitle', $SiteTitle);
$twig->addGlobal('SomeOtherVariable', $SomeOtherVariable);