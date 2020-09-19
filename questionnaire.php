<?php

require __DIR__ . '/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$username = $_ENV['USERNAME'];
$password = $_ENV['PASSWORD'];




if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $organization = $_POST['organization'];
    $email = $_POST['email'];

    $mail = new PHPMailer();
    $mail->IsSMTP();

    $mail->SMTPDebug  = SMTP::DEBUG_SERVER;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = $username;
    $mail->Password   = $password;

    $mail->IsHTML(true);
    $mail->AddAddress("cbcoders20chris@gmail.com", "Chris");
    $mail->SetFrom("cbcoders20chris@gmail.com", "Chris");
    // $mail->AddReplyTo("reply-to-email", "reply-to-name");
    // $mail->AddCC("cc-recipient-email", "cc-recipient-name");
    $mail->Subject = "New Questionaaire form for ";
    $content = "<b>This is a Test $first_name Email sent via Gmail SMTP Server using PHP mailer class.</b>";

    $mail->MsgHTML($content); 
    if(!$mail->Send()) {
    echo "Error while sending Email.";
    var_dump($mail);
    } else {
    echo "Email sent successfully";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="questionnaire.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Libre+Baskerville:ital@1&display=swap"
        rel="stylesheet">
    <title>Questionnaire / CBCoders </title>
</head>

<body>
    <div class="container">
        <div class="content">
            <h1 id="title">CBCoders Website Questionnaire</h1><span><img class="logo"
                    src="https://cdn.discordapp.com/attachments/754425697237467150/755120803166683387/cbcoders.png"
                    alt="" srcset=""></span>
            <p id="description">Please let us know how we can serve you.</p>
            <hr>
            <form id="survey-form">
                <fieldset id="top">
                    <legend>Personal Information</legend>
                    <span class="form-group"><label id="name-label" for="name">Name: </label><input id="name"
                            type="text" name="name" required placeholder="Enter Your Name"></span>
                    <span class="form-group"><label id="name-label" for="name">Organization: </label><input id="orgName"
                            type="text" name="organization" required placeholder="Enter Your Organization"></span>
                    <span class="form-group"><label id="email-label" for="email">Email: </label><input id="email"
                            type="email" name="email" min="0" max="130" placeholder="Enter Your Email"></span>
                </fieldset>
                <fieldset>
                    <legend>Tell Us A Little About Your Current Website</legend>
                    <span class="form-group">
                        <label id="comments-label">
                            <ul>
                                <li>What do you love about the current version of website, or not love?</li>
                                <li>What do you find frustrating about your website, how or why is frustrating?</li>
                                <li>What apects of your website diminish your user's experience or are frustrating to your site users?</li>
                            </ul>
                        </label>
                        <textarea id="comment" placeholder="Enter your response here..." rows="10"></textarea>
                    </span>
                </fieldset>
                <fieldset>
                    <legend>Let's Talk About The Future</legend>
                    <span class="form-group">
                        <label id="comments-label">
                            <ul>
                                <li>What needs or goals do you expect from your website that aren’t being
                                    met by the current version?</li>
                                <li>What is the purpose of your website, what should your website achieve?</li>
                                <li>What function does your website serve your brand?</li>
                                <li>What do you expect visitors accomplish when they visit your website?</li>
                                <li>Who is the website's intended target audience, who are you speaking to?</li>
                                <li>What image, look, or feel do you want your brand’s website to portray?</li>
                            </ul>
                        </label>
                        <textarea id="comment0" placeholder="Enter your response here..." rows="10" cols="50"></textarea>
                    </span>
                </fieldset>
                <fieldset>
                    <span class="form-group">
                        <label id="comments-label">When analyzing your competitors’ sites, what do you like and not like
                            about their websites?</label>
                        <textarea id="comment1" placeholder="Enter your response here..." rows="10"></textarea>
                    </span>
                </fieldset>
                <fieldset>
                    <span class="form-group">
                        <label id="comments-label">What is the project timeline?</label>
                        <textarea id="comment2" placeholder="Enter your response here..." rows="10"></textarea>
                    </span>
                </fieldset>
                <fieldset>
                    <span class="form-group">
                        <label id="comments-label">Which functions or features are necessary to have,  versus nice to
                            have?</label>
                        <textarea id="comment3" placeholder="Enter your response here..." rows="10"></textarea>
                    </span>
                </fieldset>
                <fieldset>
                    <span class="form-group">
                        <label id="comments-label">What are the most important calls-to-action (CTAs) on your
                            site?</label>
                        <textarea id="comment4" placeholder="Enter your response here..." rows="10"></textarea>
                    </span>
                </fieldset>
                <fieldset>
                    <span class="form-group">
                        <label id="comments-label">How much traffic are you anticipating?</label>
                        <textarea id="comment5" placeholder="Enter your response here..." rows="10"></textarea>
                    </span>
                </fieldset>
                <fieldset>
                    <span class="form-group">
                        <label id="comments-label">What is the most important information your site must relay to the
                            user, especially on the home page?</label>
                        <textarea id="comment6" placeholder="Enter your response here..." rows="10"></textarea>
                    </span>
                </fieldset>
                <div class="button">
                    <button id="submit" class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
                </div>
            </form>
        </div>
        <footer class="text-center my-5 py-5">
            Made by <a href="https://github.com/communitybuildingcoders" target="_blank" rel="noopener noreferrer">
                CBCoders </a>.
        </footer>
    </div>
    </div>
    </div>
    <script src="questionnaire.js"></script>
</body>

</html>