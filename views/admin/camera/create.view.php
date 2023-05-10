<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<?php include 'views/navbar.php' ?>

<body>
    <div class="container-fluid">
        <h1>Add Camera</h1>
        <form enctype="multipart/form-data" method="POST" action="<?php echo route('camera/store'); ?>">
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" class="form-control" name="brand" placeholder="Insert camera´s brand" required>
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" class="form-control" name="model" placeholder="Insert camera´s model" required>
            </div>
            <div class="form-group">
                <label for="sensor">Sensor</label>
                <input type="text" class="form-control" name="sensor" placeholder="Insert camera´s sensor type"
                    required>
            </div>
            <div class="form-group">
                <label for="resolution">Resolution (width x height)</label>
                <input type="text" class="form-control" name="resolution" placeholder="Insert camera´s resolution"
                    required>
            </div>
            <div class="form-group">
                <label for="focal_points">Focal_points</label>
                <input type="number" class="form-control" name="focal_points"
                    placeholder="Insert camera´s amount of focal_points" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
</body>

</html>
<?php include 'views/footer.php' ?>