<?php
include 'db.php';

$message = "";

if (isset($_POST['book'])) {
    $guest_id = $_POST['guest_id'];
    $quarter_id = $_POST['quarter_id'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];

    $sql = "INSERT INTO bookings
            (guest_id, quarter_id, check_in, check_out)
            VALUES ('$guest_id', '$quarter_id', '$check_in', '$check_out')";

    if ($conn->query($sql) === TRUE) {
        $message = "Booking successful!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hotel Booking</title>
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

<h2>Hotel Booking Form</h2>

<p><?php echo $message; ?></p>

<form method="POST">
    <label>Guest ID:</label><br>
    <input type="number" name="guest_id" required><br><br>

    <label>Quarter ID:</label><br>
    <input type="number" name="quarter_id" required><br><br>

    <label>Check-in Date:</label><br>
    <input type="date" name="check_in" required><br><br>

    <label>Check-out Date:</label><br>
    <input type="date" name="check_out" required><br><br>

    <button type="submit" name="book">Book Now</button>
</form>

</body>
</html>