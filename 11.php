<?php

/******************************************************************************
 * Опишите класс Eshop, в нем определите свойство $db для хранения объекта БД.
 *
 * В конструкторе сделайте проверку на существование файла БД. Если база не
 * существует, создайте ее, а так же таблицу catalog в ней и соединитесь с БД.
 * В противном случае просто соединитесь с БД.
 *
 * В деструкторе закрывайте соединение с БД.
 *
 * В классе опишите метод insert(), который будет содержать SQL-запрос на
 * добавление данных в таблицу  catalog.
 *
 * Получите данные из формы, отфильтруйте их и сохраните в БД с помощью
 * вышеописанного метода.
 *
 * Выведите данные по строкам в составе HTML-таблицы.
 *****************************************************************************/
define('DB_FILE_NAME', '11_database.sq3');

class Eshop {
    protected $db;

    function __construct() {
        $this->createConnection((bool)file_exists(DB_FILE_NAME));
    }

    function __destruct() {
        unset($this->db);
    }

    private function createConnection($isExist) {
        try {
            $this->db = new PDO('sqlite:' . DB_FILE_NAME);
            if (!$isExist) {
                $this->createDB();
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    protected function createDB() {
        $sql = <<< 'SQL'
        CREATE TABLE catalog (
          id INTEGER PRIMARY KEY,
          title TEXT NOT NULL,
          price REAL NOT NULL,
          status INTEGER NOT NULL,
          description TEXT);
SQL;
        $this->execute($sql);
    }

    private function execute($query_string, array $values = null) {
        $query = $this->db->prepare($query_string);
        $query->execute($values);
        return $query;
    }

    function select() {
        $sql = 'SELECT * FROM catalog';
        return $this->execute($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function insert($title, $price = 0, $status = 1, $description = '') {
        $sql = 'INSERT INTO catalog (title, price, status, description) ' .
            'VALUES (?, ?, ?, ?)';
        $this->execute($sql, array($title, $price, $status, $description));
    }
}

$shop = new Eshop();

if (isset($_POST['title'])) {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT,
                        FILTER_FLAG_ALLOW_FRACTION);
    $status = filter_var($_POST['status'], FILTER_SANITIZE_NUMBER_INT);
    $desc = filter_var($_POST['desc'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (strlen($title) > 0) {
        if (filter_var($price, FILTER_VALIDATE_FLOAT) === false) {
            $price = .0;
        }
        if (filter_var($status, FILTER_VALIDATE_INT) === false) {
            $price = 1;
        }
        $shop->insert($title, $price, $status, $desc);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>11</title>
</head>
<body>
<h1>Lab 11</h1>

<form action="11.php" method="POST">
    <label for="title">Title: </label>
    <input type="text" name="title" id="title">
    <label for="price">Price: </label>
    <input type="text" name="price" id="price">
    <label for="status">Status: </label>
    <select name="status" id="status">
        <option value="1">available</option>
        <option value="2">expected</option>
        <option value="3">not available</option>
    </select>
    <label for="desc">Description: </label>
    <textarea name="desc" id="desc" cols="30" rows="5"></textarea>
    <input type="submit" value="Add item to catalog">
</form>

<table>
    <thead>
    <tr>
        <td>ID</td>
        <td>Title</td>
        <td>Price</td>
        <td>Status</td>
        <td>Description</td>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($shop->select() as $row) {
        echo('<tr><td>' . htmlentities($row['id'], ENT_QUOTES) . '</td><td>' .
            htmlentities($row['title'], ENT_QUOTES) . '</td><td>' .
            htmlentities($row['price'], ENT_QUOTES) . '</td><td>' .
            htmlentities($row['status'], ENT_QUOTES) . '</td><td>' .
            htmlentities($row['description'], ENT_QUOTES) . '</td></tr>');
    }
    ?>
    </tbody>
</table>
</body>
</html>

<?php unset($e_shop); ?>

</body>
</html>
