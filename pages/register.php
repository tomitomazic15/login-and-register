<?php
    session_start();
    require('../includes/config.php');
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
        <?php
        if (isset($_REQUEST['username'])) {
            // removes backslashes
            $username = stripslashes($_REQUEST['username']);

            //escapes special characters in a string
            $username = mysqli_real_escape_string($db, $username);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($db, $password);

            //add a user into db and hash the password
            $query = "INSERT into `users` (username, password) VALUES ('$username', '" . md5($password) . "')";

            $result = mysqli_query($db, $query);

            if ($result) {
                header("Refresh:2; url= login.php");
                echo "<div class='form text-center'>
                    <h3>You are registered successfully.</h3>
                    </div>";
            } else {
                header("Refresh:2; url= register.php");
                echo "<div class='form text-center'>
                    <h3>User already exist.</h3><br/>
                    </div>";
            }
        }
        else {
        ?>
        <h1 class="text-center m-4">Register</h1>
    </div>
    <div>
    <form action = "" method="post">
        <?php if(isset($error)){ ?><div class="alert alert-danger" role="alert"> <?php echo $error; ?> </div><?php } ?>
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" value="Register" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
        <?php
            }
        ?>