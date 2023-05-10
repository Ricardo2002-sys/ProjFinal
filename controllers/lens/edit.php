<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

if (isset($_SESSION['login']) && ($_SESSION['role_id'] == '2')) {

    $connection = Connection::make();
    $queryBuilder = new QueryBuilder($connection);

    $lens = $queryBuilder->findById('lens', $id, 'App\Model\Lens');
    // fill relationship

    $lenses = $queryBuilder->getAll('lens', 'App\Model\Lens');

    require 'views/admin/lens/edit.view.php';

} else {
    redirect('home');
}

?>