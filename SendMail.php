<?php
    require_once ('src/PHPMailer.php');
    require_once ('src/SMTP.php');
    require_once ('src/Exception.php');
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    function sendEmail($email){
        $mail = new PHPMailer(true);
        try {
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'joao.sauro25081988@gmail.com';
            $mail->Password = '###################';
            $mail->Port = 587;

            $mail->setFrom('joao.sauro25081988@gmail.com');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Teste de email api de email do PHP';
            $mail->Body = 'Teste de email api de email do PHP outro teste';
            $mail->AltBody = 'Teste de email do PHP';

            if($mail->send()){
                echo 'Email enviado com sucesso';
            } else{
                echo 'Email nao enviado';
            }

        } catch (Exception $ex) {
            echo "Erro ao enviar a mensagem: {$mail->ErrorInfo}";
        }
    }

/**
 * This example shows how to send via Google's Gmail servers using XOAUTH2 authentication.
 */

//Import PHPMailer classes into the global namespace
//require_once ('src/PHPMailer.php');
//require_once ('src/SMTP.php');
//require_once ('src/Exception.php');
//require_once ('src/OAuth.php');
//
//
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\OAuth;
//use PHPMailer\PHPMailer\Exception;
////Alias the League Google OAuth2 provider class
//use League\OAuth2\Client\Provider\Google;
////use League\OAuth2\Client\Provider\
//
////SMTP needs accurate times, and the PHP time zone MUST be set
////This should be done in your php.ini, but this is how to do it if you don't have access to that
//date_default_timezone_set('Etc/UTC');
//
////Load dependencies from composer
////If this causes an error, run 'composer install'
//require 'vendor/autoload.php';
//
//function sendEmail(){
////Create a new PHPMailer instance
//$mail = new PHPMailer();
//try {
////Tell PHPMailer to use SMTP
//$mail->isSMTP();
//
////Enable SMTP debugging
////SMTP::DEBUG_OFF = off (for production use)
////SMTP::DEBUG_CLIENT = client messages
////SMTP::DEBUG_SERVER = client and server messages
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
//
////Set the hostname of the mail server
//$mail->Host = 'smtp.gmail.com';
//
////Set the SMTP port number:
//// - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
//// - 587 for SMTP+STARTTLS
//$mail->Port = 465;
//
////Set the encryption mechanism to use:
//// - SMTPS (implicit TLS on port 465) or
//// - STARTTLS (explicit TLS on port 587)
//$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
//
////Whether to use SMTP authentication
//$mail->SMTPAuth = true;
//
////Set AuthType to use XOAUTH2
//$mail->AuthType = 'XOAUTH2';
//
////Fill in authentication details here
////Either the gmail account owner, or the user that gave consent
//$email = 'joao.sauro25081988@gmail.com';
//$clientId = '##################################';
//$clientSecret = '######################';
//
////Obtained by configuring and running get_oauth_token.php
////after setting up an app in Google Developer Console.
//$refreshToken = Config::REFRESH_TOKEN;
//////Create a new OAuth2 provider instance
//$provider = new Google(
//    [
//        'clientId' => $clientId,
//        'clientSecret' => $clientSecret,
//    ]
//);
//
////Pass the OAuth provider instance to PHPMailer
//$mail->setOAuth(
//    new OAuth(
//        [
//            'provider' => $provider,
//            'clientId' => $clientId,
//            'clientSecret' => $clientSecret,
//            'refreshToken' => $refreshToken,
//            'userName' => $email,
//        ]
//    )
//);
//
////Set who the message is to be sent from
////For gmail, this generally needs to be the same as the user you logged in as
//$mail->setFrom($email, 'First Last');
//
////Set who the message is to be sent to
//$mail->addAddress('bocao_013@hotmail.com');
//
////Set the subject line
//$mail->Subject = 'PHPMailer GMail XOAUTH2 SMTP test';
//$mail->Body = 'Teste de email api de email do PHP outro teste';
//$mail->AltBody = 'Teste de email do PHP';
////Read an HTML message body from an external file, convert referenced images to embedded,
////convert HTML into a basic plain-text alternative body
//$mail->CharSet = PHPMailer::CHARSET_UTF8;
////$mail->msgHTML(file_get_contents('contentsutf8.html'), __DIR__);
//
////Replace the plain text body with one created manually
////$mail->AltBody = 'This is a plain-text message body';
//
////Attach an image file
////$mail->addAttachment('images/phpmailer_mini.png');
//
////send the message, check for errors
//if (!$mail->send()) {
//    echo 'Mailer Error: ' . $mail->ErrorInfo;
//} else {
//    echo 'Message sent!';
//}
//} catch (Exception $ex) {
//    echo "Erro ao enviar a mensagem: {$mail->ErrorInfo}";
//}
//}
//<?php
//    require_once ('src/PHPMailer.php');
//    require_once ('src/SMTP.php');
//    require_once ('src/Exception.php');
//    
//    use PHPMailer\PHPMailer\PHPMailer;
//    use PHPMailer\PHPMailer\SMTP;
//    use PHPMailer\PHPMailer\Exception;
//    
//    function sendEmail($email, $message){
//        $mail = new PHPMailer(true);
//        try {
//            //$mail->SMTPDebug = 3;
//            //SMTP::DEBUG_SERVER;
//            $mail->isSMTP();
//            $mail->Host = 'smtp.gmail.com';
//            $mail->SMTPSecure = 'tls';
//            //PHPMailer::ENCRYPTION_SMTPS;
//            $mail->SMTPAuth = true;
//            //$mail->AuthType = 'XOAUTH2';
//            $mail->Username = 'joao.sauro25081988@gmail.com';
//            $mail->Password = '#####################';
//
//            //$mail->Password = '####################';
//            $mail->Port = 587;
//
//            $mail->setFrom('joao.sauro25081988@gmail.com');
//            
//            $mail->addAddress($email);
//
//            //######################################.apps.googleusercontent.com
//            //#######################
//            $mail->isHTML(true);
//            $mail->CharSet = PHPMailer::CHARSET_UTF8;
//            $mail->Subject = 'Teste de email api de email do PHP';
//            $mail->Body = $message;
//            $mail->AltBody = 'Teste de email do PHP';
//
//            if($mail->send()){
//                echo 'Email enviado com sucesso.<br>';
//            } else{
//                echo 'Email nao enviado.<br>';
//            }
//
//        } catch (Exception $ex) {
//            echo "Erro ao enviar a mensagem: {$mail->ErrorInfo}";
//        }
//    }
