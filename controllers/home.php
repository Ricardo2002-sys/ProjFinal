<?php

$appName = 'Share your photo';

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$photos = $queryBuilder->getAll('photo', 'App\Model\Photo');

// Searching
if (isset($_POST['search'])) {
    $value = $_POST['search'];
    $photos = $queryBuilder->search('photo', 'name', $value, 'App\Model\Photo');  
}
//Filter
$cameras = $queryBuilder->getAll('camera','App\Model\Camera');
$lenses = $queryBuilder->getAll('lens','App\Model\Lens');
$users = $queryBuilder->getAll('users','App\Model\Users');
if (isset($_POST['camera'])) {
    $field = $_POST['camera'];
    $photos = $queryBuilder->findByField('photo','camera_id',$field,'App\Model\Photo');
}
if (isset($_POST['lens'])) {
    $field = $_POST['lens'];
    $photos = $queryBuilder->findByField('photo','lens_id',$field,'App\Model\Lens');
}
if (isset($_POST['user'])) {
    $field = $_POST['user'];
    $photos = $queryBuilder->findByField('photo','users_id',$field,'App\Model\Users');
}

// Ordering
if (isset($_POST['parameter'])) {
    $parameter = $_POST['parameter'];
    $dir = $_POST['dir'];
    $dirs = ['ASC', 'DESC'];
    $parameters = ['name', 'date'];
    if (!in_array($dir, $dirs)) {
        $dir = 'ASC';
    }
    // Order Photos
    if (in_array($parameter, $parameters)) {
        $photos = $queryBuilder->orderBy('photo', $parameter, $dir, 'App\Model\Photo');
    }
}

foreach ($photos as $photo) {

    $photo->user = $queryBuilder->findById('users', $photo->users_id, 'App\Model\Users');
    $photo->camera = $queryBuilder->findById('camera', $photo->camera_id, 'App\Model\Camera');
    $photo->lens = $queryBuilder->findById('lens', $photo->lens_id, 'App\Model\Lens');
}

require 'views/home.view.php';