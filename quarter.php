<?php
include 'db.php';

$sql = "SELECT * FROM quarters";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Hotel Quarters</title>
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

    <h1>Available Hotel Quarters</h1>

    <?php
    if ($result->num_rows > 0) {
        while ($quarter = $result->fetch_assoc()) {
            echo "<h3>" . htmlspecialchars($quarter['quarter_number']) . "</h3>";
            echo "<p>Type: " . htmlspecialchars($quarter['quarter_type']) . "</p>";
            echo "<p>Price: Tsh ". number_format($quarter['price']) . "</p>";
            echo "<p>Status: ". htmlspecialchars($quarter['status']) . "</p>";
            echo "<hr>";
        }
    } else {
        echo "No quarters found.";
    }
    ?>

    </body>
</html>


