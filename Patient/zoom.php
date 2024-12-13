<?php

$meeting_id = "2946649419";
$meeting_password = "5Xwnsq";

$zoom_meeting_url = "https://zoom.us/j/$meeting_id?pwd=$meeting_password";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient_name = trim($_POST['patient_name']);

    // Validate the patient name
    if (!empty($patient_name)) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "vocal_vantage";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO live_session_attendance (patient_name) 
                VALUES ('$patient_name')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    window.location.href = '$zoom_meeting_url';
                  </script>";
            exit();
        } else {
            $error_message = "Error recording attendance: " . $conn->error;
        }

        $conn->close();
    } else {
        $error_message = "Please enter your name before joining the meeting.";
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vocal_vantage";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Modify the query to select only 'patient_adult'
$sql = "SELECT App_id, Patient_name, Age, Therapist, Date, Time 
        FROM appoinments 
        WHERE role = 'patient_adult'";

$result = $conn->query($sql);

if (!$result) {
    die("Error executing query: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attend Live  Sessions</title>
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


        
/* Report Container */
.report-container {
    margin: 20px;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
  overflow-x: auto;
}

.report-container h2 {
  text-align: center;
  font-size: 1.6rem;
    color: #028355;
    margin-bottom: 20px;
}

.error-message {
  color: #ff4c4c;
  text-align: center;
  margin-bottom: 10px;
}

/* Table Styling */
table {
  width: 100%;
  border-collapse: collapse;
}

thead tr {
    background: linear-gradient( #E9EDF4,#02835640, #E9EDF4);
    color: #204060;
}

thead th {
  padding: 15px;
  text-align: left;
  font-size: 16px;
  
}

tbody tr {
  border-bottom: 1px solid #e0e0e0;
  transition: background-color 0.3s;
}

tbody tr:hover {
    background-color: #E9EDF4;
    color: #000E00;
}

tbody td {
  padding: 12px;
  font-size: 14px;
}

tbody td form {
  display: inline-block;
}

tbody td input {
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 20px;
  outline: none;
  font-size: 14px;
  transition: all 0.3s;
}

tbody td input:focus {
  border-color: #007bff;
  box-shadow: 0 4px 10px rgba(0, 123, 255, 0.2);
}

tbody td button {
  padding: 10px 15px;
  background-color: #204060;
  color: white;
  font-weight: bold;
  border: none;
  border-radius: 20px;
  font-size: 16px;
  cursor: pointer;
  transition: all 0.3s ease;
}

tbody td button:hover {
  background: linear-gradient(135deg, #E9EDF4,#02835640);
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  transform: scale(1.05);
  color: #204060;
  font-weight: bold;
}

/* Modal Styling */
.popup-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  z-index: 999;
  display: none;
  animation: fadeIn 0.3s;
}

.popup {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 90%;
  max-width: 400px;
  background: white;
  border-radius: 20px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
  z-index: 1000;
  padding: 20px;
  text-align: center;
  display: none;
  animation: popIn 0.4s;
}

.popup h3 {
  color: #204060;
  font-size: 22px;
  margin-bottom: 15px;
}

.popup p {
  font-size: 16px;
  margin-bottom: 20px;
  font-style: bold;
  color: #000E000;
}

.popup button {
  padding: 10px 15px;
  border: none;
  border-radius: 20px;
  cursor: pointer;
  font-size: 14px;
  transition: all 0.3s ease;
}

#confirm-join {
  background: linear-gradient(135deg, #007bff, #0056b3);
  color: white;
  margin-right: 10px;
}

#confirm-join:hover {
  background: linear-gradient(135deg, #0056b3, #003d82);
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  transform: scale(1.05);
  font-weight: bold;
}

#cancel-join {
  background: #ff4c4c;
  color: white;
}

#cancel-join:hover {
  background: #e63939;
  transform: scale(1.05);
  font-weight: bold;
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
  from {
    transform: translate(-50%, -45%);
    opacity: 0;
  }
  to {
    transform: translate(-50%, -50%);
    opacity: 1;
  }
}

/* Responsive Design */
@media (max-width: 768px) {
  .report-container {
    padding: 15px;
  }

  table {
    font-size: 12px;
  }

  thead th,
  tbody td {
    padding: 10px;
  }

  tbody td input {
    font-size: 12px;
  }

  tbody td button {
    font-size: 12px;
    padding: 8px 12px;
  }

  .popup {
    width: 95%;
    max-width: 300px;
    padding: 15px;
  }

  .popup h3 {
    font-size: 18px;
  }

  .popup p {
    font-size: 14px;
  }

  .popup button {
    font-size: 12px;
    padding: 8px 10px;
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
                <a href="patient Home page.php"><button class="signup" >Back to Home</button></a>
            </div>
        </header>


        <div class="report-container"><br>
    <h2>Attend Live Sessions</h2><br>
    <?php if (isset($error_message)) : ?>
        <p class="error-message"><?= htmlspecialchars($error_message); ?></p>
    <?php endif; ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Age</th>
                <th>Therapist</th>
                <th>Date</th>
                <th>Time</th>
                <th>Link & Passcode</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['App_id']}</td>
                        <td>{$row['Patient_name']}</td>
                        <td>{$row['Age']}</td>
                        <td>{$row['Therapist']}</td>
                        <td>{$row['Date']}</td>
                        <td>{$row['Time']}</td>
                        <td><center>
                            <form method='POST' id='join-form'>
                                <label for='patient_name'>Enter Your Name:</label>
                                <input type='text' id='patient_name' name='patient_name' placeholder='Your name' required><br>
                                <br><button type='submit'>Join Now</button>
                            </center></form>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No adult appointments found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    </div>

    <!-- Popup Modal -->
    <div id="popup-overlay" class="popup-overlay"></div>
    <div id="popup" class="popup">
        <h3>Are you sure you want to join the session?</h3>
        <p id="patient-name-display"></p>
        <p><strong>Passcode:</strong> 5Xwnsq (Use this Passcode)</p>
        <button id="confirm-join">Yes, Join</button>
        <button id="cancel-join">Cancel</button>
    </div>

    <script>
        // Popup functionality
        const form = document.getElementById('join-form');
        const popup = document.getElementById('popup');
        const overlay = document.getElementById('popup-overlay');
        const patientNameInput = document.getElementById('patient_name');
        const patientNameDisplay = document.getElementById('patient-name-display');
        const confirmJoinButton = document.getElementById('confirm-join');
        const cancelJoinButton = document.getElementById('cancel-join');

        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            // Display the popup
            const patientName = patientNameInput.value.trim();
            if (patientName) {
                patientNameDisplay.textContent = "Patient Name: " + patientName;
                popup.style.display = 'block';
                overlay.style.display = 'block';
            } else {
                alert("Please enter your name before joining.");
            }
        });

        confirmJoinButton.addEventListener('click', function() {
            form.submit(); // Submit the form after confirming
        });

        cancelJoinButton.addEventListener('click', function() {
            popup.style.display = 'none';
            overlay.style.display = 'none';
        });
    </script>
</body>
</html>

<?php
$conn->close();
?>
