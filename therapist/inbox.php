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

// Fetch messages
$sql = "SELECT Msg_id, patient_name, therapist_name, subject, message, sent_at FROM paitentmessage ORDER BY sent_at DESC";
$result = $conn->query($sql);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Queries</title>
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


/* Form Container */
.inbox-container {
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
    color: #4A90E2;
    margin-bottom: 20px;
    font-size: 2rem;
    letter-spacing: 2px;
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 10px;
    overflow: hidden;
}

thead {
    background: linear-gradient(135deg, #b3cce6, #E9EDF4);
    color: #204060;
    
}

th {
    background: linear-gradient(135deg, #b3cce6, #E9EDF4);
        color: #204060;
        padding: 12px;
        text-align: left;
        font-size: 1rem;
}
td{
        padding: 10px;
        border: 2px solid #b3cce6;
        font-size: 17px;
        cursor: pointer;
        color: #000E00;
}
tr {
    transition: all 0.3s ease-in-out;
    border: 2px solid #b3cce6;
}

tr:nth-child(even) {
    background-color: #f9fbff;
}

tr:hover {
    background-color: #E9EDF4;
    transform: scale(1.01);
    border: 2px solid #b3cce6;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Button Styles */
button {
    background-color: #4A90E2;
    color: white;
    border: none;
    padding: 5px 15px;
    cursor: pointer;
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 4px 10px rgba(74, 144, 226, 0.4);
}

button:hover {
    background-color: #357ABD;
    transform: translateY(-2px);
}

button:active {
    background-color: #2E5A91;
    transform: translateY(1px);
}

a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
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

/* Mobile Responsiveness */
@media (max-width: 768px) {
    .inbox-container {
        padding: 15px;
    }

    h2 {
        font-size: 2rem;
    }

    table, thead, tbody, th, td, tr {
        display: block;
    }

    tr {
        margin-bottom: 20px;
    }

    th, td {
        display: flex;
        justify-content: space-between;
        padding: 10px;
        font-size: 0.9rem;
    }

    th::after {
        content: "";
    }
}

@media (max-width: 480px) {
    h2 {
        font-size: 1.8rem;
    }

    th, td {
        font-size: 0.85rem;
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
            <a href="therapist.php"><button class="signup" >Back to Home</button></a>
        </div>
    </header>

<div class="inbox-container">
    <h2>Patient Queries</h2>
    <table>
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Therapist Name</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Received At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['patient_name']) . "</td>
                            <td>" . htmlspecialchars($row['therapist_name']) . "</td>
                            <td>" . htmlspecialchars($row['subject']) . "</td>
                            <td>" . htmlspecialchars($row['message']) . "</td>
                            <td>" . htmlspecialchars($row['sent_at']) . "</td>
                            <td>
                                <form action='reply_message.php' method='POST'>
                                    <input type='hidden' name='message_id' value='" . $row['Msg_id'] . "'>
                                    <button><a href='therapist_message.html'>Reply</a></button>
                                </form>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No messages found.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
