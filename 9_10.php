<?php

/******************************************************************************
 * Создайте класс User со свойствами name, login password. Создайте три
 * объекта не его основе. Задайте значения свойств объектам.
 *
 * В классе User опишите метод getInfo(), выводящий значения свойств объекта.
 * Вызовите метод для всех объектов.
 *
 * В классе User опишите конструктор, который будет задавать начальные
 * значения свойствам объекта.
 *****************************************************************************/
class User {
    static $count = 0;
    public $name;
    public $login;
    public $password;

    function __construct($name = '', $login = '', $password = '') {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        self::$count++;
    }

    function getInfo() {
        echo("$this->login: $this->name, $this->password\n");
    }
}

$user1 = new User();
$user1->name = 'Ivan';
$user1->login = 'ivan79';
$user1->password = 'Box can run!';

$user2 = new User('Petro', 'deRjj', 'yeah_honey31');
$user3 = new User('Dmitriy', 'flock__YY', '12345678');

$user1->getInfo();
$user2->getInfo();
$user3->getInfo();


/******************************************************************************
 * Опишите класс SuperUser на основе класса User. В классе опишите
 * свойство $role и метод getInfo().
 *
 * Опишите конструктор, в котором генерируйте исключение если введены не все
 * данные. Опишите перехват исключения и выведите сообщение об ошибке.
 *
 * В классах User и SuperUser опишите статические свойства для подсчета
 * количества объектов. Присвойте этим свойствам начальные значения (0), в
 * конструкторе инкрементируйте их. После создания объектов, выведите
 * количество объектов на экран.
 *****************************************************************************/
class SuperUser extends User {
    public $role;
    static $count = 0;

    function __construct($name = '', $login = '', $password = '', $role = '') {
        self::$count++;
        try {
            if (strlen($name) <= 0 || strlen($login) <= 0 ||
                strlen($password) <= 0 || strlen($role) <= 0
            ) {
                throw new Exception('Введены не все данные.');
            }
        } catch (Exception $e) {
            echo($e->getMessage());
        }
        parent::__construct($name, $login, $password);
        $this->role = $role;
    }

    function getInfo() {
        echo("$this->login: $this->name, $this->password, $this->role\n");
    }
}

$s_user = new SuperUser('Andrey', 'andrey82', '12345678', 'admin');
$s_user->getInfo();

$s_user_broken = new SuperUser('Broken obj..');

echo("\nUser count: " . User::$count . "\nSuper user count: " .
    SuperUser::$count);
