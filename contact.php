<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <?php include './includes/links.php'; ?>

</head>

<body>
    <?php include './includes/header.php'; ?>

    <section>
        <div class="banner"><img src="./assets/images/FeelParadiseBanner.png" alt=""></div>

        <div class="container">
            <div class="title">
                <h1>Contact Us</h1>
            </div>
            <div class="card">
                <div class="column-1">
                    <img src="./assets/images/resortTree.jpg" alt="">
                </div>
                <div class="contact-details">
                    <div>
                        <h1>Hill Paradise Resort</h1>
                        <p>Discover Hill Paradise Resort, where nature's beauty meets exceptional events. Nestled in
                            Nepal's
                            hilly region, our enchanting retreat offers a breathtaking backdrop for weddings, birthdays,
                            and
                            meetings. Experience luxurious accommodations, versatile spaces, and impeccable services
                            amidst
                            majestic peaks and cascading waterfalls. Create unforgettable memories at Hill Paradise
                            Resort,
                            where extraordinary events are inspired by nature's tranquility.
                        </p>
                    </div>
                    <div class="contact-info">
                        <h1 class="title-footer">Contact Us</h1>
                        <p>Kathmandu, Nepal</p>
                        <p>Phone: 9812345678</p>
                        <p>hillparadise@sample.com</p>
                    </div>
                </div>
            </div>

            <div class="card contact">
                <div class="column-1">
                    <form action="" method="post">
                        <h3>Speak With Us</h3>
                        <p>Our team would be happy to assist you with any enquiries.</p>

                        <div class="fields">
                            <input type="text" placeholder="Enter Your Name">
                            <input type="text" placeholder="Enter Your Mobile Number">
                            <input type="email" placeholder="Enter Your Email">
                            <input type="text" placeholder="Subject">
                            <textarea name="message" id="" cols="30" rows="8" placeholder="Message">Message</textarea>
                        </div>
                        <input class="btn" type="submit">
                    </form>
                </div>
                <div class="column-2 map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113032.64621395394!2d85.25609251320085!3d27.708942727046708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2044600!5e0!3m2!1sen!2snp!4v1685757376472!5m2!1sen!2snp"
                        width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <?php include './includes/footer.php'; ?>

</body>

</html>