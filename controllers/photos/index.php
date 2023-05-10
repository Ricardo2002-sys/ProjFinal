<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

if (isset($_SESSION['login']) && (($_SESSION['role_id'] == '1') | ($_SESSION['role_id'] == '2'))) {

    $connection = Connection::make();
    $queryBuilder = new QueryBuilder($connection);

    $photos = $queryBuilder->getAll('photo', 'App\Model\Photo');

    // fill relationship
    foreach ($photos as $photo) {
        $photo->camera = $queryBuilder->findById('camera', $photo->camera_id, 'App\Model\Camera');
        $photo->lens = $queryBuilder->findById('lens', $photo->lens_id, 'App\Model\Lens');
    }

    require 'views/photos/index.view.php';

} else {
    redirect('login');
}
?>