<?php

declare(strict_types=1);

use DiDemo\FriendHarvester;

require __DIR__ . '/vendor/autoload.php';

/*** START DI CONTAINER ***/

$container = new Pimple();

require_once __DIR__ . '/app/config.php';
require_once __DIR__ . '/app/services.php';

/*** END DI CONTAINER ***/

///** @var FriendHarvester $friendHarvester */
//$friendHarvester = $container['friend_harvester'];
//$friendHarvester->emailFriends();

///** @var FriendHarvester $friendHarvester */
//$friendHarvester = $container['friend_harvester'];
//$friendHarvester->emailFriends();

/** TODO: Create (1) a separate class AND (2) a SubClass version of the container
 *        to test IDE autocompletion that ways as well
 */

/*
 * Separate class version
 *
 class KwdDiContainer {

    private $container;

    public function __construct(Pimple $container)
    {
        $this->container = $container;
    }

    public function getFriendHarvester(): FriendHarvester
    {
        return $this->container['friend_harvester'];
    }
}

$kwdDi = new KwdDiContainer($container);
$friendHarvester = $kwdDi->getFriendHarvester();
$friendHarvester->emailFriends();
*/