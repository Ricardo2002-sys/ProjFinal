<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

if (isset($_SESSION['login']) && ($_SESSION['role_id'] == '2')) {

    $connection = Connection::make();
    $queryBuilder = new QueryBuilder($connection);

    $users = $queryBuilder->getAll('users', 'App\Model\Users');
    // fill relationship
    foreach ($users as $user) {
        $user->role = $queryBuilder->findById('roles', $user->role_id, 'App\Model\Roles');
    }

    require 'views/users/index.view.php';

} else {
    redirect('home');
}

?>