<?php
use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

if (isset($_SESSION['login'])) { // user already logged in
    redirect('logout');
} 
elseif (isset($_POST['username'], $_POST['password'])) {
    // maybe query the database
    $user = $queryBuilder->findFirstByField('users', 'username', $_POST['username'], 'App\Model\Users');

    // Verification of user username and password
    if ($_POST['username'] == $user->username && password_verify($_POST['password'], $user->passwd)) {
        // Setting of Session Values
        $_SESSION['login'] = $user->username;
        $_SESSION['name'] = $user->name;
        $_SESSION['role_id'] = $user->role_id;
        $_SESSION['id'] = $user->id;
        // login successfully, redirect to home
        redirect('home');
    } else {
        redirect('login'); // redirect to login again...
    }
} else {
    echo 'error';
}
?>