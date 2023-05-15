<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<?php include 'views/navbar.php' ?>

<body>
  <div class="container-fluid">
    <div class="row mt-3">
      <div class="col-sm-3 " style="width:310px">
        <div class="card">
          <div class="card-body" style="max-width:300px;height:400px">
            <h2 class="card-title display-4">
              <?php echo $user->name; ?>
            </h2>
            <?php if ($_SESSION['id'] == $user->id | $_SESSION['role_id'] == '2') { ?>
              <p class="lead">
                <?php echo $user->username; ?>
              </p>
              <p class="lead">
                <?php echo $user->age; ?>
              </p>
              <p class="lead">
                <?php echo $user->email; ?>
              </p>
              <p class="lead">
                <?php echo $user->adress; ?>
              </p>
              <p class="lead">
                <?php echo $user->role->name; ?>
              </p>
              <?php
              if ($_SESSION['id'] == $user->id) {
                if ($_SESSION['role_id'] == '1') { ?>
                  <form class="m-1 form-inline float-left" method="POST" action="<?php echo route('users/' . $user->id); ?>">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                <?php }
                ?>
                <a class="m-1 btn btn-warning float-left" href="<?php echo route('users/' . $user->id . '/edit'); ?>"
                  role="button">Edit</a>
                <?php
              }
            }
            ?>
          </div>
        </div>
      </div>
      <?php
      foreach ($photos as $photo) {
        if ($user->id == $photo->users_id) { ?>
          <div class="col-sm-3 d-sm-inline-block" style="width:310px">
            <a href="<?php echo route('photos/' . $photo->id) ?>">
              <img class="rounded mx-auto d-block" style="max-width:300px;max-height:400px"
                src="<?php echo route($photo->path) ?>">
            </a>
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
          <?php
        }
      }
      ?>
    </div>
  </div>
</body>
<?php include 'views/footer.php' ?>

</html>