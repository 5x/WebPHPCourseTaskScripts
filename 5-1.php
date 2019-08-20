<?php

/******************************************************************************
 * Создайте скрипт с формой для ввода логина и пароля. После прохождения
 * аутентификации, учетные данные пользователя должны записываться в файл.
 *****************************************************************************/


if (isset($_POST['email']) && isset($_POST['passwd'])) {
    $email = htmlspecialchars($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === False) {
        $passwd = sha1($_POST['passwd']);
        $file = fopen('5_login_dump.txt', 'a');

        fwrite($file, "$email $passwd\n");
        fclose($file);

        echo('User data added to file');
    } else {
        echo('Incorrect data');
    }
} else {
    ?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>5-1</title>
    </head>
    <body>
    <form action="5-1.php" method="POST">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required>
        <label for="passwd">Password: </label>
        <input type="password" name="passwd" id="passwd" pattern=".{3,}"
               required>
        <input type="submit" value="Login">
    </form>
    </body>
    </html>

    <?php
}
