<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

if (isset($_SESSION['login']) && ($_SESSION['role_id'] == '2')) {

    $connection = Connection::make();
    $queryBuilder = new QueryBuilder($connection);

    $lenses = $queryBuilder->getAll('lens', 'App\Model\lens');

    require 'views/admin/lens/index.view.php';

} else {
    redirect('home');
}

?>