<?php

/******************************************************************************
 * Создайте соединение с произвольным хостом. Сформируйте HTTP-запрос и
 * отправьте его. Получите ответ, выведите его в браузер. Закройте соединение.
 *****************************************************************************/

$host = "stackoverflow.com";

$socket = fsockopen($host, 80, $sock_err_code, $sock_err_msg, 60);

if ($socket) {
    $request = "GET / HTTP/1.0\r\nHost: $host\r\nUser-Agent: Mozilla/5.0 (Windows NT 6.2; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0\r\n\r\n";

    fwrite($socket, $request);

    while (!feof($socket)) {
        echo(fgets($socket, 4096));
    }
} else {
    echo("Socket error($sock_err_code): $sock_err_msg");
}

fclose($socket);
