<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>AgitronVaja</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <?php 
            if (isset($_SESSION['username']) == '') {
                echo '<a class="btn btn-success" href="pages/login.php">Login</a>
                <a class="btn btn-success" href="pages/register.php">Register</a>
                </nav>
                <header>Please login</header>';
            }
            else {
                $username = $_SESSION['username'];
                echo '<a class="btn btn-success" href="pages/logout.php">Logout</a>
                </nav>
                <header>Welcome '.$username.'</header>';
            }
        ?>
    </header>
</body>
</html>