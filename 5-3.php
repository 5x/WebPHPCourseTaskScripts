<?php

/******************************************************************************
 * Создайте форму аутентификации на основе сессий. Скрипт должен принимать
 * решение о допуске/недопуске пользователя на страницу, в зависимости от
 * правильности его учетных данных.
 *****************************************************************************/

session_start();

if (isset($_SESSION['uid'])) {
    if (isset($_GET['logout'])) {
        session_unset();
        session_destroy();
        header("Location: " . $_SERVER['PHP_SELF']);
    } else {
        echo('You access to protected part of page. <a href="?logout">Logout</a>');
    }
} elseif (isset($_POST['email']) && isset($_POST['passwd'])) {
    $email = htmlspecialchars($_POST['email']);
    $passwd = $_POST['passwd'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === False &&
        strlen($passwd) >= 3
    ) {
        $passwd = sha1($passwd);
        // Check user input in DB.
        $_SESSION['uid'] = md5($email);
        header("Location: " . $_SERVER['PHP_SELF']);
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
    <form action="5-3.php" method="POST">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required>
        <label for="passwd">Password: </label>
        <input type="password" name="passwd" id="passwd" pattern=".{3,}"
               required>
        <input type="submit" value="Login">
    </form>
    </body>
    </html>

<?php } ?>
