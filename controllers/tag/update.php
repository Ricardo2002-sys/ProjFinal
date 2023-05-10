<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

if (isset($_SESSION['login']) && ($_SESSION['role_id'] == '2')) {

    $connection = Connection::make();
    $queryBuilder = new QueryBuilder($connection);

    $queryBuilder->update('tags', $id, [
        'description' => $_POST['description']
    ]);

    redirect('tags');

} else {
    redirect('home');
}

?>