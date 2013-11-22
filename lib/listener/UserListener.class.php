<?php
/**
* UserListener do something
*
* @author Alix Chaysinh <alix.chaysinh@gmail.com>
*/ 
class UserListener 
{
    public static function sendRegistrationEmail(sfEvent $event)
    {
        /* @car sfGuardUser $user */
        $user = $event['user'];

        /* @var sfMailer $mailer */
        $mailer = $event->getSubject()->getMailer();
        $mailer->composeAndSend(
            'alix.chaysinh@gmail.com',
            $user->getEmailAddress(),
            $user->getFirstName().', welcome at G.com',
            'Hi '.$user->getFirstName().', your account has been registered at G.com.'
        );
    }
}
 