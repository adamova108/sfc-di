<?php

namespace DiDemo\Mailer;

/**
 * Sends emails via SMTP
 */
class SmtpMailer implements MailerInterface
{
    private $hostname;

    private $user;

    private $pass;

    private $port;

    public function __construct($hostname, $user, $pass, $port)
    {
        $this->hostname = $hostname;
        $this->user = $user;
        $this->pass = $pass;
        $this->port = $port;
    }

    /**
     * Sends an email message
     *
     * @param string $recipientEmail
     * @param string $subject
     * @param string $message
     * @param string $from
     */
    public function sendMessage($recipientEmail, $subject, $message, $from)
    {
        // dummy implementation - this class is just used as an example

        // hack - just log something so we can see it
        $logPath = 'logs/mail.log';
        $logLines = array();
        $logLines[] = sprintf(
            '[%s][%s:%s@%s:%s][From: %s][To: %s][Subject: %s]',
            // Used to be date('Y-m-d H:i:s') --- PERFORMANCE??
            (new \DateTime())->setTimezone(new \DateTimeZone('Europe/Budapest'))->format('Y-m-d H:i:s'),
            $this->user,
            $this->pass,
            $this->hostname,
            $this->port,
            $from,
            $recipientEmail,
            $subject
        );
        $logLines[] = '---------------';
        $logLines[] = $message;
        $logLines[] = '---------------';

        if (!file_exists($logPath)) {
            mkdir('logs', 0777);
        }

        $fh = fopen($logPath, 'a');
        fwrite($fh, implode("\n", $logLines)."\n");
        // end hack
    }
}