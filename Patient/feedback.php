<?php

$host = "localhost";
$username = "root";
$password = ""; 
$dbname = "vocal_vantage";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $Name = $_POST['name'];
    $Description = $_POST['description'];
    $rating = $_POST['rating'];

    // Validate inputs
    if (empty($Name) || empty($Description) || empty($rating)) {
        echo "All fields are required.";
        exit;
    }

    // Prepare SQL query
    $sql = "INSERT INTO feedback (name, description, rating) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if statement preparation was successful
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ssi", $Name, $Description, $rating);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo '<div class="success-container">';
        echo '<div class="success-box">';
        echo '<h1>Thank you for your feedback!</h1>';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<div class="error-container">';
        echo '<div class="error-box">';
        echo '<h1>⚠️ Something went wrong!</h1>';
        echo '<p>Error: ' . $sql . '<br>' . $conn->error . '</p>';
        echo '<button class="btn" onclick="goHome()">Back to Home</button>';
        echo '</div>';
        echo '</div>';
    }


    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <style>

/* General Styles */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient( #b3cce6,#02835640, #b3cce6);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    text-align: center;
    overflow: hidden;
    color: #333;
}

/* Success & Error Containers */
.success-container, .error-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    width: 100%;
}

.success-box, .error-box {
    background: linear-gradient(135deg, #b3cce6, #E9EDF4);
    padding: 30px 50px;
    border-radius: 20px;
    border: 2px solid #204060;
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15), 0px -10px 20px rgba(255, 255, 255, 0.8);
    max-width: 500px;
    animation: fadeIn 1s ease, popIn 0.5s ease;
}

h1 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #204060;
}

p {
    font-size: 1.2rem;
    margin-bottom: 20px;
    color: #666;
}

/* Back to Home Button */
.btn {
    display: block;
    width: 100%;
    padding: 12px;
    background: linear-gradient( #E9EDF4,#b3cce6);
    border: 2px solid #b3cce6;
    color: #204060;
    border: none;
    border-radius: 10px 10px 10px 10px;
    font-size: 1.1em;
    font-weight: 700;
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    font-size: 1.3em;
    background: linear-gradient(135deg, #19334d, #E9EDF4);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}

/* Media Queries for Responsiveness */
@media (max-width: 768px) {
    .success-box, .error-box {
        padding: 20px 30px;
        width: 90%;
    }

    h1 {
        font-size: 1.8rem;
    }

    p {
        font-size: 1rem;
    }

    .btn {
        font-size: 1rem;
        padding: 10px 15px;
    }
}

/* Animations */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes popIn {
    0% {
        transform: scale(0.9);
    }
    100% {
        transform: scale(1);
    }
}

    </style>
</head>

<body>



</body>

</html>
