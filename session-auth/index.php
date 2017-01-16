<?php
    define('FILENAME', 'users.txt'); // Константа имени файла
    session_start(); // создаем сессию

    $users = ['login'=>'Jon', 'password'=>md5('123qwer456')];
    if (!file_exists(FILENAME)) {
        file_put_contents(FILENAME, serialize($users));
    } else {
        $fread = unserialize(file_get_contents(FILENAME)); // Считываем файл и ансериализуем его содержимое
    }

    if($_SESSION['login'] == $fread['login']) {
        header("Location: profile.php");
    }

   
    
    if($_POST) {
        if($fread['login'] == $_POST['login'] && $fread['password'] == md5($_POST['pass'])) {
            $_SESSION['login'] = $_POST['login'];
            header("Location: profile.php");
        } else {
            function alert() {
                echo "Неверный логин или пароль!";
            }
        }
    }
    
?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Session Auth</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
  
   <div class="well">
        <form role="form" method="POST" id="form">
            <div class="form-group">
                <label for="exampleInputEmail1">Login</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Login" name="login"> </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
            </div>
            <button class="submit" type="submit" class="btn btn-default">Sign In</button>
            <span><?php if($_POST) alert(); ?></span>
        </form>
    </div>
    
    <!-- Alert Modal -->
	<div id="alertModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Сообщение!</h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ЗАКРЫТЬ</button>
                </div>
            </div>
        </div>
    </div>
<!-- End of Alert Modal -->
  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>