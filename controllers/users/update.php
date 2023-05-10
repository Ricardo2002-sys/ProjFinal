<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$user = $queryBuilder->findById('users', $id, 'App\Model\Users');

if (isset($_SESSION['login']) && ($_SESSION['id'] == $user->id)) {

    $queryBuilder->update('users',$id, [
        'name' => $_POST['name'],
        'username' => $_POST['username'],
        'age' => $_POST['age'],
        'email' => $_POST['email'],
        'adress' => $_POST['adress'],
        'role_id' => 1,
        //role1 = user
        'passwd' => $user->passwd 
    ]);

    redirect('users/'.$user->id);

} else {
    redirect('home');
}

?>