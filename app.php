<?php

require __DIR__ . '/vendor/autoload.php';

use DiDemo\FriendHarvester;
use DiDemo\Mailer\SmtpMailer;

$dsn = 'sqlite:' . __DIR__ . '/data/database.sqlite';
$pdo = new PDO($dsn);

$mailer = new SmtpMailer(
    'smtp.SendMoneyToStrangers.com',
    'smtpuser',
    'smtppass',
    '465'
);

$friendHarvester = new FriendHarvester($pdo, $mailer);
$friendHarvester->emailFriends();