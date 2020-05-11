<?php session_start();
$message = $_SESSION['message'];
$user_exist = $_SESSION['email_exist'];
if (isset($_COOKIE['remember_name']) && isset($_COOKIE['remember_pass'])){
    $login = base64_decode($_COOKIE['remember_name']);
    $pass = base64_decode($_COOKIE['remember_pass']);

}
if (!isset($_SESSION['user'])){


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Регистрация и Вход</title>
</head>
<body class="text-center">

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="margin-top: 200px;">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link <?php if (!$user_exist): echo 'active'; endif;?>" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                       aria-controls="nav-home" aria-selected="true">Вход</a>
                    <a class="nav-item nav-link <?php if ($user_exist): echo 'active'; endif;?>" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                       aria-controls="nav-profile" aria-selected="false">Регистрация</a>

                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade <?php if (!$user_exist): echo 'show active'; endif;?>" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <form class="form-signin" method="post" action="login.php">
                        <img class="mb-4 mt-4" src="img/login.png" alt="" width="72" height="72">
                        <h1 class="h3 mb-3 font-weight-normal">Вход</h1>
                        <label for="inputEmail" class="sr-only">Email</label>
                        <input type="text" id="inputEmail" name="email" class="form-control mb-2" placeholder="Email address" value="<?=$login?>"
                               autofocus="">
                        <label for="inputPassword" class="sr-only">Пароль</label>

                        <input type="text" name="password" id="inputPassword" class="form-control" value="<?=$pass?>" placeholder="Password"
                        >
                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" name="remember-me" <?php if ($login): echo "checked"; endif;?>> Запомнить меня
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Вход</button>
                        <p class="mt-5 mb-3 text-muted">© 2017-2019</p>
                    </form>
                </div>
                <div class="tab-pane fade<?php if ($user_exist): echo 'show active'; endif;?>" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <form class="form-signin" method="post" action="store.php">
                        <img class="mb-4 mt-4" src="img/login.png" alt="" width="72" height="72">
                        <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
                        <label for="inputEmail" class="sr-only">Email</label>

                        <input type="email" name="login" id="inputEmail" class="form-control mb-2" placeholder="Email address"
                               autofocus="">
                        <?php if ($user_exist):?>
                            <?php echo '<span class="text-danger d-block mb-2">' . $user_exist.'</span>';?>
                        <?php else:?>
                            <?php echo '<span class="text-danger d-block mb-2">' . $message.'</span>';?>
                        <?endif;?>
                        <label for="inputPassword" class="sr-only">Пароль</label>

                        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password"
                        ><?php echo '<span class="text-danger">' . $message.'</span>';?>


                        <button class="btn btn-lg btn-primary btn-block mt-4" type="submit">Зарегистрироваться</button>
                        <p class="mt-5 mb-3 text-muted">© 2017-2019</p>
                    </form>
                </div>

            </div>

        </div>
        <div class="col-md-4"></div>
    </div>
</div>
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
<?php } else{
    header("Location: personal_account.php");
}?>