<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

if (isset($_SESSION['login']) && ($_SESSION['role_id'] == '2')) {

    $connection = Connection::make();
    $queryBuilder = new QueryBuilder($connection);

    $queryBuilder->update('camera', $id, [
        'brand' => $_POST['brand'],
        'model' => $_POST['model'],
        'sensor' => $_POST['sensor'],
        'resolution' => $_POST['resolution'],
        'focal_points' => $_POST['focal_points']
    ]);

    redirect('cameras');

} else {
    redirect('home');
}

?>