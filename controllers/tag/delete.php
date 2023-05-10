<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

if (isset($_SESSION['login']) && ($_SESSION['role_id'] == '2')) {

    $connection = Connection::make();
    $queryBuilder = new QueryBuilder($connection);

    $tag = $queryBuilder->deleteById('tags', $id);

    redirect('tags');

} else {
    redirect('home');
}

?>