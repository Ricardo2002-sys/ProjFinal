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
    <main>
        <form action="<?php echo route('login/check') ?>" method="post">
            Login:<input type="text" name="username">
            Password:<input type="password" name="password">
            <input type="submit" value="Login">
        </form>
    </main>
</body>
<?php include 'views/footer.php' ?>

</html>