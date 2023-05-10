<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

if (isset($_SESSION['login']) && ($_SESSION['role_id'] == '2')) {

    $connection = Connection::make();
    $queryBuilder = new QueryBuilder($connection);

    $lens = $queryBuilder->deleteById('lens', $id);

    redirect('lenses');

} else {
    redirect('home');
}

?>