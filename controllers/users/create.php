<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

if (isset($_SESSION['login'])) { // user already logged in
    redirect('home');
} else {

    $roles = $queryBuilder->getAll('roles', 'App\Model\Roles');

    require 'views/users/create.view.php';
}
?>