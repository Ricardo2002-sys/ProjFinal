<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Home</title>
</head>
<?php include 'navbar.php' ?>

<body>
    <main>
        <!-- Photos Ordenation -->
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="row">
                    <div class="col-3 my-3">
                        <form method="post" action="<?php route('home'); ?>">
                            <label for="parameter">Order by:</label>
                            <select class="form-select" name="parameter" id="parameter">
                                <option value="name">Name</option>
                                <option value="date">Date</option>
                            </select>
                            <select class="form-select" name="dir" id="dir">
                                <option value="ASC">Ascendente</i></option>
                                <option value="DESC">Descendente</option>
                            </select>
                            <button class="btn btn-warning" type="submit">btn</button>
                        </form>
                    </div>
                    <!-- Filter -->
                    <!-- Cameras -->
                    <div class="col-3 my-3">
                        <form method="post" action="<?php route('home'); ?>">
                            <label for="camera">Cameras</label>
                            <select class="form-select" name="camera" id="camera">
                                <option value="">Show all</option>
                                <?php
                                foreach ($cameras as $camera) {
                                    ?>
                                    <option value="<?php echo $camera->id ?>"><?php echo $camera->brand, " ", $camera->model ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <button class="btn btn-warning" type="submit">btn</button>
                        </form>
                    </div>
                    <!-- Lens -->
                    <div class="col-3 my-3">
                        <form method="post" action="<?php route('home'); ?>">
                            <label for="lens">Lenses</label>
                            <select class="form-select" name="lens" id="lens">
                                <option value="">Show all</option>
                                <?php
                                foreach ($lenses as $lens) {
                                    ?>
                                    <option value="<?php echo $lens->id ?>"><?php echo $lens->brand, " ", $lens->focal_lenght; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                            <button class="btn btn-warning" type="submit">btn</button>
                        </form>
                    </div>
                    <!-- Users -->
                    <div class="col-3 my-3">
                        <form method="post" action="<?php route('home'); ?>">
                            <label for="lens">Users</label>
                            <select class="form-select" name="user" id="user">
                                <option value="">Show all</option>
                                <?php
                                foreach ($users as $user) {
                                    if ($user->role_id == '2') {
                                        continue;
                                    } else {
                                        ?>
                                        <option value="<?php echo $user->id ?>"><?php echo $user->name; ?>
                                        </option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            <button class="btn btn-warning" type="submit">btn</button>
                        </form>
                    </div>
                </div>
                <!-- Shows all photos -->
                <?php foreach ($photos as $photo) {
                    ?>
                    <div class="col-sm d-sm-inline-block" style="">
                        <a href="<?php echo route('photos/' . $photo->id) ?>">
                            <img class="rounded mx-auto d-block" style="max-width:400px;max-height:500px"
                                src="<?php echo route($photo->path) ?>">
                            <div class="d-flex justify-content-center">
                                <div>
                                    <div class="d-flex justify-content-center" style="font-size:1.6em;">
                                        <span>
                                            <?php echo $photo->name ?> by <a
                                                href="<?php echo route('users/' . $photo->users_id); ?>"><?php echo $photo->user->name ?></a>
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <a href="<?php echo route('camera/' . $photo->camera->id); ?>">
                                            <span class="lead">
                                                <?php echo $photo->camera->brand, " ", $photo->camera->model; ?>
                                            </span>
                                            <a>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <a href="<?php echo route('lens/' . $photo->lens->id); ?>">
                                            <p class="lead">
                                                <?php echo $photo->lens->brand, " ", $photo->lens->focal_lenght, " ", $photo->lens->aperture; ?>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>
</body>
<?php include 'footer.php' ?>

</html>