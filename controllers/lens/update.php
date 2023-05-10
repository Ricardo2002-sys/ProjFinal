<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

if (isset($_SESSION['login']) && ($_SESSION['role_id'] == '2')) {

    $queryBuilder->update('lens', $id, [
        'brand' => $_POST['brand'],
        'focal_lenght' => $_POST['focal_lenght'],
        'aperture' => $_POST['aperture'],
        'mount' => $_POST['mount'],
        'ring_size' => $_POST['ring_size']
    ]);

    redirect('lenses');

} else {
    redirect('home');
}

?>