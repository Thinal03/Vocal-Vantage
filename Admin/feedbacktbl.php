<?php
// Database connection
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

// Set the charset for the connection
$conn->set_charset("utf8");

// Fetch feedback data
$sql = "SELECT Feedback_id, name, description, rating FROM feedback ORDER BY Feedback_id DESC";
$result = $conn->query($sql);

// Check for SQL errors
if (!$result) {
    die("SQL Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Feedback</title>
    <style>
       /* General Reset */
       * {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background: linear-gradient( #E9EDF4,#b3cce6, #E9EDF4);
    min-height: 80vh;
        }
        /* Keyframes for animations */
        
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        
        @keyframes slideIn {
            from {
                transform: translateX(-20px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes buttonHover {
            from {
                transform: scale(1);
            }
            to {
                transform: scale(1.1);
            }
        }
        
        header {
            position: relative;
            height: 50px;
        }
        /* Navbar */
        
        .navbar {
            display: flex;
            align-items: center;
            padding: 1.0rem 3rem;
            background-color: #E9EDF4;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .navbar .logo {
            font-size: 1.3rem;
            font-weight: bold;
            color: #204060;
            background-color: #FFFFFF;
            padding: 0.5rem 0.8rem;
            border-radius: 35px;
            animation: slideIn 4s ease forwards;
        }
        img{
            width: 100px;
            height: 100px;
        }
        .navbar .auth-buttons {
            margin-left: 1000px;
            background-color: #FFFFFF;
            padding: 0.01rem 0.5rem;
            border-radius: 35px;
            
        }
        
        .auth-buttons .signup {
            padding: 0.6rem 1.0rem;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s, color 0.3s;
        }
        
        .auth-buttons .signup {
            background-color: transparent;
            color: #204060;
        }
        
        .auth-buttons .signup:hover {
            font-weight: bold;
            font-size: 1rem;
            color: #204060;
            animation: buttonHover 0.3s forwards;
        }

        .dashboard-container {
    max-width: 1200px;
    margin: 30px auto;
    padding: 20px;
    background: linear-gradient(to bottom right, #ffffff, #f0f4ff);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    border-radius: 15px;
    overflow: hidden;
}

h2 {
    text-align: center;
    color: #204060;
    margin-bottom: 20px;
    font-size: 2rem;
    letter-spacing: 2px;
    animation: slideIn 1s ease-in-out;
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #fff;
    margin-top: 20px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 10px;
    overflow: hidden;
}

table thead {
    background: linear-gradient(135deg, #b3cce6, #E9EDF4);
    color: #204060;
}

table th, table td {
    padding: 12px 15px;
    text-align: left;
    font-size: 14px;
    border-bottom: 1px solid #ddd;
}

table th {
    background: linear-gradient(135deg, #b3cce6, #E9EDF4);
    color: #204060;
        padding: 12px;
        text-align: left;
        font-size: 1rem;
}
table td{
        padding: 10px;
        border: 2px solid #b3cce6;
        font-size: 17px;
        cursor: pointer;
        color: #000E00;
}
table tr {
    transition: background-color 0.3s ease, transform 0.3s ease;
}

table tr:hover {
    background-color: #f4f4f9;
}

table img {
    width: 50px;
    height: 50px;
    align-items: center;
    object-fit: cover;
}

/* Action Buttons */
a.edit-btn,
a.delete-btn {
    text-decoration: none;
    font-size: 14px;
    padding: 8px 12px;
    border-radius: 5px;
    margin-right: 5px;
    display: inline-block;
    transition: background-color 0.3s, color 0.3s, transform 0.3s;
}

a.edit-btn {
    background-color: #028355;
    color: white;
    animation: pulse 2s infinite alternate;
}

a.edit-btn:hover {
    background-color: #218838;
    transform: scale(1.1);
}

a.delete-btn {
    background-color: #dc3545;
    color: white;
}

a.delete-btn:hover {
    background-color: #c82333;
    transform: scale(1.1);
}
    </style>
</head>

<body>

            <!-- Navbar -->
            <header class="navbar">
                <img src="../Resourses/index/logo 01.png">
                <div class="logo">Vocal Vantage</div>
        
                <div class="auth-buttons">
                    <a href="platformreport_home.html"><button class="signup" >Back to Home</button></a>
                </div>
            </header>
        <br>

        <div class="dashboard-container"><br>
        <h2>Admin Dashboard - Feedback </h2><br>

        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Feedback</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['Feedback_id']; ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['description']); ?></td>
                            <td>
                                <?php
                                // Display star ratings
                                for ($i = 1; $i <= $row['rating']; $i++) {
                                    echo '&#9733;'; // Filled star
                                }
                                for ($i = $row['rating'] + 1; $i <= 5; $i++) {
                                    echo '&#9734;'; // Empty star
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-data">No feedback available.</p>
        <?php endif; ?>
    </div>

</body>

</html>
