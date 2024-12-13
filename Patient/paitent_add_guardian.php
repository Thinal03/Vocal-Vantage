<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vocal_vantage";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $Conpassword = $_POST['Conpassword'];
    $role = $_POST['role'];

    $sql = "INSERT INTO register (name, email, password, Conpassword, role) VALUES ('$name' , '$email' , '$password', '$Conpassword', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="success-container">';
        echo '<div class="success-box">';
        echo '<h1>Guardiand account registration successful!</h1>';
        echo '<p>Thank you for reaching out.</p>';
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
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Message</title>
    
    <style>

/* General Styles */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient( #E9EDF4,#02835640, #E9EDF4);
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
    background: linear-gradient(135deg, #02835640, #E9EDF4);
    padding: 30px 50px;
    border-radius: 20px;
    border: 2px solid #028355;
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15), 0px -10px 20px rgba(255, 255, 255, 0.8);
    max-width: 500px;
    animation: fadeIn 1s ease, popIn 0.5s ease;
}

h1 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #028355;
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
    background: linear-gradient( #E9EDF4,#02835640);
    border: 2px solid #02835640;
    color: #028355;
    border: none;
    border-radius: 10px 10px 10px 10px;
    font-size: 1em;
    font-weight: 700;
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    font-size: 1.1em;
    background: linear-gradient(135deg, #02835640, #E9EDF4);
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
<script>
        function goHome() {
            window.location.href = "patient Home page.php"; // Replace with your actual home page URL
        }
    </script>
</body>
</html>