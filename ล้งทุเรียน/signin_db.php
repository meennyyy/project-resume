<?php
session_start(); // Start session for user role management

// Database connection
$serverName = "LAPTOP-3D1BJBN0";
$connectionOptions = [
    "Database" => "DurianSales",
    "Uid" => "sa",
    "PWD" => "meen6530"
];

// Connect to SQL Server
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // SQL query to find the user by email
    $sql = "SELECT * FROM users WHERE email = ?";
    $params = array($email);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Check if a user is found
    if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $_SESSION['user_role'] = $row['urole']; // Store user role in session

        // Redirect based on user role
        if ($row['urole'] == "admin") {
            header("Location: admin.php");
            exit();
        } elseif ($row['urole'] == "user") {
            header("Location: durianhome.php");
            exit();
        }
    } else {
        // Redirect back to the login page if no user is found (optional)
        header("Location: signin.php");
        exit();
    }

    sqlsrv_free_stmt($stmt);
}

sqlsrv_close($conn);
?>