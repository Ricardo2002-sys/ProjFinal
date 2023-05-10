<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Share a pic</title>
</head>
<?php include 'views/navbar.php' ?>

<body>
    <main class="m-2">

        <div class="container-fluid">
            <!-- <h2 class="regist mb-4">
                Create Account
            </h2> -->
            <form method="POST" action="<?php echo route('users/store'); ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Insert your name*" maxlength="30" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Choose a valid username*" minlength="6" maxlength="30" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Insert your email*" maxlength="75" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" name="age" placeholder="Insert your age">
                </div>
                <div class="form-group">
                    <label for="adress">Adress</label>
                    <input type="text" class="form-control" name="adress" placeholder="Insert your adress" maxlength="255">
                </div>
                <div class="form-group">
                    <label for="passord">Password</label>
                    <input type="password" class="form-control" name="passwd" placeholder="Insert a valid password*" minlength="6" maxlength="255" required>
                </div>
                <button type="submit" class="btn btn-primary">Criar</button>
            </form>
        </div>
    </main>
</body>
<?php include 'views/footer.php' ?>

</html>