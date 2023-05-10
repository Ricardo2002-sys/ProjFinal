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
    <h1>Edit Camera</h1>
    <form method="POST" action="<?php echo route('camera/' . $camera->id); ?>">
      <input type="hidden" name="_method" value="PATCH">
      <div class="form-group">
        <input type="text" class="form-control" value="<?php echo $camera->brand ?>" name="brand"
          placeholder="Insert camera´s brand" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" value="<?php echo $camera->model ?>" name="model"
          placeholder="Insert camera´s model" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" value="<?php echo $camera->sensor ?>" name="sensor"
          placeholder="Insert camera´s sensor type" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" value="<?php echo $camera->resolution ?>" name="resolution"
          placeholder="Insert camera´s resolution" required>
      </div>
      <div class="form-group">
        <input type="number" class="form-control" value="<?php echo $camera->focal_points ?>" name="focal_points"
          placeholder="Insert camera´s amount of focal_points" required>
      </div>
      <button type="submit" class="btn btn-danger">Gravar</button>
    </form>
  </div>
</body>
<?php include 'views/footer.php' ?>

</html>