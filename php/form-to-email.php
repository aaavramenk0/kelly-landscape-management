<?php

if(isset($_POST['submit'])) {
    $mail_to = "alex.avramenko2004@gmail.com";
    $name = $_POST['name'];
    $customer_mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $subject_line = "Someone submit a form."
    $client_subject_line = "We received your form | Kelly Landscapes Management";


    $client_info_message = "Customer name: $name. \n 
                Phone number: $phone.\n
                Customer message: $message.\n"

    $confirmal_client_message = "Dear $name. We received your form.Thank you! Our administrator contact you within 24 hours. \n\n -- Kelly Landscapes Management"


    $headers_from = "From: $customer_mail";
    $headers_to = "To: $mail_to";


    $result = mail($mail_to, $subject_line, $client_info_message, $headers_from);
    $client_result = mail($customer_mail, $client_subject_line, $confirmal_client_message, $headers_to);

    if ($result && $client_result) {
        $success = "Message was sent succefully!"
    } else {
        
    }

}
?>