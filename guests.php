<?php
include 'db.php';

$message = "";

if (isset($_POST['save_guest'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO guests (full_name, email, phone)
            VALUES ('$full_name', '$email', '$phone')";

    if (mysqli_query($conn, $sql)) {
        $message = "Guest saved successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guest Registration</title>
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

<h2>Register Guest</h2>

<p><?php echo $message; ?></p>

<form method="POST">
    <label>Full Name:</label><br>
    <input type="text" name="full_name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Phone:</label><br>
    <input type="text" name="phone"><br><br>

    <button type="submit" name="save_guest">Save Guest</button>
</form>

</body>
</html>