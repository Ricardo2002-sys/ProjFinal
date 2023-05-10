<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$photo = $queryBuilder->findById('photo', $id, 'App\Model\Photo');

if (isset($_SESSION['login']) && ($_SESSION['id'] == $photo->users_id)) {

    $photo_tags = $queryBuilder->findByField('photo_tags', 'photo_id', $photo->id, 'App\Model\Photo_Tags');
    $photo_tags_ids = [];
    foreach($photo_tags as $photo_tag){
        array_push($photo_tags_ids,$photo_tag->tag_id);
    }
    // fill relationship
    $cameras = $queryBuilder->getAll('camera', 'App\Model\Camera');
    $lenses = $queryBuilder->getAll('lens', 'App\Model\Lens');
    $tags = $queryBuilder->getAll('tags', 'App\Model\Tags');

    require 'views/photos/edit.view.php';

} else {
    redirect('home');
}
?>