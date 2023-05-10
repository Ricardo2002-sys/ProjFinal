<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$photo = $queryBuilder->findById('photo', $id, 'App\Model\Photo');
$photo_tags = $queryBuilder->findByField('photo_tags','photo_id', $photo->id, 'App\Model\Photo_Tags');
$photo_tags_ids = [];
foreach($photo_tags as $photo_tag){
    array_push($photo_tags_ids,$photo_tag->tag_id);
}
$tags = $queryBuilder->getAll('tags','App\Model\Tags');

// fill relationship
$photo->camera = $queryBuilder->findById('camera', $photo->camera_id, 'App\Model\Camera');
$photo->lens = $queryBuilder->findById('lens', $photo->lens_id, 'App\Model\Lens');

require 'views/photos/show.view.php';
?>