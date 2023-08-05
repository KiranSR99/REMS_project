<?php
include './dashboard/checkLogin.php';
include './config/database.php';
$table = "events_tbl";
$table2 = "reservation_tbl";
$conn = new database();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Payment</title>
    <?php include './includes/links.php'; ?>

    <style>
    .payment {
        display: grid;
        place-items: center;
        height: 300px;
    }

    .pay {
        border: none;
        padding: 30px 60px;
        border-radius: 5px;
        background-color: #60bb46;
        color: #fff;
        font-weight: 700;
        font-size: 20px;
        font-family: 'Open Sans', sans-serif;
        cursor: pointer;
    }
    </style>

</head>

<body>
    <?php include './includes/header.php'; ?>

    <!-- <div class="container">
        <div class="payment">
            <form action="https://uat.esewa.com.np/epay/main" method="POST">
                <input value="100" name="tAmt" type="hidden">
                <input value="90" name="amt" type="hidden">
                <input value="5" name="txAmt" type="hidden">
                <input value="2" name="psc" type="hidden">
                <input value="3" name="pdc" type="hidden">
                <input value="EPAYTEST" name="scd" type="hidden">
                <input value="ee2c3ca1-696b-4cc5-a6be-2c40d929d453" name="pid" type="hidden">
                <input value="http://merchant.com.np/page/esewa_payment_success?q=su" type="hidden" name="su">
                <input value="http://merchant.com.np/page/esewa_payment_failed?q=fu" type="hidden" name="fu">
                <input class="pay" type="submit" value="Pay with Esewa">
            </form>
        </div>
    </div> -->

    <div class="container">
        <div class="payment">
            <form id="paymentForm" action="https://uat.esewa.com.np/epay/main" method="POST">
                <input value="100" name="tAmt" type="hidden">
                <input value="90" name="amt" type="hidden">
                <input value="5" name="txAmt" type="hidden">
                <input value="2" name="psc" type="hidden">
                <input value="3" name="pdc" type="hidden">
                <input value="EPAYTEST" name="scd" type="hidden">
                <input value="ee2c3ca1-696b-4cc5-a6be-2c40d929d453" name="pid" type="hidden">
                <input value="http://merchant.com.np/page/esewa_payment_success?q=su" type="hidden" name="su">
                <input value="http://merchant.com.np/page/esewa_payment_failed?q=fu" type="hidden" name="fu">
                <input class="pay" type="button" value="Pay with Esewa" onclick="handlePayment()">
            </form>
        </div>
    </div>

    <!-- eSewa ID: 9806800001/2/3/4/5
    Password: Nepal@123 -->


    <?php include './includes/footer.php'; ?>

    <script>
    function handlePayment() {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "send_email.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log("Email sent!");
                // Proceed with the payment form submission
                document.getElementById("paymentForm").submit();
            }
        };
        xhr.send();

        // Optionally, you can show a loading spinner while the email is being sent
        // and hide it after the email is sent and the payment form is submitted.
        // (Note: The following code assumes you have a loading spinner with the id "loadingSpinner")
        document.getElementById("loadingSpinner").style.display = "block";

        // You can also handle error scenarios and hide the loading spinner accordingly.
    }
    </script>
</body>

</html>