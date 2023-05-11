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
                <div class="col-12 my-3">
                    <form method="post" action="<?php route('home'); ?>">
                        <select name="parameter" id="parameter">
                            <option value=""></option>
                            <option value="name">Name</option>
                            <option value="date">Date</option>
                        </select>
                        <select name="dir" id="dir">
                            <option value=""></option>
                            <option value="ASC">Ascendente</i></option>
                            <option value="DESC">Descendente</option>
                        </select>
                        <button type="submit">btn</button>
                    </form>
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