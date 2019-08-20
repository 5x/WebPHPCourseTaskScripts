<?php

/******************************************************************************
 * Создайте скрипт, который отправляет на ваш e-mail произвольное сообщение.
 *****************************************************************************/

if (isset($_POST['email']) && isset($_POST['subject']) &&
    isset($_POST['message'])
) {
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === False &&
        strlen($subject) > 0 && strlen($message) > 0
    ) {
        mail($email, $subject, $message);
    }
} else {
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>5-4</title>
    </head>
    <body>
    <form action="5-4.php" method="POST">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email">
        <label for="subject">Subject:</label>
        <input type="text" name="subject" id="subject">
        <label for="message">Message:</label>
        <textarea name="message" id="message" cols="30" rows="10"></textarea>
        <input type="submit" value="Send">
    </form>
    </body>
    </html>
    <?php
}
