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
        <h1>Add Tag</h1>
        <form enctype="multipart/form-data" method="POST" action="<?php echo route('tag/store'); ?>">
            <div class="form-group">
                <input type="text" class="form-control" name="description" placeholder="Insert tag´s description"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
</body>
<?php include 'views/footer.php' ?>

</html>