<?php
include 'db.php';

$message = "";

if (isset($_POST['save_payment'])) {
    $booking_id = $_POST['booking_id'];
    $amount = $_POST['amount'];
    $payment_date = $_POST['payment_date'];
    $payment_method = $_POST['payment_method'];
    $payment_status = $_POST['payment_status'];

    $sql = "INSERT INTO payments
            (booking_id, amount, payment_date, payment_method, payment_status)
            VALUES
            ('$booking_id', '$amount', '$payment_date',
             '$payment_method', '$payment_status')";

    if (mysqli_query($conn, $sql)) {
        $message = "Payment saved successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hotel Payment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <nav>
            <a href="index.php">HOME</a>
            <a href="quarter.php">ROOMS</a>
            <a href="bookings.php">BOOKINGS</a>
            <a href="payments.php">PAYMENTS</a>
            <a href="guests.php">GUESTS</a>
    </nav>

<h2>Hotel Payment Form</h2>

<p><?php echo $message; ?></p>

<form method="POST">
    <label>Booking ID:</label><br>
    <input type="number" name="booking_id" required><br><br>

    <label>Amount:</label><br>
    <input type="number" name="amount" min="1" step="0.01" required><br><br>

    <label>Payment Date:</label><br>
    <input type="date" name="payment_date" required><br><br>

    <label>Payment Method:</label><br>
    <select name="payment_method" required>
        <option value="">Select Method</option>
        <option value="Cash">Cash</option>
        <option value="Mobile Money">Mobile Money</option>
        <option value="Bank Transfer">Bank Transfer</option>
    </select><br><br>

    <label>Payment Status:</label><br>
    <select name="payment_status" required>
        <option value="Pending">Pending</option>
        <option value="Paid">Paid</option>
    </select><br><br>

    <button type="submit" name="save_payment">
        Save Payment
    </button>
</form>

</body>
</html>