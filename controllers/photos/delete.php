<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$photo = $queryBuilder->findById('photo', $id, 'App\Model\Photo');

if (isset($_SESSION['login']) && (($_SESSION['role_id'] == '2') | ($_SESSION['id'] == $photo->users_id))) {
    
    if (file_exists($photo->path)) {
        unlink($photo->path); // delete the old file
    }

    $photo = $queryBuilder->deleteById('photo', $id);


    redirect('photos');

} else {
    redirect('home');
}
?>