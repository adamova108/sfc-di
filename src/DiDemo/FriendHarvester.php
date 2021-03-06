<?php

namespace DiDemo;

use DiDemo\Mailer\MailerInterface;

/**
 * This is a SERVICE CLASS as it performs a SERVICE
 * and SHOULD ONLY BE RESPONSIBLE FOR THAT SPECIFIC SERVICE
 * i.e. sending emails
 */
class FriendHarvester
{
    private \PDO $pdo;
    private MailerInterface $mailer;

    public function __construct(\PDO $pdo, MailerInterface $mailer)
    {
        $this->pdo = $pdo;
        $this->mailer = $mailer;
    }

    public function emailFriends()
    {
        $sql = 'SELECT * FROM people_to_spam';
        foreach ($this->pdo->query($sql) as $row) {
            $this->mailer->sendMessage(
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