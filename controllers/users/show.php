<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$user = $queryBuilder->findById('users', $id, 'App\Model\Users');

if (isset($_SESSION['login'])) {
    // fill relationship
    $user->role = $queryBuilder->findById('roles', $user->role_id, 'App\Model\Roles');
    $photos = $queryBuilder->getAll('photo', 'App\Model\Photo');
    foreach ($photos as $photo) {
        $photo->camera = $queryBuilder->findById('camera', $photo->camera_id, 'App\Model\Camera');
        $photo->lens = $queryBuilder->findById('lens', $photo->lens_id, 'App\Model\Lens');
    }
    require 'views/users/show.view.php';

} else {
    redirect('login');
}

?>