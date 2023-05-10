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
    <style>
        body .bbbootstrap {
            background-image: url(https://res.cloudinary.com/dxfq3iotg/image/upload/v1566917764/Add_a_heading.png) !important;
            background-size: cover;
            padding: 180px 0 30px 0;
        }

        .bbbootstrap {
            padding: 40px;
            margin-bottom: 22px;
            color: #fff;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
            background-color: #2e9df7;
            -webkit-box-shadow: 0 15px 15px -15px rgba(0, 0, 0, 0.25) inset, 0 -15px 15px -15px rgba(0, 0, 0, 0.25) inset;
            box-shadow: 0 15px 15px -15px rgba(0, 0, 0, 0.25) inset, 0 -15px 15px -15px rgba(0, 0, 0, 0.25) inset;
        }

        .bbbootstrap form {
            position: relative;
            width: 540px;
            margin: 22px auto 0;
        }

        span {
            margin: 0;
            padding: 0;
            border: 0;
            outline: 0;
            font-weight: inherit;
            font-style: inherit;
            font-size: 100%;
            font-family: inherit;
            vertical-align: baseline;
        }


        .bbbootstrap form input[type="text"] {
            padding: 15px 20px;
            padding-right: 100px;
            border-color: transparent;
            border-radius: 4px;
        }

        input.InputBox {
            font-family: "lucida grande", "Lucida Sans Unicode", tahoma, sans-serif;
            color: #333;
            font-size: 15px;
            padding: 3px;
            margin: 0;
            width: 250px;
            background: #fff;
            border: 1px solid #999;
            border: 1px solid rgba(0, 0, 0, 0.4);
        }


        input[type=text] {
            box-sizing: border-box;
        }

        .InputBox {
            display: block;
            width: 100% !important;
            padding: 6px 12px;
            font-size: 15px;
            line-height: 22px;
            border-radius: 4px;
        }

        .bbbootstrap form input[type="submit"] {
            position: absolute;
            top: 5px;
            right: 5px;
            float: right;
            padding: 10px 25px;
        }

        body .Button,
        body .button {
            background-color: #1268b3;
            background-image: none;
        }


        input[type="submit"] {
            -webkit-appearance: button;
            cursor: pointer;
        }

        .Button,
        .Button:hover,
        .Button:focus,
        .Button:active {
            text-shadow: none;
            border-color: transparent;
        }

        .Button {
            display: inline-block;
            padding: 6px 12px;
            vertical-align: middle;
            font-size: 13px;
            font-weight: 700;
            line-height: 22px;
            text-transform: uppercase;
            border: transparent solid 1px;
            border-radius: 3px;
            -webkit-transition: -webkit-box-shadow 50ms;
            transition: -webkit-box-shadow 50ms;
            -o-transition: box-shadow 50ms;
            transition: box-shadow 50ms;
            transition: box-shadow 50ms, -webkit-box-shadow 50ms;
            -webkit-font-smoothing: inherit;
            color: #fff;
            background-color: #2e9df7;
            background-repeat: repeat-x;
            background-color: #38a2f7;
            background-image: -webkit-linear-gradient(#38a2f7, #2498f7);
            background-image: -webkit-gradient(linear, left top, left bottom, from(#38a2f7), to(#2498f7));
            background-image: -o-linear-gradient(#38a2f7, #2498f7);
            background-image: linear-gradient(#38a2f7, #2498f7);
        }
    </style>
</head>

<body>
    <!-- Header / Nav-->
    <header>
        <!-- Nav -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                <!-- Admin -->
                <?php
                if (isset($_SESSION['login'])) {
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
                        <!-- User -->
                        <?php
                    } elseif ($_SESSION['role_id'] == '1') {
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
                            <a class="nav-link" href="<?php echo route('login'); ?>">Login</a>
                            <!-- <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#login">Login</a>
                            </a> -->
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
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="examplemodallabel">
                            Login
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo route('login/check') ?>" method="post">
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
                                <input type="submit" value="Login">
                            </table>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

                    </div>
                </div>
            </div>
        </div>
    </header>