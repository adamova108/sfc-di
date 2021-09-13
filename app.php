<?php

require __DIR__ . '/vendor/autoload.php';

use DiDemo\Mailer\SmtpMailer;

$dsn = 'sqlite:' . __DIR__ . '/data/database.sqlite';
$pdo = new PDO($dsn);

$friendHarvester = new FriendHarvester();
$friendHarvester->emailFriends($pdo);