<?php // Swift Mailer Library
require_once 'C:\xampp\htdocs\Sendmail\New folder\swiftmailer-5.x\swiftmailer-5.x\lib/swift_required.php';

// Mail Transport
$transport = Swift_SmtpTransport::newInstance('ssl://smtp.gmail.com', 465)
    ->setUsername('lemin2601@gmail.com') // Your Gmail Username
    ->setPassword('trungdinh1'); // Your Gmail Password

// Mailer
$mailer = Swift_Mailer::newInstance($transport);

// Create a message
$message = Swift_Message::newInstance('Wonderful Subject Here')
    ->setFrom(array('lemin2601@gmail.com' => 'Sender Name')) // can be $_POST['email'] etc...
    ->setTo(array('lemin2601@gmail.com' => 'Receiver Name')) // your email / multiple supported.
    ->setBody('Here is the <strong>message</strong> itself. It can be text or <h1>HTML</h1>.', 'text/html');

// Send the message
if ($mailer->send($message)) {
    echo 'Mail sent successfully.';
} else {
    echo 'I am sure, your configuration are not correct. :(';
}
?>