<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

if (isset($_SESSION['login']) && ($_SESSION['role_id'] == '2')) {

    $connection = Connection::make();
    $queryBuilder = new QueryBuilder($connection);

    $cameras = $queryBuilder->getAll('camera', 'App\Model\Camera');

    require 'views/admin/camera/index.view.php';

} else {
    redirect('home');
}

?>