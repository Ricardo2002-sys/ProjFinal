<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>lenss</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<?php include 'views/navbar.php' ?>

<body>
  <div class="container-fluid">
    <h1>Edit Lens</h1>
    <form method="POST" action="<?php echo route('lens/' . $lens->id); ?>">
      <input type="hidden" name="_method" value="PATCH">
      <div class="form-group">
        <input type="text" class="form-control" value="<?php echo $lens->brand ?>" name="brand"
          placeholder="Insert lens´s brand" maxlength="100" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" value="<?php echo $lens->focal_lenght ?>" name="focal_lenght"
          placeholder="Insert lens´s focal_lenght" maxlength="20" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" value="<?php echo $lens->aperture ?>" name="aperture"
          placeholder="Insert lens´s aperture value" maxlength="30">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" value="<?php echo $lens->mount ?>" name="mount"
          placeholder="Insert lens´s mount type" maxlength="15">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" value="<?php echo $lens->ring_size ?>" name="ring_size"
          placeholder="Insert lens´s ring_size in mm" maxlength="20">
      </div>
      <button type="submit" class="btn btn-danger">Gravar</button>
    </form>
  </div>
</body>
<?php include 'views/footer.php' ?>

</html>