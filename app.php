<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

/*** START DI CONTAINER ***/

$container = new Pimple();

require_once __DIR__ . '/app/config.php';
require_once __DIR__ . '/app/services.php';

/*** END DI CONTAINER ***/

$friendHarvester = $container['friend_harvester'];
$friendHarvester->emailFriends();
