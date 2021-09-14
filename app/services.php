<?php

use DiDemo\FriendHarvester;
use DiDemo\Mailer\SmtpMailer;

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