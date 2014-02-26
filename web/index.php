<?php

/**
 * This file is part of the Future CI package.
 *
 * @author    Jasper N. Brouwer <jasper@future500.nl>
 * @copyright 2014 Future500 B.V.
 * @license   https://github.com/Future500BV/future-ci/blob/master/LICENSE MIT
 */

$rootDir = realpath(__DIR__ . '/..');

require_once $rootDir . '/vendor/autoload.php';

$app = new Silex\Application();

$app['root_dir'] = $rootDir;

include $rootDir . '/src/F500/CI/Resources/config/services.php';
include $rootDir . '/src/F500/CI/Resources/config/controllers.php';
include $rootDir . '/src/F500/CI/Resources/config/routes.php';

$app->run();
