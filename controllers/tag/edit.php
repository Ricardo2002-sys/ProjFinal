<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

if (isset($_SESSION['login']) && ($_SESSION['role_id'] == '2')) {

    $connection = Connection::make();
    $queryBuilder = new QueryBuilder($connection);

    $tag = $queryBuilder->findById('tags', $id, 'App\Model\Tags');
    // fill relationship

    $tags = $queryBuilder->getAll('tags', 'App\Model\Tags');


    require 'views/admin/tag/edit.view.php';

} else {
    redirect('home');
}

?>