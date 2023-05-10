<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>photos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<?php include 'views/navbar.php' ?>

<body>
  <div class="container-fluid">
    <h1>Users</h1>
    <ul class="list-group mt-4">
      <?php
      foreach ($users as $user) {
        // Show all users except admins
        if ($user->role_id != '2') { ?>
          <li class="list-group-item">
            <a href="<?php echo route('users/' . $user->id); ?>"><?php echo " ", $user->username; ?></a>
            <form class="m-1 form-inline float-right" method="POST" action="<?php echo route('users/' . $user->id); ?>">
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </li>
        <?php } else {
          continue;
        }
      }
      ?>
    </ul>
  </div>
</body>
<?php include 'views/footer.php' ?>

</html>