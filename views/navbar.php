<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Share a pic</title>
    <link rel="icon" href="logo.png">
</head>

<body>
    <!-- Header / Nav-->
    <header>
        <!-- Nav -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <a class="navbar-brand ms-2 " href="<?php echo route('home'); ?>">
                <i class="fa fa-camera"></i>
                <span class="navbar-text">Pic a day
                </span>
            </a>
            <!-- Hamburguer button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapseExample">

                <!-- Search bar -->
                <form method="post" action="<?php echo route('home') ?>">
                    <div class="mx-auto input-group">
                        <div class="form-outline">
                            <input type="search" placeholder="Search photos" name='search'
                                class="bg-secundary form-control" style="border: 1.5px solid pink;" />
                        </div>
                        <button type="submit" class="btn btn-warning">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
                <?php
                if (isset($_SESSION['login'])) {
                    // Admin 
                    if ($_SESSION['role_id'] == '2') {
                        ?>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo route('cameras'); ?>">Cameras</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo route('lenses'); ?>">Lenses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo route('tags'); ?>">Tags</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo route('users'); ?>">Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo route('photos'); ?>">Photos</a>
                            </li>
                        </ul>
                        <?php
                    } // User
                    elseif ($_SESSION['role_id'] == '1') {
                        ?>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo route('photos'); ?>">Your Photos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo route('photos/create'); ?>">Insert a photo</a>
                            </li>
                        </ul>
                        <?php
                    }
                }
                // Logged in
                if (isset($_SESSION['login'])) {
                    ?>
                    <ul class="navbar-nav ms-auto mx-3">
                        <li class="nav-item">
                            <!-- Shows user name  -->
                            <a class="nav-link" href="<?php echo route('users/' . $_SESSION['id']); ?>">
                                <?php echo $_SESSION['name'] ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <!-- Button triggering logout -->
                            <a class="nav-link" href="<?php echo route('logout'); ?>">Logout</a>
                        </li>
                    </ul>
                    <?php
                } else {
                    ?>
                    <ul class="navbar-nav ms-auto mx-3">
                        <li class="nav-item">
                            <!-- Button triggering login modal -->
                            <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#login">Login</a>
                            </a>
                        </li>
                        <li class="nav-item">
                            <!-- Button triggering registration -->
                            <a class="nav-link" href="<?php echo route('users/create'); ?>">Registo</a>
                        </li>
                    </ul>
                    <?php
                }
                ?>
            </div>
        </nav>
        <!-- Modal -->
        <div class="modal fade" id="login" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="bg-secundary modal-header">
                        <h1 class="modal-title fs-5" id="examplemodallabel">
                            Login
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="<?php echo route('login/check') ?>" method="post">
                        <div class="modal-body">
                            <table class="table table-borderless">
                                <tr>
                                    <td>
                                        <label for="username">
                                            Username
                                        </label>
                                    </td>
                                    <td>
                                        <input type="text" name="username" placeholder="Insert your Username"
                                            minlength="6" maxlength="20" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="password">
                                            Password
                                        </label>
                                    </td>
                                    <td>
                                        <input type="password" name="password" placeholder="Insert your Password"
                                            minlength="6" maxlength="15" required>
                                    </td>
                                </tr>

                            </table>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btn-warning" type="submit" value="Login">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>