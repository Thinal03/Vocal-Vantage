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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $therapist_name = $_POST['therapist_name'];
    $paitent_name = $_POST['paitent_name'];
    $guardian_name = $_POST['guardian_name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO guardian_message (therapist_name , paitent_name, guardian_name, subject, message) VALUES ('$therapist_name' , '$paitent_name' ,  '$guardian_name' ,  '$subject', '$message')";


    if ($conn->query($sql) === TRUE) {
        echo '<div class="success-container">';
        echo '<div class="success-box">';
        echo '<h1>Message Sent Successfully!</h1>';
        echo '<p>Thank you for reaching out. Your message has been sent to your therapist.</p>';
        echo '<button class="btn" onclick="goHome()">Back to Home</button>';
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

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor-Patient Message Form</title>
    <style>
       /* General Reset */
       * {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background: linear-gradient( #E9EDF4,#02835640, #E9EDF4);
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


/* Styling the container */
.msg {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: linear-gradient( #E9EDF4,#02835640, #E9EDF4);
    min-height: 89vh;
    gap: 30px;
}

/* Image Styling */
.image img{
    width: 250px;
    height: 250px;
    animation: bounce 2s infinite;
}

/* Form container styling */
.form-container {
    background-color: #fff;
    padding: 20px 30px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
    border: 2px solid #02835674;
}

/* Form Heading */
.form-container h2 {
    font-size: 2rem;
   text-align: center;
    color: #028355;
    margin-bottom: 30px;
    margin-top: 10px;
}

/* Form Group */
.form-group {
    margin-bottom: 15px;
}

/* Labels */
label {
    display: block;
    font-size: 1.1rem;
    font-weight: bold;
    margin-bottom: 5px;
    color: #000E00;
}

/* Input and Textarea Styling */
input, textarea {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #02835674;
    border-radius: 5px;
    outline: none;
    transition: border-color 0.3s ease;
}

input:focus, textarea:focus {
    border: 1px solid #02835674;
    box-shadow: 0 0 7px #0283565b;
}

/* Button Styling */
.btn-submit {
    background: linear-gradient(135deg, #0283565b, #E9EDF4);
    color: #028355;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.btn-submit:hover {
    background-color: #028355;
}

/* Keyframe Animation */
@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .form-container {
        padding: 15px 20px;
    }

    label {
        font-size: 14px;
    }

    input, textarea {
        font-size: 13px;
    }

    .btn-submit {
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .image img {
        width: 140px;
    }

    .form-container {
        padding: 10px 15px;
    }

    input, textarea {
        font-size: 12px;
    }

    .btn-submit {
        font-size: 12px;
    }
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
    background: linear-gradient(135deg, #0283565b, #E9EDF4);
    padding: 30px 50px;
    border-radius: 20px;
    border: 2px solid #028355;
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15), 0px -10px 20px rgba(255, 255, 255, 0.8);
    max-width: 500px;
    animation: fadeIn 1s ease, popIn 0.5s ease;
}

h1 {
    font-size: 1.5rem;
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
    background: linear-gradient( #E9EDF4,#0283565b);
    border: 2px solid #b3cce6;
    color: #028355;
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
    background: linear-gradient(135deg, #E9EDF4,#028355);
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


    <!-- Navbar -->
    <header class="navbar">
        <img src="../Resourses/index/logo 01.png">
        <div class="logo">Vocal Vantage</div>

        <div class="auth-buttons">
            <a href=""><button class="signup" >Back to Home</button></a>
        </div>
    </header>

    <div class="msg">
    <div class="form-container">
        <h2>Send a Message</h2>
        <form id="messageForm" action="gudian_sent_msg.php" method="POST">
            <div class="form-group">
                <label for="therapist_name">Therapist name</label>
                <input type="text" id="therapist_name" name="therapist_name" placeholder="Enter Therapist's name or ID" required>
            </div>

            <div class="form-group">
                <label for="paitent_name"> Paitent name</label>
                <input type="text" id="paitent_name" name="paitent_name" placeholder="Enter Paitent's name or ID" required>
            </div>

            <div class="form-group">
                <label for="guardian_name"> Guardian name</label>
                <input type="text" id="guardian_name" name="guardian_name" placeholder="Enter Guardian's name or ID" required>
            </div>


            <div class="form-group">
                <label for="subject">subject</label>
                <input type="text" id="subject" name="subject" placeholder="Enter recipient's name or ID" required>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Write your message here..." required></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn-submit">Send Message</button>
            </div>


        </form>
    </div>

    <div class="image">
        <img src="../Resourses/index/msg.png">
    </div>
</div>

</body>

</html>