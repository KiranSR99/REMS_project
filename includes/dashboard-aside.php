<?php 
// include '../checkLogin.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$admin_id = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMS Dashboard</title>

</head>

<body>

    <aside>
        <div class="side-navbar">
            <ul>
                <li class="active" id="dashboard"><a href="http://localhost/rems_project/dashboard/dashboard.php"><span
                            class="fas fa-tachometer-alt"></span><span>Dashboard</span></a></li>
                <li id="events"><a href="http://localhost/rems_project/dashboard/events/events.php"><span
                            class="fa fa-calendar-days"></span><span>Events</span></a>
                </li>
                <li id="reservations"><a
                        href="http://localhost/rems_project/dashboard/reservation/reservation.php"><span
                            class="fas fa-calendar-check"></span><span>Reservations</span></a></li>
                <li id="packages"><a href="http://localhost/rems_project/dashboard/packages/packages.php"><span
                            class="fas fa-box"></span><span>Packages</span></a></li>
                <li id="analytics"><a href="#"><span class="fas fa-chart-bar"></span><span>Analytics/Reports</span></a>
                </li>
                <li id="messages"><a href="http://localhost/rems_project/dashboard/message-details.php"><span
                            class="fas fa-envelope"></span><span>Messages</span></a></li>
                <li id="settings"><a href="#"><span class="fas fa-cog"></span><span>Settings</span></a></li>
            </ul>
        </div>

    </aside>

    <div class="navbar">
        <header class="header">
            <div class="logo">
                <a href="../index.php"><img class="logoImage"
                        src="http://localhost/rems_project/assets/images/HillParadise.png" alt="LOGO"></a>
            </div>
            <div class="search-container">
                <input type="text" class="search-input" id="search-input" placeholder="Search...">
                <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
                <button class="clear-button" id="clear-button" style="display: none;">
                    <img src="http://localhost/rems_project/assets/images/close.png" alt="Clear">
                </button>
            </div>
            <div class="admin-text">
                <p><?php echo $_SESSION['name']; ?></p>
                <div class="dropdown">
                    <img class="avatar" src="http://localhost/rems_project/assets/images/user.png" alt="avatar"
                        onclick="toggleDropdown()">
                    <div class="dropdown-menu" id="dropdownMenu">
                        <a href="http://localhost/rems_project/dashboard/edit-profile.php">Edit Profile</a>
                        <a
                            href="http://localhost/rems_project/dashboard/login-history.php?admin_id=<?php echo $admin_id; ?>">Login
                            History</a>
                        <a href=" #">Settings</a>
                        <a href="http://localhost/rems_project/dashboard/logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <script>
    function toggleDropdown() {
        var dropdownMenu = document.getElementById('dropdownMenu');
        dropdownMenu.classList.toggle('show');
    }

    window.addEventListener('click', function(event) {
        var dropdownMenu = document.getElementById('dropdownMenu');
        if (!event.target.matches('.avatar')) {
            dropdownMenu.classList.remove('show');
        }
    });
    </script>
</body>

</html>