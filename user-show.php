<?php
session_start();

if (isset($_SESSION['user'])) {
    $pdo = new PDO("mysql:host=localhost; dbname=test", "root", "");
    $sql = "SELECT * FROM users WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $_GET['id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    var_dump($_SESSION);
    ?>


    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
         
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <title>Добро пожаловать <?php echo $_SESSION['user']['name'] ?></title>
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
            <div class="row">

                    <div class="col-md-8">
                        <label for="">Email</label>
                        <input type="text" class="form-control" placeholder="Username" value="<?= $user['email'] ?>" disabled>
                        <label for=""  class="mt-1">Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name" value="<?= $user['name'] ?>" disabled>
                        <label for="" class="mt-1">Registration date</label>
                        <input type="text" class="form-control" placeholder="date" value="<?= $user['date'] ?>" disabled>
                        <label for="" class="mt-1">Status</label>
                        <input type="text" class="form-control" placeholder="date" value="<?= $user['status'] ?>" disabled>

                        <a href="/users.php" class="d-block mt-5">Вернуться назад</a>
                    </div>
                    <div class="col-md-4 mt-3">
                        <?php if (file_exists("uploads/". $user['avatar'])): ?>
                            <img src="/uploads/<?= $user['avatar'] ?>" class="d-block" height="300" width="300" alt="">
                        <?php else: ?>
                            <img src="/img/<?= $user['avatar'] ?>" class="d-block" height="300" width="300" alt="">
                        <?php endif; ?>
                    </div>

            </div>
        </div>


    </main>
    <footer class="mt-5"></footer>
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
<?php } else {
    header("Location: /");
} ?>