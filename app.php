<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use DiDemo\FriendHarvester;
use DiDemo\Mailer\SmtpMailer;

$container = new Pimple();

$container['mailer'] = $container->share(static function () {
    return new SmtpMailer(
        'smtp.SendMoneyToStrangers.com',
        'smtpuser',
        'smtppass',
        '465'
    );
});

$dsn = 'sqlite:' . __DIR__ . '/data/database.sqlite';
$pdo = new PDO($dsn);

$friendHarvester = new FriendHarvester($pdo, $container['mailer']);
$friendHarvester->emailFriends();
