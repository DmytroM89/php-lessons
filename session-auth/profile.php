<?php
    define('FILENAME', 'users.txt'); // Константа имени файла
    
    session_start();

    if(isset($_SESSION)) {
        $fread = unserialize(file_get_contents(FILENAME));
        if($_SESSION['login'] == $fread['login']) {
            function sayHi () {
                echo '<div class="well">';
                echo '<h1>Hello '.$_SESSION['login'].'!</h1>';
                echo '</div>';
            }
            
        } else {
            header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php sayHi (); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>