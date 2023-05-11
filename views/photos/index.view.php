<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Photos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<?php include 'views/navbar.php' ?>

<body>
  <div class="container-fluid">
    <h1>Your Photos</h1>
    <a class="btn btn-dark" href="<?php echo route('photos/create'); ?>" role="button">Insert</a>
    <ul class="list-group mt-4">
      <?php
      // Verification of photos ownership
      foreach ($photos as $photo) {
        if ($_SESSION['id'] == $photo->users_id | $_SESSION['role_id'] == '2') { ?>
          <li class="list-group-item">
            <!-- Shows photo preview -->
            <a href="<?php echo route('photos/' . $photo->id); ?>">
              <!-- Image display -->
              <img height="300px" src="<?php echo route($photo->path); ?>"><?php echo " ", $photo->name; ?> (<?php echo $photo->camera->brand, " ", $photo->camera->model; ?>)</a>
            <span class="badge badge-primary badge-pill">
              <?php echo $photo->aperture; ?>
            </span>
            <!-- Delete -->
            <form class="m-1 form-inline float-right" method="POST" action="<?php echo route('photos/' . $photo->id); ?>">
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <?php
            if ($_SESSION['id'] == $photo->users_id) {
              ?>
              <a class="m-1 btn btn-primary float-right" href="<?php echo route('photos/' . $photo->id . '/edit'); ?>"
                role="button">Editar</a>
            <?php
            }
            ?>
          </li>
          <?php
        } else {
          continue;
        }
      }
      ?>
    </ul>
  </div>
</body>
<?php include 'views/footer.php' ?>

</html>