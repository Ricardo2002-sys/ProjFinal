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
    <h1>Edit <?php $_SESSION['login'] ?></h1>
    <form method="POST" action="<?php echo route('users/' . $user->id); ?>">
      <input type="hidden" name="_method" value="PATCH">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" value="<?php echo $user->name ?>" name="name"
          placeholder="Insert user´s name" required>
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" value="<?php echo $user->username ?>" name="username"
          placeholder="Insert user´s username" required>
      </div>
      <div class="form-group">
        <label for="age">Age</label>
        <input type="number" class="form-control" value="<?php echo $user->age ?>" name="age"
          placeholder="Insert user´s age">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" value="<?php echo $user->email ?>" name="email"
          placeholder="Insert user´s email" required>
      </div>
      <div class="form-group">
        <label for="adress">Adress</label>
        <input type="text" class="form-control" value="<?php echo $user->adress ?>" name="adress"
          placeholder="Insert user´s adress">
      </div>
      <button type="submit" class="btn btn-danger">Edit</button>
    </form>
  </div>
</body>
<?php include 'views/footer.php' ?>

</html>