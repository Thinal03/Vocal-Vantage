<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vocal_vantage";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Corrected SQL query with WHERE clause for patient_type = 'adult'
$sql = "SELECT report_id, patient_name, patient_type, therapist_name, subject, description, special_note 
        FROM therapist_report 
        WHERE patient_type IN ('patient_specialneeds', 'patient_child')";

// Check if the query was successful
$result = $conn->query($sql);
if (!$result) {
    die("Query failed: " . $conn->error); // Output error message if the query fails
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient's Report</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: white;
            color: #000E00;
            animation: fadeIn 1s ease-in-out;
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
            height: 80px;
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
            color: #028355;
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
            color: #028355;
        }
        .auth-buttons .signup:hover {
            font-weight: bold;
            font-size: 1rem;
            color: #028355;
            animation: buttonHover 0.3s forwards;
        }
        /* General Styling */
        .report-container {
            margin: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }
        .report-container h2 {
            text-align: center;
            font-size: 1.6rem;
            color: #204060;
            margin-bottom: 20px;
        }
        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            overflow-x: auto;
        }
        thead th {
            background: linear-gradient( #E9EDF4, #02835640, #E9EDF4);
            color: #204060;
            padding: 10px;
            text-align: left;
            font-size: 1.1rem;
        }
        tbody td {
            padding: 10px;
            font-size: 1rem;
            color: #000E00;
            border-bottom: 1px solid #e0e0e0;
        }
        tbody tr:nth-child(odd) {
            background-color: #E9EDF4;
        }
        /* Hover Animation */
        tbody tr {
            transition: background-color 0.3s ease;
            border: 1px solid #02835640;
        }
        tbody tr:hover {
            background-color: #e0f7fa;
        }
        tbody td {
            transition: transform 0.3s ease;
        }
        tbody tr:hover td {
            background-color: #E9EDF4;
            transform: scale(1.01);
            border: 1px solid #02835640;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        /* No Reports Row */
        tbody td[colspan] {
            text-align: center;
            color: #999;
            font-size: 16px;
            padding: 20px;
        }
        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        table {
            animation: fadeIn 0.6s ease-in-out;
        }
        h2 {
            animation: fadeIn 0.8s ease-in-out;
        }
        /* Responsive Design */
        @media (max-width: 768px) {
            thead th {
                font-size: 14px;
                padding: 8px;
            }
            tbody td {
                font-size: 12px;
                padding: 8px;
            }
        }
        @media (max-width: 480px) {
            table {
                font-size: 12px;
            }
            thead th, tbody td {
                padding: 6px;
            }
            h2 {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>

        <!-- Navbar -->
        <header class="navbar">
            <img src="../Resourses/index/logo 01.png">
            <div class="logo">Vocal Vantage</div>
            <div class="auth-buttons">
                <a href="patient_specialneeds Home page.php"><button class="signup">Back to Home</button></a>
            </div>
        </header>

    <div class="report-container">
        <h2>Patient Reports</h2>
        <table>
            <thead>
                <tr>
                    <th>Report Id</th>
                    <th>Patient Name</th>
                    <th>Patient Type</th>
                    <th>Therapist Name</th>
                    <th>Therapy Outcomes</th>
                    <th>Guardian Name</th>
                    <th>Report Date and Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are any results
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['report_id'] . "</td>";
                        echo "<td>" . $row['patient_name'] . "</td>";
                        echo "<td>" . $row['patient_type'] . "</td>"; // Display patient_type here
                        echo "<td>" . $row['therapist_name'] . "</td>";
                        echo "<td>" . $row['subject'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>" . $row['special_note'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No reports available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
