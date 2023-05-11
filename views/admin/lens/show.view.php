<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>lenss</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<?php include 'views/navbar.php' ?>
<body>
  <div class="container-fluid">
    <div class="jumbotron">
      <h1 class="display-4"><?php echo $lens->brand; ?></h1>
      <p class="lead"><?php echo $lens->focal_lenght;?></p>
      <p class="lead"><?php echo $lens->aperture;?></p>
      <p class="lead"><?php echo $lens->mount;?></p>
      <p class="lead"><?php echo $lens->ring_size;?></p>
      <?php
      foreach ($photos as $photo) {
        if ($lens->id == $photo->lens_id) { ?>
          <div class="d-lg-inline-block" style="width:310px">
            <a href="<?php echo route('photos/' . $photo->id) ?>">
              <img class="rounded mx-auto d-block" style="max-width:300px;max-height:400px"
                src="<?php echo route($photo->path) ?>">
            </a>
            <div>
              <p class="lead">
                <a href="<?php echo route('users/' . $photo->user->id) ?>"><?php echo $photo->user->name; ?></a>
              </p>
            </div>
          </div>
          <?php
        }
      }
      ?>
    </div>
  </div>
</body>
<?php include 'views/footer.php' ?></html>
