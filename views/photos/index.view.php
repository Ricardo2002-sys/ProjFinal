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
  <main>
    <!-- Photos Ordenation -->
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="row">
          <div class="col-3 my-3">
            <form method="post" action="<?php route('photos'); ?>">
              <label for="parameter">Order by:</label>
              <select class="form-select" name="parameter" id="parameter">
                <option value="name">Name</option>
                <option value="date">Date</option>
                <option value="aperture">Aperture</option>
                <option value="iso">ISO</option>
                <option value="shutter_speed">Shutter Speed</option>
                <option value="white_balance">White Balance</option>
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
            <form method="post" action="<?php route('photos'); ?>">
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
            <form method="post" action="<?php route('photos'); ?>">
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
        </div>
        <!-- Shows all photos -->
        <?php foreach ($photos as $photo) {
          if ($_SESSION['id'] == $photo->users_id | $_SESSION['role_id'] == '2') { ?>
            <div class="col-sm d-sm-inline-block" style="">
              <a href="<?php echo route('photos/' . $photo->id) ?>">
                <img class="rounded mx-auto d-block" style="max-width:400px;max-height:500px"
                  src="<?php echo route($photo->path) ?>">
                <div class="d-flex justify-content-center">
                  <div>
                    <div class="d-flex justify-content-center" style="font-size:1.6em;">
                      <span>
                        <?php echo $photo->name ?>
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
          <?php }
        } ?>
      </div>
    </div>
  </main>
</body>
<?php include 'views/footer.php' ?>

</html>