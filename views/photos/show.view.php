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
    <div class="jumbotron">
      <span>
        <img height="150px" src="<?php echo route($photo->path); ?>"></span>
      <h1 class="display-4">
        <?php echo $photo->name; ?>
      </h1>
      <p class="lead" name="name">
        <?php echo $photo->description; ?>
      </p>
      <p class="lead">
        <?php echo $photo->aperture; ?>
      </p>
      <p class="lead">
        <?php echo $photo->iso; ?>
      </p>
      <p class="lead">
        <?php echo $photo->shutter_speed; ?>
      </p>
      <p class="lead">
        <?php echo $photo->white_balance; ?>
      </p>
      <p class="lead">
        <?php echo $photo->date; ?>
      </p>
      <p class="lead">
        <?php echo $photo->camera->brand, " ", $photo->camera->model; ?>
      </p>
      <p class="lead">
        <?php echo $photo->lens->brand, " ", $photo->lens->focal_lenght, " ", $photo->lens->aperture; ?>
      </p>
      <div class="form-group">
        <?php foreach ($tags as $tag) {
          if (in_array($tag->id, $photo_tags_ids)) {
            ?><span>
              <?php echo $tag->description; ?>
            </span>
            <?php
          }
        }
        ?>
      </div>
    </div>
  </div>
</body>
<?php include 'views/footer.php' ?>

</html>