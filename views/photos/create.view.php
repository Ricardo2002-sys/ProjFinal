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
    <h1>Add a Photo</h1>
    <form enctype="multipart/form-data" method="POST" action="<?php echo route('photos/store'); ?>">
      <div class="form-group">
        <input type="file" class="file-upload" name="file" required>
      </div>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="textarea" class="form-control" name="name" placeholder="Insert photo´s name*" maxlength="255"
          required>
      </div>
      <div class="form-group">
        <label for="date">Date</label>
        <input type="date" class="form-control" name="date" placeholder="Insert photo´s description">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" class="form-control" name="description"
          placeholder="Insert photo´s description"></textarea>
      </div>
      <div class="form-group">
        <label for="aperture">Aperture(F)</label>
        <input type="text" class="form-control" name="aperture" placeholder="Insert photo´s aperture value"
          maxlength="20">
      </div>
      <div class="form-group">
        <label for="iso">ISO</label>
        <input type="number" class="form-control" name="iso" placeholder="Insert photo´s ISO value">
      </div>
      <div class="form-group">
        <label for="shutter_speed">Shutter_Speed(1/ s)</label>
        <input type="text" class="form-control" name="shutter_speed" placeholder="Insert photo´s shutter_speed value"
          maxlength="10">
      </div>
      <div class="form-group">
        <label for="white_balance">White_balance</label>
        <input type="text" class="form-control" name="white_balance" placeholder="Insert photo´s white_balance value"
          maxlength="10">
      </div>
      <!-- Shows all cameras -->
      <div class="form-group">
        <label for="camera_id">Cameras</label>
        <select class="custom-select" name="camera_id">
          <?php
          foreach ($cameras as $camera) {
            ?>
            <option value="<?php echo $camera->id; ?>"><?php echo $camera->brand, $camera->model; ?></option>
            <?php
          }
          ?>
        </select>
      </div>
      <!-- Shows all lenses -->
      <div class="form-group">
        <label for="lens_id">Lenses</label>
        <select class="custom-select" name="lens_id">
          <?php
          foreach ($lenses as $lens) {
            ?>
            <option value="<?php echo $lens->id; ?>"><?php echo $lens->brand, " ", $lens->focal_lenght, " ", $lens->aperture; ?></option>
            <?php
          }
          ?>
        </select>
      </div>
      <!-- Shows all tags -->
      <div class="form-group">
        <label for="tag_id">Tags</label>
        <select multiple class="custom-select" name="tag_id[]">
          <?php
          foreach ($tags as $tag) {
            ?>
            <option value="<?php echo $tag->id; ?>"><?php echo $tag->description; ?></option>
            <?php
          }
          ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
    </form>
  </div>
</body>
<?php include 'views/footer.php' ?>

</html>