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
    <h1>Edit a Photo</h1>
    <form method="POST" action="<?php echo route('photos/' . $photo->id); ?>">
      <input type="hidden" name="_method" value="PATCH">
      <div class="form-group">
        <img height="100px" src="<?php echo route($photo->path); ?>">
      </div>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo $photo->name; ?>" required>
      </div>
      <div class="form-group">
        <label for="date">Date</label>
        <input type="date" class="form-control" name="date" value="<?php echo $photo->date; ?>">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description"><?php echo $photo->description; ?></textarea>
      </div>
      <div class="form-group">
        <label for="aperture">Aperture(F)</label>
        <input type="text" class="form-control" name="aperture" value="<?php echo $photo->aperture; ?>">
      </div>
      <div class="form-group">
        <label for="iso">ISO</label>
        <input type="number" class="form-control" name="iso" value="<?php echo $photo->iso; ?>">
      </div>
      <div class="form-group">
        <label for="shutter_speed">Shutter_Speed(1/ s)</label>
        <input type="text" class="form-control" name="shutter_speed" value="<?php echo $photo->shutter_speed; ?>">
      </div>
      <div class="form-group">
        <label for="white_balance">White_balance</label>
        <input type="text" class="form-control" name="white_balance" value="<?php echo $photo->white_balance; ?>">
      </div>
      <!-- Cameras -->
      <div class="form-group">
        <label for="camera_id">Cameras</label>
        <select class="custom-select" name="camera_id">
          <!-- Shows all the cameras -->
          <?php
          foreach ($cameras as $camera) {
            ?><!-- Shows the selected camera -->
            <option <?php echo ($camera->id == $photo->camera_id) ? 'selected' : ''; ?> value="<?php echo $camera->id; ?>">
              <?php echo $camera->brand, $camera->model; ?>
            </option>
            <?php
          }
          ?>
        </select>
      </div>
      <!-- Lenses     -->
      <div class="form-group">
        <label for="lens_id">Lenses</label>
        <select class="custom-select" name="lens_id">
          <!-- Shows all the lenses -->
          <?php
          foreach ($lenses as $lens) {
            ?><!-- Shows the selected lens -->
            <option <?php echo ($lens->id == $photo->lens_id) ? 'selected' : ''; ?> value="<?php echo $lens->id; ?>">
              <?php echo $lens->brand, " ", $lens->focal_lenght, " ", $lens->aperture; ?>
            </option>
            <?php
          }
          ?>
        </select>
      </div>
      <!-- Tags -->
      <div class="form-group">
        <label for="tag_id">Tags</label>
        <select multiple class="custom-select" name="tag_id[]">
          <?php
          foreach ($tags as $tag) {
            ?>
            <option <?php echo (in_array($tag->id,$photo_tags_ids)) ? 'selected' : ''; ?> value="<?php echo $tag->id; ?>"><?php echo $tag->description; ?></option>
            <?php
          }
          ?>
        </select>
      </div>
      <button type="submit" class="btn btn-danger">Gravar</button>
    </form>
  </div>
</body>
<?php include 'views/footer.php' ?>

</html>