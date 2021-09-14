<?php

declare(strict_types=1);

use DiDemo\FriendHarvester;

require __DIR__ . '/vendor/autoload.php';

/*** START DI CONTAINER ***/

$container = new Pimple();

require_once __DIR__ . '/app/config.php';
require_once __DIR__ . '/app/services.php';

/*** END DI CONTAINER ***/

/** @var FriendHarvester $friendHarvester */
$friendHarvester = $container['friend_harvester'];
$friendHarvester->emailFriends();
