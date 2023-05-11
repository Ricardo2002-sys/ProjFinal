<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

if (isset($_SESSION['login']) && (($_SESSION['role_id'] == '1') | ($_SESSION['role_id'] == '2'))) {

    $connection = Connection::make();
    $queryBuilder = new QueryBuilder($connection);

    $photos = $queryBuilder->getAll('photo', 'App\Model\Photo');
    
    // Searching
    if (isset($_POST['search'])) {
        $value = $_POST['search'];
        $photos = $queryBuilder->search('photo', 'name', $value, 'App\Model\Photo');
    }
    //Filter
    $cameras = $queryBuilder->getAll('camera', 'App\Model\Camera');
    $lenses = $queryBuilder->getAll('lens', 'App\Model\Lens');
    if (isset($_POST['camera'])) {
        $field = $_POST['camera'];
        $photos = $queryBuilder->findByField('photo', 'camera_id', $field, 'App\Model\Photo');
    }
    if (isset($_POST['lens'])) {
        $field = $_POST['lens'];
        $photos = $queryBuilder->findByField('photo', 'lens_id', $field, 'App\Model\Lens');
    }

    // Ordering
    if (isset($_POST['parameter'])) {
        $parameter = $_POST['parameter'];
        $dir = $_POST['dir'];
        $dirs = ['ASC', 'DESC'];
        $parameters = ['name', 'date','aperture','iso','shutter_speed'];
        if (!in_array($dir, $dirs)) {
            $dir = 'ASC';
        }
        // Order Photos
        if (in_array($parameter, $parameters)) {
            $photos = $queryBuilder->orderBy('photo', $parameter, $dir, 'App\Model\Photo');
        }
    }

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