<?php

require('../includes/DataBase.php'); // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $address = $_POST['address'];



    // Prepare the SQL query
    $sql = "INSERT INTO patient_managemnt (name, gender, age, address) 
    VALUES (:name, :gender, :age, :address)";

    
    // Check if $conn is valid before using it
    if ($conn) {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':address', $address);

        // Execute the statement
        if ($stmt->execute()) {
            $successMessage = "Patient inserted successfully.";
            echo $successMessage ;
        } else {
            $successMessage = "Failed to insert the patient.";
        }
    } else {
        $successMessage = "Database connection failed.";
    }

    $conn = null; // Close the connection
}

include('./header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="PatientMang.css">
    <link rel="stylesheet" href="../styling/PatientMang.css">
</head>
<body>

    <form method="POST" action="">
        <h1>Add Patient Info</h1>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <label for="age">Age</label>
        <input type="number" id="age" name="age" min="0" required>

        <label for="address">Address</label>
        <textarea id="address" name="address" rows="3" required></textarea>

        <button type="submit">Add</button>

    </form>

   <!--  <?php if (isset($successMessage)) echo "<p>$successMessage</p>"; ?> -->

</body>
</html>

<?php 
include('./footer.php');
 ?>
