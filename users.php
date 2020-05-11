<?php
session_start();

if (isset($_SESSION['user'])) {
    $pdo = new PDO("mysql:host=localhost; dbname=test", "root", "");
    $sql = "SELECT * FROM users";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
<style>
    a:hover{
        text-decoration: none;
    }

</style>
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

    <table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Email</th>
        <th scope="col">Name</th>
        <th scope="col">image</th>
        <th scope="col">Registration date</th>
        <th scope="col">Edit</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>

            <tr>
                <th scope="row"><?= $user['id'] ?></th>

                <td><?= $user['email'] ?></td>
                <td><?= $user['name'] ?></td>
                <?php if (file_exists("uploads/" . $user['avatar']) && $user['avatar'] != ""): ?>
                    <td><img src="/uploads/<?= $user['avatar'] ?>" width="50" height="50" alt=""></td>
                <?php else: ?>
                    <td><img src="/img/none.png" width="50" height="50" alt=""></td>
                <?php endif; ?>
                <td><?= $user['date'] ?></td>

                    <td>
                        <a href="user-show.php/?id=<?= $user['id'] ?>">
                            <svg class="bi bi-aspect-ratio-fill" width="2em" height="2em"
                                 viewBox="0 0 16 16" fill="#06c3e2" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M1.5 2A1.5 1.5 0 000 3.5v9A1.5 1.5 0 001.5 14h13a1.5 1.5 0 001.5-1.5v-9A1.5 1.5 0 0014.5 2h-13zm1 2a.5.5 0 00-.5.5v3a.5.5 0 001 0V5h2.5a.5.5 0 000-1h-3zm11 8a.5.5 0 00.5-.5v-3a.5.5 0 00-1 0V11h-2.5a.5.5 0 000 1h3z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <?php if ($_SESSION['user']['status'] == "Admin"): ?>
                        <a href="user-edit.php/?id=<?= $user['id'] ?>">
                            <svg class="bi bi-brush" width="2em" height="2em" viewBox="0 0 16 16"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.213 1.018a.572.572 0 01.756.05.57.57 0 01.057.746C15.085 3.082 12.044 7.107 9.6 9.55c-.71.71-1.42 1.243-1.952 1.596-.508.339-1.167.234-1.599-.197-.416-.416-.53-1.047-.212-1.543.346-.542.887-1.273 1.642-1.977 2.521-2.35 6.476-5.44 7.734-6.411z"/>
                                <path d="M7 12a2 2 0 01-2 2c-1 0-2 0-3.5-.5s.5-1 1-1.5 1.395-2 2.5-2a2 2 0 012 2z"/>
                            </svg>
                        </a><a href="user-delete.php/?id=<?= $user['id'] ?>">
                            <svg class="bi bi-trash" width="2em" height="2em" viewBox="0 0 16 16"
                                 fill="red" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
                                <path fill-rule="evenodd"
                                      d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <?php endif;?>
                    </td>



            </tr>

            <?php endforeach; ?>



            </tbody>
            </table>


            </div>
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
            <?php } else {
    header("Location: /");
} ?>