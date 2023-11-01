<main>
    <header class="navbar">
        <div class="header">
            <div class="logo">
                <a href="index.php"><img src="./assets/images/HillParadise.png" alt="LOGO"></a>
            </div>

            <div class="menus">
                <div class="menu-container">
                    <ul>
                        <li><a class="active" href="index.php">Home</a></li>
                        <li><a href="events.php">Events</a></li>
                        <li><a href="packages.php">Packages</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a class="btn" href="#">Reserve Now</a></li>
                    </ul>
                </div>

                <div class="contact-container">
                    <ul>
                        <li><a class="number" href="#">9812345678</a></li>
                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-tiktok"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</main>

<script>
document.addEventListener("DOMContentLoaded", function() {
    window.addEventListener("scroll", function() {
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
    });


    // JAVASCRIPT TO TOGGLE THE ACTIVE CLASS IN NAVBAR MENUS
    const currentPage = window.location.href;

    const menuItems = document.querySelectorAll(".menus li a");

    menuItems.forEach(menuItem => {
        if (menuItem.href === currentPage) {
            console.log(menuItem.href);
            menuItem.classList.add('active');
        } else {
            menuItem.classList.remove('active');
        }
    });
});
</script>