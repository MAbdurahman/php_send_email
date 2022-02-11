<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);


    // composer autoload
    require dirname(__DIR__) . '/vendor/autoload.php';

    // twig
    Twig_Autoloader::register();

    // vlucas/phpdotenv
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();

    /**
     * Configure PHPMailer with your SMTP server settings
     */
    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = $_ENV['HOST'];
    $mail->Port = $_ENV['PORT'];
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['USERNAME'];
    $mail->Password = $_ENV['PASSWORD'];
    $mail->SMTPSecure = 'tls';


    /**
     * Enable SMTP debug messages
     */
//    $mail->SMTPDebug = 2;


    /**
     * Send an email
     */
    $email_to = 'm.abdurrah@gmail.com';
    $from = $_ENV['USERNAME'];
    $subject = "Message from $from";
    $message = 'This is a test!';

    $mail->isSMTP();
    $mail->Host = $_ENV['HOST'];
    $mail->Port = $_ENV['PORT'];
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['USERNAME'];
    $mail->Password = $_ENV['PASSWORD'];
    $mail->SMTPSecure = 'tls';
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);


    /**
     * Send an email
     */
    $mail->setFrom($_ENV['USERNAME']);
    $mail->addAddress($email_to, 'Mahdi');


// Add a different reply to address
//    $mail->addReplyTo('yrud1@hotmail.com');


    // Multiple "To" addresses
//    $mail->addAddress('mahdi_abdurrahman@comcast.net', 'Mahdi Abdurrahman');
//    $mail->addAddress('mdabdurrahman@comcast.net', 'M D Abdurrahman');

// "Cc" addresses
//    $mail->addCC('mdbdrrhm@icloud.com', 'Mahdi');
//    $mail->addCC('m.abdurrah@gmail.com', 'Mahdi');


// "Bcc" addresses
//    $mail->addBCC('mdbdrrhm@gmail.com');


    $mail->Subject = 'An email sent from PHP';

    $mail->Body = '<h1 style="font-style: italic;">Hello</h1>'
        . "\n"
        . '<p style="color: #f00;">This is an email with some <span style="color: #0000cd">CSS styles</span>.</p>';

    $mail->AltBody = "Hello.\nThis is the body in plain text for non-HTML mail clients";

//    $mail->Body = '<h2>External Image</h2>'
//        . '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/Red_Apple.jpg/265px-Red_Apple.jpg">'
//        . "\n"
//        . '<h2>Embedded Image</h2>'
//        . '<img src="cid:banana">';
//
//    $mail->AddEmbeddedImage(dirname(__FILE__) . '/banana.png', 'banana');

//    $mail->Body    = '<h1>Hello!</h1> <p>This <strong>email</strong> has been sent from PHP!</p>';
//    $mail->addAttachment(dirname(__FILE__) . '/example.pdf');
//
//    $mail->setFrom($_ENV['USERNAME']);
//    $mail->addAddress($email);
//    $mail->addReplyTo($_ENV['USERNAME']);
//
//
//    $mail->isHTML(true);
//    $mail->Subject = $subject;
//    $mail->Body = <<<EOT
//                    <h2 style="color: #333333">Email From $from</h2>
//                    <p>ReplyTo: &nbsp;<strong> $email; </strong></p>
//                    <p>Subject: &nbsp;<strong> $subject;</strong></p>
//                    <p>Message: &nbsp;<strong> $message; </strong></p>
//                    EOT;

    if ($mail->send()) {
        echo 'Message sent!';
    } else {
        echo 'Mailer error: ' . $mail->ErrorInfo;
    }


