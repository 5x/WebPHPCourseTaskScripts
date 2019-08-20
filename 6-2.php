<?php

/******************************************************************************
 * Создайте веб-форму для добавления пользователей в БД. Добавьте несколько
 * пользователей. Выведите добавленных пользователей в HTML-таблице под формой.
 *****************************************************************************/

// Database connection settings
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'test_user');
define('DB_PASSWORD', '__DB_PASSWD__');
define('DB_DATABASE', 'web_labs_db');
define('CONN_STR', 'mysql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE);

try {
    $db = new PDO(CONN_STR, DB_USERNAME, DB_PASSWORD);
} catch (PDOException $e) {
    die($e->getMessage());
}

if (isset($_POST['user']) && isset($_POST['passwd'])) {
    $user = htmlspecialchars($_POST['user'], ENT_HTML5 | ENT_QUOTES);
    $passwd = htmlspecialchars($_POST['passwd'], ENT_HTML5 | ENT_QUOTES);

    if (strlen($user) > 0) {
        $sql = $db->prepare("INSERT INTO users (user, password) VALUES (?, ?)");
        $sql->execute(array($user, $passwd));
    }
}
$res = $db->query("SELECT user, password FROM users", PDO::FETCH_LAZY);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>6-2</title>
</head>
<body>
<form action="6-2.php" method="POST">
    <label for="user">User name: </label>
    <input type="text" name="user" id="user">
    <label for="passwd">Password: </label>
    <input type="password" name="passwd" id="passwd">
    <input type="submit" value="Add user">
</form>

<table>
    <thead>
    <tr>
        <td>User</td>
        <td>Password</td>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($res as $row) {
        echo('<tr><td>' . $row['user'] . '</td><td>' .
            $row['password'] . '</td></tr>');
    }
    ?>
    </tbody>
</table>
</body>
</html>

<?php $db = null; ?>
