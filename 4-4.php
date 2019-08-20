<?php

/******************************************************************************
 * Создайте таблицу, которая будет основой одностраничного сайта.
 * Разделите таблицу и вынесите части в отдельные файлы (top.php, menu.php,
 * bottom.php). Подключите части в исходный скрипт.
 *****************************************************************************/

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>4-4</title>
</head>
<body>
<?php require('4-4_top.php') ?>
<?php require('4-4_menu.php') ?>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Value</th>
    </tr>
    <tfoot>
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Value</th>
    </tr>
    </tfoot>
    </thead>
    <tbody>
    <tr>
        <td>Ivan</td>
        <td>25</td>
        <td>01414</td>
    </tr>
    <tr>
        <td>Ivan</td>
        <td>25</td>
        <td>01414</td>
    </tr>
    <tr>
        <td>Ivan</td>
        <td>25</td>
        <td>01414</td>
    </tr>
    <tr>
        <td>Ivan</td>
        <td>25</td>
        <td>01414</td>
    </tr>
    <tr>
        <td>Ivan</td>
        <td>25</td>
        <td>01414</td>
    </tr>
    <tr>
        <td>Ivan</td>
        <td>25</td>
        <td>01414</td>
    </tr>
    </tbody>
</table>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aut dolore
    illo incidunt maiores minus natus odio repellat vel voluptas! Atque
    consequuntur dolor, explicabo fuga ipsam iure nisi quas, ratione rem, sed
    similique tempora unde voluptatum? Ab adipisci distinctio et harum laborum
    maxime molestias necessitatibus, quia sapiente sequi tempore vitae.</p>

<p>Aliquid dignissimos ipsum libero necessitatibus numquam, obcaecati officiis
    quia repellat soluta voluptatum. Aperiam commodi dignissimos dolorem
    dolores esse excepturi explicabo facilis fuga incidunt minima minus
    mollitia obcaecati, optio perspiciatis repellat saepe sapiente soluta
    tempora ut voluptate. Aperiam consectetur corporis dolorem eveniet ipsum
    iure molestias mollitia totam! Ex exercitationem quasi quis.</p>

<p>Adipisci, aliquid amet blanditiis distinctio dolor dolores eos facilis hic,
    impedit incidunt iusto laudantium magni mollitia natus pariatur porro quos
    temporibus unde veritatis vitae. A, aliquid animi architecto assumenda, aut
    commodi corporis culpa cumque doloremque enim ex fugiat in iusto mollitia
    necessitatibus nisi nobis odio porro quam quia quisquam ratione.</p>
<?php require('4-4_bottom.php') ?>
</body>
</html>
