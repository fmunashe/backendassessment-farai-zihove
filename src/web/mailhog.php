<?php
$to      = 'nobody@example.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: webmaster@example.com';

$mail = mail($to, $subject, $message, $headers);

if ($mail) {
    echo "The email message was sent.\n";
} else {
    echo "The email message was not sent.\n";
}
