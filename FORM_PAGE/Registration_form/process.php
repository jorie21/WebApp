<?php
require "config.php";

if (isset($_POST)) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $gender = $_POST["gender"];
    $birthday = $_POST["birthday"];

    $errors = array();

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }

    // Check password length
    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 characters long");
    }

    // Check if passwords match
    if ($password !== $confirmPassword) {
        array_push($errors, "Password does not match");
    }

    // Check if email already exists
    $query = "SELECT * FROM Users WHERE email = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        $rowCount = $stmt->num_rows;
        if ($rowCount > 0) {
            array_push($errors, "Email already exists!");
        }

        $stmt->close();
    } else {
        array_push($errors, "Error preparing statement for email check");
    }

    if (count($errors) > 0) {
        // Display errors
        $errorMsg = implode("<br>", $errors);
        echo "Error: " . $errorMsg;
    } else {
        // Insert data into the database
        $query = "INSERT INTO Users (FirstName, LastName, UserName, Email, Password, Gender, Birthday) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmtinsert = $conn->prepare($query);

        if ($stmtinsert) {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $stmtinsert->bind_param("sssssss", $firstname, $lastname, $username, $email, $passwordHash, $gender, $birthday);

            // Execute the statement
            $result = $stmtinsert->execute();

            if ($result) {
                echo 'Successfully saved.';
            } else {
                echo "Error executing the query: " . $stmtinsert->error;
            }

            // Close the statement
            $stmtinsert->close();
        } else {
            echo 'Error preparing statement for data insertion';
        }
    }

    // Close the database connection
    $conn->close();
}
?>
