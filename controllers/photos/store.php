<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

if (isset($_SESSION['login']) && ($_SESSION['role_id'] == '1')) {

    $connection = Connection::make();
    $queryBuilder = new QueryBuilder($connection);

    $target_path = 'images/' . $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $target_path);

    $queryBuilder->create('photo', [
        'name' => $_POST['name'],
        'date' => $_POST['date'],
        'description' => $_POST['description'],
        'aperture' => $_POST['aperture'],
        'iso' => $_POST['iso'],
        'shutter_speed' => $_POST['shutter_speed'],
        'white_balance' => $_POST['white_balance'],
        'path' => $target_path,
        'hash' => $_POST['hash'],
        'extension' => $_POST['extension'],
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
    redirect('login');
}

?>