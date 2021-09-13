<?php

namespace DiDemo;

use DiDemo\Mailer\SmtpMailer;

/**
 * This is a SERVICE CLASS as it performs a SERVICE
 * and SHOULD ONLY BE RESPONSIBLE FOR THAT SPECIFIC SERVICE
 * i.e. sending emails
 */
class FriendHarvester
{
    private \PDO $pdo;
    private array $smtpConfig;

    public function __construct(\PDO $pdo, array $smtpConfig)
    {
        $this->pdo = $pdo;
        $this->smtpConfig = $smtpConfig;
    }

    public function emailFriends()
    {
        $mailer = new SmtpMailer(
            $this->smtpConfig['server'],
            $this->smtpConfig['user'],
            $this->smtpConfig['password'],
            $this->smtpConfig['port']
        );

        $sql = 'SELECT * FROM people_to_spam';
        foreach ($this->pdo->query($sql) as $row) {
            $mailer->sendMessage(
                $row['email'],
                'Yay! We want to send you money for no reason!',
                sprintf(<<<EOF
Hi %s! We've decided that we want to send you money for no reason!

Please forward us all your personal information so we can make a deposit and don't ask any questions!
EOF
                    , $row['name']),
                'YourTrustedFriend@SendMoneyToStrangers.com'
            );
        }
    }
}