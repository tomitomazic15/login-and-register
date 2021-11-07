<?php
    session_start();
    require('../includes/config.php');
    if(isset($_POST['username']) and isset($_POST['password'])) {
        $username = stripslashes($_POST['username']);
        
        $username = mysqli_real_escape_string($db, $username);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($db, $password);
        
        $query = "SELECT * FROM users WHERE username='$username' and password='".md5($password)."'";

        $result = mysqli_query($db,$query) or die(mysqli_error($db));
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $_SESSION['username'] =  $username;

            header("location: ../index.php");
        }else{
            $error = "Incorrect username or password";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>Sign up</title>
</head>
<body>
    <div>
        <h1 class="text-center m-4">Please log in</h1>
    </div>
    <div>
        <form action = "" method="post">
        <?php if(isset($error)){ ?><div class="alert alert-danger" role="alert"> <?php echo $error; ?> </div><?php } ?>
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" value=" Submit " class="btn btn-primary">Log in</button>
        </form>
    </div>
</body>
</html>