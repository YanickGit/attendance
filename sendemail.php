<?php 
    require_once 'vendor/autoload.php';

    class SendEmail{

        public static function SendMail($to, $subject, $content){
            $key = 'AF346F2075EAF10C76D8F4A8DD28DACAD8F2D16FF8D3279AE6AAECC667CA096955BAB613191F39F675E3A5ED55240C29
            ';
            $url = 'https://api.elasticemail.com/v2/email/send';

            /*
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("yanickbiz2k4@hotmail.com", "Yanick Levy");
            $email->addTo($to);
            $email->setSubject($subject);
            //$email->addContent("text/plain", $content);
            $email->addContent("text/html", $content);
            
            $sendgrid = new \SendGrid($key);
            */
            
            try {
                //$response = $sendgrid->send($email);
                //return $response;

                $email = array('from' => 'yanickbiz2k4@hotmail.com',
                'fromName' => 'IT Conference 2020',
                'apikey' => $key,
                'subject' => $subject,
                'to' => $to,
                'bodyHtml' => $content,
                'bodyText' => $content,
                'isTransactional' => false);
                
                $ch = curl_init();
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $email,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HEADER => false,
                    CURLOPT_SSL_VERIFYPEER => false
                ));
                
                $result=curl_exec ($ch);
                curl_close ($ch);

                } 
            catch (Exception $e) {
                echo 'Email exception Caught : ' . $e->getMessage() . "\n";
                return false;
            }
        }
    }
?>