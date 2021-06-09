<?php 
session_start(); 
if(!empty($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form handling in PHP</title>
    <style>
        fieldset {
            width: 1000px; 
            margin: auto;
            display: block;
            position: relative;
            border-radius: 5px;
        }
        fieldset form input {
            display: block;
            width: 100%;
            height: 80px;
            margin: 20px auto;
            font-size: 22px;
            padding: 10px;
            box-sizing: border-box;
        }
        fieldset form button {
            position: relative;
            float: right;
            height: 60px;
            width: 20%;
            font-size: 22px;
        }
        .is-invalid {
            color: #FF4430;
        }
    </style>
</head>
<body>
    <fieldset>
        <legend><h1>Log in to your account</h1></legend>
        <form action="handle-form.php" method="POST">
            <input type="text" name="username" placeholder="Username or Email">
            <?php
            if(isset($errors['username'])) {
                foreach($errors['username'] as $error) {
                    ?>
                    <small class="is-invalid"><?= $error ?></small>
                    <?php
                }
            } 
            ?>
            <input type="password" name="password" placeholder="Password">
            <?php 
             if(isset($errors['password'])) {
                foreach($errors['password'] as $error) {
                    ?>
                    <small class="is-invalid"><?= $error ?></small>
                    <?php
                }
            } ?>
            <button type="submit">Login</button>
        </form>
    </fieldset>

    <pre><code>
    <?php 
        unset($_SESSION['errors']); 
        session_destroy();
    ?>
    </code></pre>
</body>
</html>