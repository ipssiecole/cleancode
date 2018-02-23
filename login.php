<?php

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

if ($username === 'toto' && $password === '0000') {
    header('Location: hello.php');
}

?><!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>

    <form action="login.php" method="POST">
        <div class="form-control">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="form-control">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <input type="submit">
    </form>

    <!-- ul>(li>a{Item $})*50 -->

</body>
</html>
