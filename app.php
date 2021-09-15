<?php

declare(strict_types=1);

use DiDemo\FriendHarvester;

require __DIR__ . '/vendor/autoload.php';

/*** START DI CONTAINER ***/

/*** Subclass version --- has to come before instantiation ***/

/*class AsdAsd extends Pimple {

    // 1. The return type version

    public function gFH(): FriendHarvester
    {
        return $this->offsetGet('friend_harvester');
    }

    // 2. the PHPDoc version

    /**
     *  @return FriendHarvester
     *
    public function gFH()
    {
        return $this->offsetGet('friend_harvester');
    }
}

$container = new AsdAsd();*/
$container = new Pimple();

require_once __DIR__ . '/app/config.php';
require_once __DIR__ . '/app/services.php';

/*** END DI CONTAINER ***/

///** @var FriendHarvester $friendHarvester */
//$friendHarvester = $container['friend_harvester'];
//$friendHarvester->emailFriends();

/** @var FriendHarvester $friendHarvester */
$friendHarvester = $container['friend_harvester'];
$friendHarvester->emailFriends();

//$friendHarvester = $container->gFH();
//$friendHarvester->emailFriends();

/**
 *  "Another common tactic is to create an object or sub-class the container and add specific methods that return different services and      have proper PHPDoc on them. I won't show it here, but imagine we've sub-classed the Pimple class and added a getFriendHarvester()        method which has a proper @return PHPDoc on it."
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