<?php
session_start();

if (isset($_SESSION['user'])){?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Добро пожаловать <?php echo $_SESSION['user']['name']?></title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="/">Личный кабинет</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/users.php">All users</a>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0" method="post" action="/logout.php">
            <button class="btn btn-secondary my-2 my-sm-0">Выход</button>

        </form>
    </div>
</nav>

<main role="main" class="container">

<div class="container mt-5">
    <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aperiam culpa cumque deleniti eos error eveniet expedita fuga, ipsum iure, magni maxime modi non omnis quos soluta tempora ut voluptas.</span><span>A esse est explicabo incidunt molestias quisquam repellat veritatis. Accusantium, deleniti eius enim eum eveniet exercitationem in iure libero minima minus nostrum quia quidem, sit soluta temporibus velit voluptas. Eveniet.</span></p>

</div>

</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
<?php }else{
     header("Location: /");
}?>