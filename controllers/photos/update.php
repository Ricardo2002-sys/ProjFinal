<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$photo = $queryBuilder->findById('photo', $id, 'App\Model\Photo');

if (isset($_SESSION['login']) && ($_SESSION['id'] == $photo->users_id)) {

    $queryBuilder->deleteByField('photo_tags','photo_id',$photo->id);

    $queryBuilder->update('photo', $id, [
        'name' => $_POST['name'],
        'date' => $_POST['date'],
        'description' => $_POST['description'],
        'aperture' => $_POST['aperture'],
        'iso' => $_POST['iso'],
        'shutter_speed' => $_POST['shutter_speed'],
        'white_balance' => $_POST['white_balance'],
        'path' => $photo->path,
        'hash' => $photo->hash,
        'extension' => $photo->extension,
        'users_id' => $_SESSION['id'],
        'camera_id' => $_POST['camera_id'],
        'lens_id' => $_POST['lens_id']
    ]);

    $photo = $queryBuilder->findFirstByField('photo', 'name', $_POST['name'], 'App\Model\Photo');

    $tags = $_POST['tag_id'];

    foreach ($tags as $tag) {

        $queryBuilder->create('photo_tags', [
            'photo_id' => $photo->id,
            'tag_id' => $tag,
        ]);
    }
    
    redirect('photos');

} else {
    redirect('home');
}
?>