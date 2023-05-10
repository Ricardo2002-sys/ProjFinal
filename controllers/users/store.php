<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

if (isset($_SESSION['login'])) { // user already logged in
    redirect('home');
} else {
    $queryBuilder->create('users', [
        'name' => $_POST['name'],
        'username' => $_POST['username'],
        'age' => $_POST['age'],
        'email' => $_POST['email'],
        'adress' => $_POST['adress'],
        'role_id' => 1,
        //role1 = user
        'passwd' => password_hash($_POST['passwd'], PASSWORD_DEFAULT) //hash da password
    ]);

    redirect('login');
}
?>