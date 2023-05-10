<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$camera = $queryBuilder->findById('camera', $id, 'App\Model\Camera');
$photos = $queryBuilder->getAll('photo','App\Model\Photo');
foreach ($photos as $photo) {
    $photo->user = $queryBuilder->findById('users', $photo->users_id, 'App\Model\Users');
}

require 'views/admin/camera/show.view.php';