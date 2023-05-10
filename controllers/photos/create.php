<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

if (isset($_SESSION['login']) && ($_SESSION['role_id'] == '1')) {

    $connection = Connection::make();
    $queryBuilder = new QueryBuilder($connection);

    $photos = $queryBuilder->getAll('photo', 'App\Model\Photo');
    $cameras = $queryBuilder->getAll('camera', 'App\Model\Camera');
    $lenses = $queryBuilder->getAll('lens', 'App\Model\Lens');
    $tags = $queryBuilder->getAll('tags', 'App\Model\Tags');

    require 'views/photos/create.view.php';

} else {
    redirect('login');
}

?>