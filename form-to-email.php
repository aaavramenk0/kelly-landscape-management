<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail -> CharSet = 'UTF-8';
    $mail -> setLanguage('en', 'phpmailer/language/');
    $mail -> IsHTML(true);


    // Who will send the email
    $mail -> setFrom('alex.avramenko2004@gmail.com', 'Hi, I am Oleksandr');
    // Who will get the letter 
    $mail -> addAdress('alex.avramenko2009@gmail.com');
    // Mail subject
    $mail -> Subject = 'Hi, I am Oleksandr';

    // Mail body
    $body = '<h1>We got your message</h1>';

    if(trim(!empty($_POST['name']))){
        $body. = '<p><strong>Name:</strong> '.$_POST['name'].'</p>';
    }
    if(trim(!empty($_POST['mail']))){
        $body. = '<p><strong>E-mail:</strong> '.$_POST['mail'].'</p>';
    }
    if(trim(!empty($_POST['address']))){
        $body. = '<p><strong>Address:</strong> '.$_POST['address'].'</p>';
    }
    if(trim(!empty($_POST['city']))){
        $body. = '<p><strong>City:</strong> '.$_POST['city'].'</p>';
    }
    if(trim(!empty($_POST['zip']))){
        $body. = '<p><strong>Zip code:</strong> '.$_POST['zip'].'</p>';
    }
    if(trim(!empty($_POST['message']))){
        $body. = '<p><strong>Your message:</strong> '.$_POST['message'].'</p>';
    }

    $mail->Body = $body;

    // Sending
    if(!$mail->send()){
        $message = "Error";
    } else {
        $message = "Your response was successfully submitted!";
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);
?>