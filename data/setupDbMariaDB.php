<?php

/*
 * SETTINGS!
 */
$databaseName = 'sfc_di';
$databaseUser = 'root';
$databasePassword = '';

/*
 * CREATE THE DATABASE
 */
$pdoDatabase = new PDO('mysql:host=localhost', $databaseUser, $databasePassword);
$pdoDatabase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdoDatabase->exec('CREATE DATABASE IF NOT EXISTS sfc_di');

/*
 * CREATE THE TABLE
 */
$dbh = new PDO('mysql:host=localhost;dbname=' . $databaseName, $databaseUser, $databasePassword);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$query = <<<EOF

DROP TABLE IF EXISTS people_to_spam;

CREATE TABLE people_to_spam (
    id int(10) PRIMARY KEY,
    email text,
    name text,
    spamming_since TIMESTAMP
);

INSERT INTO people_to_spam VALUES(1,'hello@knpuniversity.com', 'KnpU', '2011-06-05');
INSERT INTO people_to_spam VALUES(2,'leanna@knplabs.com', 'Leanna Pelham', '2012-02-24');
EOF;

$dbh->exec($query);
//$dbh->commit();