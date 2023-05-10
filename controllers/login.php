<?php

$appName = 'Share a pic';

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

if (isset($_SESSION['login'])) { // user already logged in
    redirect('logout');

} else {

    $users = $queryBuilder->getAll('users', 'App\Model\Users');

    require 'views/login.view.php';
}