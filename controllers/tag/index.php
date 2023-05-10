<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

if (isset($_SESSION['login']) && ($_SESSION['role_id'] == '2')) {

    $connection = Connection::make();
    $queryBuilder = new QueryBuilder($connection);

    $tags = $queryBuilder->getAll('tags', 'App\Model\Tags');

    require 'views/admin/tag/index.view.php';

} else {
    redirect('home');
}

?>