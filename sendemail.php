<?php 
    require_once 'vendor/autoload.php';

    class SendEmail{

        public static function SendMail($to, $subject, $content){
            $key = '204C6F87C48CFD12355715D3A3809424917FC4D50062701E4368B45658036D264D98B5D0873A68C4026D0F3A43404AA3';
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

                //echo $result; //Error Checking

                } 
            catch (Exception $e) {
                echo 'Email exception Caught : ' . $e->getMessage() . "\n";
                return false;
            }
        }
    }
?>