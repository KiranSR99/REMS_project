<?php
session_start();

include '../config/database.php';
$table = "admin_tbl";
$conn = new database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $error = "";

    $where = "email = '$email' AND password = '$password'";
    $results = $conn->select($table, "*", $where);

    if (!empty($results)) {
        $_SESSION['name'] = $results[0]['name'];
        header('Location: http://localhost/rems_project/dashboard/dashboard.php');
        exit();

        if (isset($_POST['remember'])) {
            setcookie('name', $results[0]['name'], time() + 7 * 24 * 60 * 60);
        }
        
    } else {
        $error = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="/rems_project/CSS/dashboard.css">
    <link rel="shortcut icon" href="../assets/images/HillParadise.png" type="image/x-icon">
</head>

<body class="form-body">
    <div class="wrapper">
        <form action="#" method="post">
            <h1>Login</h1>
            <?php if (!empty($error)) : ?>
            <p><?php echo $error; ?></p>
            <?php endif; ?>
            <div class="row">
                <label for="email">Email</label>
                <input type="email" name="email">
            </div>
            <div class="row">
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>
            <div class="checkbox-row">
                <div class="remember">
                    <input type="checkbox" name="remember">
                    <span>Remember Me</span>
                </div>
                <a href="#">Forgot Password?</a>
            </div>
            <button class="login-submit" type="submit">LOGIN</button>
        </form>
    </div>
</body>

</html>