<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use DiDemo\FriendHarvester;
use DiDemo\Mailer\SmtpMailer;

/*** START DI CONTAINER ***/

$container = new Pimple();

$container['database.dsn'] = 'sqlite:' . __DIR__ . '/data/database.sqlite';
$container['smtp.server'] = 'smtp.SendMoneyToStrangers.com';
$container['smtp.user'] = 'smtpuser';
$container['smtp.password'] = 'smtp';
$container['smtp.port'] = 465;

$container['mailer'] = $container->share(static function (Pimple $container) {
    return new SmtpMailer(
        $container['smtp.server'],
        $container['smtp.user'],
        $container['smtp.password'],
        $container['smtp.port']

    );
});

$container['friend_harvester'] = $container->share(static function (Pimple $container) {
    return new FriendHarvester($container['pdo'], $container['mailer']);
});

$container['pdo'] = $container->share(static function (Pimple $container) {
    $dsn = 'sqlite:' . __DIR__ . '/data/database.sqlite';
    return new PDO($container['database.dsn']);
});

/*** END DI CONTAINER ***/

$friendHarvester = $container['friend_harvester'];
$friendHarvester->emailFriends();
