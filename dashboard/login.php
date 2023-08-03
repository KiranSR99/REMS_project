<?php
session_start();

include '../config/database.php';
$table = "admin_tbl";
$conn = new database();

if (isset($_SESSION['name'])) {
    header('location:http://localhost/rems_project/dashboard/dashboard.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $url = 'http://localhost:8000/login';
    
    $data = [
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ];
    
    $options = [
        'http' => [
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        ]
    ];
    
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    $api_response = json_decode($response, true);

    if (isset($api_response['admin_id'])) {
        
        date_default_timezone_set('Asia/Kathmandu');

        $_SESSION['id'] = $api_response['admin_id'];
        $_SESSION['name'] = $api_response['admin_name'];
        $_SESSION['expiry_time'] = date('Y-m-d H:i:s', time() + (24 * 60 * 60));

        $admin_id = $_SESSION['id'];
        $login_date = date('Y-m-d H:i:s');

        $data = [
            'admin_id' => $admin_id,
            'login_date' => $login_date
        ];
        $res = $conn->insert('adminloginhistory', $data);
        
        
        header('location:http://localhost/rems_project/dashboard/dashboard.php');
        exit();
    }
    elseif (isset($api_response['detail'])) {
        $error = $api_response['detail'];
    }
    else {
        $error = "Invalid email or password";
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
        <form action="" method="post">
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