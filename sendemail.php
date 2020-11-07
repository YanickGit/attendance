<?php 
    require_once 'vendor/autoload.php';

    class SendEmail{

        public static function SendMail($to, $subject, $content){
            $key = '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';

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("yanickbiz2k4@hotmail.com", "Yanick Levy");
            $email->addTo($to);
            $email->setSubject($subject);
            //$email->addContent("text/plain", $content);
            $email->addContent("text/html", $content);

            $sendgrid = new \SendGrid($key);
            
            try {
                    $response = $sendgrid->send($email);
                    return $response;
                } 
            catch (Exception $e) {
                echo 'Email exception Caught : ' . $e->getMessage() . "\n";
                return false;
            }
        }
    }
?>