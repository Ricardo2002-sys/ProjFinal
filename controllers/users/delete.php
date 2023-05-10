<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$user = $queryBuilder->findById('users', $id, 'App\Model\Users');

if (isset($_SESSION['login']) && (($_SESSION['role_id'] == '2') | ($_SESSION['id'] == $user->id))) {

    $user = $queryBuilder->deleteById('users', $id);

    if ($_SESSION['role_id'] == '2') {
        redirect('users');
    } else {
        redirect('logout');
    }

} else {
    redirect('home');
}

?>