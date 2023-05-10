<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$user = $queryBuilder->findById('users', $id, 'App\Model\Users');

if (isset($_SESSION['login']) && ($_SESSION['id'] == $user->id)) {

    require 'views/users/edit.view.php';

} else {
    redirect('home');
}

?>