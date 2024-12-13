<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vocal_vantage";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle edit action
if (isset($_GET['edit'])) {
    $app_id = $_GET['edit'];
    $edit_query = "SELECT * FROM appoinments WHERE App_id = '$app_id'";
    $result = $conn->query($edit_query);
    $appointment = $result->fetch_assoc();
    if (isset($_POST['update'])) {
        $patient_name = $_POST['Patient_name'];
        $role = $_POST['role'];
        $age = $_POST['Age'];
        $therapist = $_POST['Therapist'];
        $date = $_POST['Date'];
        $time = $_POST['Time'];

        $update_query = "UPDATE appoinments SET Patient_name = '$patient_name', role = '$role', Age = '$age', Therapist = '$therapist', Date = '$date', Time = '$time' WHERE App_id = '$app_id'";
        if ($conn->query($update_query) === TRUE) {
            header("Location: " . $_SERVER['PHP_SELF']); // Redirect to refresh page
        }
    }
}

// Handle delete action
if (isset($_GET['delete'])) {
    $app_id = $_GET['delete'];
    $delete_query = "DELETE FROM appoinments WHERE App_id = '$app_id'";
    if ($conn->query($delete_query) === TRUE) {
        header("Location: " . $_SERVER['PHP_SELF']); // Redirect to refresh page
    }
}

// Fetch all appointments
$sql = "SELECT * FROM appoinments";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage the Appoinments</title>
    <style>
        /* Your existing CSS */
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(#E9EDF4, #b3cce6, #E9EDF4);
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

        img {
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

        table td {
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

        .action-buttons {
            display: flex;
            gap: 10px;
        }

/* Action Buttons */
.edit-button,
.delete-button {
    text-decoration: none;
    font-size: 14px;
    padding: 8px 12px;
    border-radius: 5px;
    margin-right: 5px;
    display: inline-block;
    transition: background-color 0.3s, color 0.3s, transform 0.3s;
}

.edit-button {
    background-color: #028355;
    color: white;
    animation: pulse 2s infinite alternate;
}

.edit-button:hover {
    background-color: #218838;
    transform: scale(1.1);
}

.delete-button {
    background-color: #dc3545;
    color: white;
}

.delete-button:hover {
    background-color: #c82333;
    transform: scale(1.1);
}



/* Container for the dashboard */
.dashboard-container2 {
    max-width: 600px;
    margin: 50px auto;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    animation: fadeIn 1s ease-in-out;
}

/* Heading for the form */
h2 {
    text-align: center;
    color: #204060;
    margin-bottom: 20px;
}

/* Label and Input styling */
label {
    font-weight: bold;
    margin-bottom: 8px;
    display: block;
    color: #34495e;
}

input[type="text"], input[type="number"], input[type="date"], select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

/* Focus effect */
input[type="text"]:focus, input[type="number"]:focus, input[type="date"]:focus, select:focus {
    border-color: #3498db;
    outline: none;
}

/* Button styling */
input[type="submit"] {
    background: linear-gradient(135deg, #b3cce6, #E9EDF4);
            color: #204060;
    border: none;
    padding: 10px 223px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 700;
    transition: background-color 0.3s ease;
}

/* Button hover effect */
input[type="submit"]:hover {
    color:white;
    font-weight: 700;
            background: linear-gradient(135deg, #19334d, #E9EDF4);
}

/* Animation for form fields */
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

/* Optional: Add responsive design */
@media (max-width: 600px) {
    .dashboard-container {
        padding: 15px;
        margin: 20px;
    }

    input[type="submit"] {
        width: 100%;
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
        <a href="therapist.php"><button class="signup">Back to Home</button></a>
    </div>
</header>

<div class="dashboard-container">
    <h2>Manage Appionments</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Role</th>
                <th>Age</th>
                <th>Therapist</th>
                <th>Date</th>
                <th>Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['App_id'] . "</td>";
                    echo "<td>" . $row['Patient_name'] . "</td>";
                    echo "<td>" . $row['role'] . "</td>";
                    echo "<td>" . $row['Age'] . "</td>";
                    echo "<td>" . $row['Therapist'] . "</td>";
                    echo "<td>" . $row['Date'] . "</td>";
                    echo "<td>" . $row['Time'] . "</td>";
                    echo "<td class='action-buttons'>";
                    echo "<a href='?edit=" . $row['App_id'] . "'><button class='edit-button'>Edit</button></a>";
                    echo "<a href='?delete=" . $row['App_id'] . "'><button class='delete-button'>Delete</button></a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No appointments found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
// If editing an appointment, show the edit form
if (isset($appointment)) {
    ?>
    <div class="dashboard-container2">
        <h2>Edit Appointment</h2>
        <form method="POST">
            <label for="Patient_name">Patient Name:</label>
            <input type="text" id="Patient_name" name="Patient_name" value="<?= $appointment['Patient_name']; ?>" required><br>

            <label for="role">Role:</label>
            <input type="text" id="role" name="role" value="<?= $appointment['role']; ?>" required><br>

            <label for="Age">Age:</label>
            <input type="number" id="Age" name="Age" value="<?= $appointment['Age']; ?>" required><br>

            <label for="Therapist">Therapist:</label>
            <input type="text" id="Therapist" name="Therapist" value="<?= $appointment['Therapist']; ?>" required><br>

            <label for="Date">Date:</label>
            <input type="date" id="Date" name="Date" value="<?= $appointment['Date']; ?>" required><br>

            <label for="Time">Time:</label>
            <select id="Time" name="Time" required>
                <option value="9.00 - 10.00 A.M" <?= ($appointment['Time'] == '9.00 - 10.00 A.M') ? 'selected' : ''; ?>>9.00 - 10.00 A.M</option>
                <option value="11.00 A.M - 12.00 P.M" <?= ($appointment['Time'] == '11.00 A.M - 12.00 P.M') ? 'selected' : ''; ?>>11.00 A.M - 12.00 P.M</option>
                <option value="1.00 - 2.00 P.M" <?= ($appointment['Time'] == '1.00 - 2.00 P.M') ? 'selected' : ''; ?>>1.00 - 2.00 P.M</option>
                <option value="3.00 - 4.00 P.M" <?= ($appointment['Time'] == '3.00 - 4.00 P.M') ? 'selected' : ''; ?>>3.00 - 4.00 P.M</option>
                <option value="5.00 - 6.00 P.M" <?= ($appointment['Time'] == '5.00 - 6.00 P.M') ? 'selected' : ''; ?>>5.00 - 6.00 P.M</option>
                <option value="7.00 - 8.00 P.M" <?= ($appointment['Time'] == '7.00 - 8.00 P.M') ? 'selected' : ''; ?>>7.00 - 8.00 P.M</option>
                <option value="9.00 - 10.00 P.M" <?= ($appointment['Time'] == '9.00 - 10.00 P.M') ? 'selected' : ''; ?>>9.00 - 10.00 P.M</option>
            </select><br>

            <input type="submit" name="update" value="Update Appointment">
        </form>
    </div>
<?php
}
?>

</body>
</html>

<?php
$conn->close();
?>
