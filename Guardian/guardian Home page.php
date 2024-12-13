<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient-Guardian Home Page</title>

    <style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Body styling */
    body {
        font-family: Arial, sans-serif;
        display: flex;
        margin: 0;
        background-color: #E9EDF4;
    }

    /* Container (Sidebar) */
    .container {
        width: 200px;
        background-color: white;
        height: 110vh;
        /* Full viewport height */
        position: fixed;
        left: 0;
        top: 0;
        overflow-y: auto;
        /* Add scroll if content exceeds height */
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        padding: 10px;
        z-index: 1000;
    }

    .sidebar .toggle-btn {
        background-color: white;
        color: #028355;
        border: none;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        margin-top: 20px;
        text-align: center;
        border-radius: 5px;
        width: 100%;
    }

    .sidebar-menu {
        margin-top: 10px;
    }


    .sidebar-menu a {
        display: block;
        width: 100%;
        margin: 25px 0;
        padding: 10px;
        text-align: left;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        background-color: white;
        color: #666;
        text-decoration: none;
        cursor: pointer;
    }

    .sidebar-menu select {
        display: block;
        width: 100%;
        margin: 10px 0;
        padding: 10px;
        text-align: left;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        background-color: white;
        color: #666;
        text-decoration: none;
        cursor: pointer;
    }


    .sidebar-menu a:hover,
    .sidebar-menu select:hover {
        background-color: #0283561d;
        color: #028355;
        border: 1px solid #028355;
        animation: buttonHover 0.3s forwards;
    }

    /* Main content area */
    main {
        margin-left: 210px;
        /* Offset for fixed sidebar */
        width: calc(100% - 200px);
        display: flex;
        flex-direction: column;
        background-color: white;
    }

    header {
        width: 100%;
        height: 50px;
        display: flex;
        background-color: white;
    }

    /* Navbar */
    .navbar {
        display: flex;
        align-items: center;
        height: 80px;
    }
    .navbar .logo-image{
            width: 90px;
            height: 90px;
            margin-left: 50px;
        }
    .navbar .logo {
        font-size: 1.6rem;
        font-weight: bold;
        color: #028355;
        background-color: white;
        padding: 0.5rem 0.8rem;
        border-radius: 35px;
        animation: slideIn 4s ease forwards;
    }

    .navbar .header-icons {
        margin-left: 580px;
        padding: 0.01rem 0.8rem;
        border-radius: 35px;
        display: flex;
    }

    .header-icons .icon {
        padding: 0.6rem 1.0rem;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        font-size: 1rem;
        margin-right: 10px;

    }

    .header-icons .icon a {
        font-size: 16px;
        border: none;
        border-radius: 5px;
        color: #028355;
        text-decoration: none;
        cursor: pointer;
    }

    .header-icons .icon a:hover {
        font-weight: bold;
        font-size: 18px;
    }

    

/* Styling for the popup container */
.messages-container {
    display: none; /* Initially hidden */
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.8);
    background-color: white;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    width: 90%;
    max-width: 400px;
    padding: 20px;
    z-index: 1000;
    opacity: 0;
    animation: popupAppear 0.4s forwards;
    color: #fff;
    text-align: center;
    overflow: hidden;
}

/* Heading */
.messages-container h2 {
    margin-bottom: 30px;
    margin-top: 15px;
    font-size: 2.1rem;
    font-weight: bold;
    color: #028355;
    text-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Message Items */
.message-item {
    display: flex;
    align-items: center;
    gap: 40px;
    margin: 15px 0;
    background: linear-gradient(135deg, #0283565b, #E9EDF4);
    border-radius: 10px;
    padding: 10px;
    width: 250px;
    margin-left: 50px;
    transition: transform 0.2s, background 0.3s;
}

.message-item:hover {
    transform: scale(1.05);
    background-color: #028355;
}

.message-item img {
    width: 60px;
    height: 60px;
    border-radius: 30%;
    border: 2px solid white;
}

.message-item a {
    
    border: none;
    text-decoration: none;
    padding: 8px 12px;
    cursor: pointer;
    color: #028355;
    font-size: 1.3rem;
    font-weight: bold;
    transition: background 0.3s, transform 0.3s;
}

.message-item a:hover{
    color: white;
}



/* Overlay for dimming the background */
.overlay {
    display: none; /* Initially hidden */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    z-index: 999;
}

/* Show popup and overlay when active */
.overlay.active,
.messages-container.active {
    display: block;
}

.messages-container.active {
    transform: translate(-50%, -50%) scale(1);
    opacity: 1;
}

/* Keyframes for smooth popup appearance */
@keyframes popupAppear {
    from {
        opacity: 0;
        transform: translate(-50%, -50%) scale(0.8);
    }
    to {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
    }
}

/* Mobile Responsive Design */
@media (max-width: 768px) {
    .messages-container {
        width: 95%;
        padding: 15px;
    }

    .message-item img {
        width: 40px;
        height: 40px;
    }

    .message-item button {
        font-size: 12px;
        padding: 6px 10px;
    }
}

@media (max-width: 480px) {
    h2 {
        font-size: 20px;
    }

    .message-item {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .message-item button {
        margin-top: 10px;
    }
}


    /*who-we-are*/
    .who-we-are-intro {
        background: linear-gradient( #b3cce6,#02835640);
    }

    .who-we-are {
        margin-top: 15px;
        border-radius: 50px 0 50px 0;
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .who-we-are img {
        width: 40%;
        height: auto;
        border-radius: 50px 0 50px 0;
    }

    .who-we-are-text h2 {
        font-size: 1.1rem;
        color: #204060;
        margin-left: 15px;
    }

    .who-we-are-text h1 {
        text-align: center;
        font-size: 2.5rem;
        color: #000E00;
        margin-bottom: 25px;
    }

    .who-we-are-text p {
        text-align: center;
        font-size: 1rem;
        color: #666;
    }

    .who-we-are-text p:hover {
        color: #333;
    }

    .who-we-are-text b {
        width: 100%;
        padding: 15px;
        margin-top: 35px;
        background: linear-gradient( #02835640, #b3cce6);
        color: #204060;
        border: none;
        border: 1px solid #0283568c;
        border-radius: 50px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        transition: 0.3s ease;
    }

    .who-we-are-text b:hover {
        font-size: 20px;
    }

    /* Section Styling */
    section {
        background-color: white;
        padding: 20px;
    }

    /* General styling */


    /* General Section Styling */
    #Doctor-Detail-Profile {
        background-color: white;
        padding: 20px;
        margin-bottom: 50px;
    }

    .section3 h3 {
        color: #028355;
        font-size: 1.3rem;
        text-align: center;
        margin-bottom: 5px;
    }

    .section3 p {
        text-align: center;
        font-size: 2rem;
        color: #000E00;
        font-weight: bold;
        margin-bottom: 50px;
    }

    /* Carousel Container */
    .container-doc {
    overflow: hidden;
    width: 100%;
    position: relative;
}

    .carousel-container {
        display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
    }

    .slide-track {
        display: flex;
        gap: 20px;
        animation: scroll 95s linear infinite;
    }

    @keyframes scroll {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-100%);
        }
    }

    /* Pause animation on hover */
    .carousel-container:hover .slide-track {
        animation-play-state: paused;
    }

    /* Individual Slide */
    .slide {
        background: linear-gradient(135deg, #E9EDF4,#E9EDF4);
        width: 200px;
    border: 1px solid #ccc;
    border-radius: 10px;
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .slide:hover {
        transform: scale(1.1);
    }

    .slide img {
        width: 100%;
        height: auto;
        border-radius: 5px;
    }

    .caption {
        margin-top: 10px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        color: #2c3e50;
         text-align: center;
    }
.caption h3{
    color: #204060;
    font-size: 1.2rem;
    margin-bottom: 10px;
}

/* Popup Styles */
.popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.popup {
    background: #fff;
    padding: 5px;
    border-radius: 50px 50px 50px 50px;
    width: 90%;
    max-width: 400px;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.popup img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 50px 50px 50px 50px;
    margin-bottom: 10px;
}

.popup h3 {
    font-size: 2rem;
    color: #204060;
    margin-bottom: 10px;
}

.popup p {
    color: #555;
    margin-bottom: 20px;
}

.popup-close {
    background: #ff5e57;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 12px;
}

.popup-close:hover {
    background: #e04e4b;
    font-weight: bold;
}

/* Responsive Design */
@media (max-width: 768px) {
    .carousel-container {
        flex-direction: column;
        gap: 10px;
    }

    .slide {
        width: 90%;
        margin: 0 auto;
    }
}


    /* General Styling */

    .calendar {
        width: 90%;
        margin: 20px auto;
        padding: 10px;
        border: 1px solid #ddd;
        background: linear-gradient( #b3cce6,#02835640);
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        color: #fff;
    }

    .section-title {
        font-size: 1.2rem;
        text-align: center;
        color: #028355;
        letter-spacing: 1px;
        margin-bottom: 10px;
        margin-top: 50px;
        text-transform: uppercase;
    }

    .section-subtitle {
        font-size: 2.5rem;
        text-align: center;
        color: #000E00;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .header-calender {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .header-calender h2 {
        font-size: 20px;
        text-align: center;
        flex-grow: 1;
        color: #000E00;
        font-weight: bold;
    }

    .header-calender button {
        background-color: white;
        color: #028355;
        border: none;
        padding: 8px 12px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
    }

    .header-calender button:hover {
        background-color: #204060;
        color: white;
        font-weight: bold;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 5px;
        overflow: hidden;
    }

    th {
        background: linear-gradient(135deg, #02835640, #b3cce6);
        color: #204060;
        padding: 12px;
        text-transform: uppercase;
        font-size: 14px;
    }

    td {
        text-align: center;
        padding: 10px;
        border: 2px solid #02835641;
        font-size: 17px;
        cursor: pointer;
        color: #000E00;
    }

    td.day:hover {
        background-color: #ffecb3;
        color: #000E00;
        font-weight: bold;
        font-size: 20px;
        border-radius: 5px;
        transition: 0.3s ease;
    }

    .today {
        background-color: #dce4f3;
        color: #028355;
        font-weight: bold;
    }

    .has-appointment {
        background-color: #ffcc80;
        font-weight: bold;
        border-radius: 5px;
    }

    .selected {
        background-color: #8e24aa;
        color: white;
        border-radius: 5px;
    }

    /* Popup and Overlay Styling */
    #appointmentPopup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 30px;
        border: 1px solid #ddd;
        border-radius: 10px;
        z-index: 999;
        width: 90%;
        max-width: 400px;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
    }

    #appointmentPopup h2 {
        font-size: 2rem;
        margin-top: 10px;
        margin-bottom: 30px;
        text-align: center;
        color: #028355;
    }

    #appintmentPopup label {
        color: #666;
    }

    #appointmentPopup input,
    #appointmentPopup select {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        border: 0.5px solid #0283562f;
        border-radius: 5px;
        font-size: 1rem;
    }

    #appointmentPopup button {
        width: 100%;
        padding: 10px;
        margin-top: 15px;
        background: linear-gradient(135deg, #0283565b, #E9EDF4);
        color: #028355;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        transition: 0.3s ease;
    }

    #appointmentPopup button:hover {
        background-color: #E9EDF4;
        color: #0283569e;
        border: 0.5px solid #028355;
    }

    #overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 998;
    }

    /* Responsive Design */
    @media screen and (max-width: 768px) {

        th,
        td {
            padding: 8px;
            font-size: 12px;
        }

        .header h2 {
            font-size: 16px;
        }

        .header button {
            padding: 6px 10px;
            font-size: 14px;
        }
    }

    @media screen and (max-width: 480px) {

        th,
        td {
            padding: 6px;
            font-size: 10px;
        }

        .header h2 {
            font-size: 14px;
        }

        .header button {
            padding: 5px 8px;
            font-size: 12px;
        }

        #appointmentPopup {
            padding: 15px;
        }

        #appointmentPopup h2 {
            font-size: 18px;
        }

        #appointmentPopup button {
            font-size: 14px;
        }
    }





    /* Footer Section */
    footer {
        background-color: #E9EDF4;
        /* Dark background for contrast */
        color: #000E00;
        /* White text for readability */
        padding: 20px 10%;
        text-align: center;
        font-family: Arial, sans-serif;
    }

    footer p {
        font-size: 14px;
        margin: 10px 0;
        color: #000E00;
    }

    /* Footer Links Container */
    .footer-links {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin-top: 20px;
        flex-wrap: wrap;
    }

    .footer-links div {
        flex: 1;
        /* Distribute space evenly */
        min-width: 200px;
        text-align: left;
    }

    /* Footer Headings */
    .footer-links h4 {
        font-size: 18px;
        color: #fff;
        margin-bottom: 10px;
    }

    /* Footer Lists */

    .footer {
        background-color: #E9EDF4;
        color: #666;
        padding: 40px 20px;
    }

    .footer-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-about {
        flex: 1;
        min-width: 250px;
        margin: 10px;
        margin-right: 30px;
    }

    .footer-about h2 {
        font-size: 2rem;
        margin-bottom: 15px;
        color: #000E00;
    }

    .footer-about p {
        margin: 10px 0;
        line-height: 1.5;
    }

    .btn-get-started {
        display: inline-block;
        margin-top: 15px;
        padding: 10px 20px;
        background-color: #0283560c;
        color: #028355;
        text-decoration: none;
        border-radius: 50px;
        font-weight: bold;
    }

    .social-icons a {
        display: inline-block;
        margin-right: 10px;
    }

    .social-icons img {
        height: 30px;
        gap: 10px;
        width: 30px;
    }

    .footer-links {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        min-width: 250px;
        margin: 10px;
    }

    .footer-links h3 {
        font-size: 18px;
        margin-bottom: 15px;
    }

    .footer-links ul {
        list-style: none;
        padding: 0;
    }

    .footer-links ul li {
        margin-bottom: 10px;
    }

    .footer-links ul li a {
        color: #333;
        text-decoration: none;
    }

    .footer-contact {
        flex: 1;
        min-width: 250px;
        margin: 10px;
        text-align: center;
    }

    .footer-contact h3 {
        font-size: 18px;
        margin-bottom: 15px;
    }

    .footer-contact p {
        margin: 10px 0;
    }

    .footer-contact a {
        color: #009688;
        text-decoration: none;
        font-weight: bold;
    }

    .footer-contact img {
        margin-top: 20px;
        max-width: 100px;
    }

    /* Mobile Responsiveness */
    @media (max-width: 768px) {
        .footer-container {
            flex-direction: column;
            align-items: center;
        }

        .footer-links {
            flex-direction: column;
        }

        .footer-links>div {
            margin-bottom: 20px;
        }

        .footer-contact {
            margin-top: 20px;
        }
    }
    </style>
</head>

<body>


    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <button class="toggle-btn">☰ Menu ☰</button>
            <div class="sidebar-menu">
                <a href="">Home</a>
                <a href="#Doctor-Detail-Profile">Therapists</a>
                <a href="#">Appointments</a>
                <a href="guardian report.php">Patient Report</a>
                <a href="../Patient/feedback.html">Feedback</a>
                <a href="../index.php">Logout</a>
            </div>
        </div>
    </div>


    <main>
        <!-- Main Content -->
        <header class="navbar">
        <img class="logo-image" src="../Resourses/index/logo 01.png">
            <div class="logo">Vocal Vantage</div>

            <div class="header-icons">
                <div class="icon"><a href="gudian_inbox.php"><img src="../Resourses/index/msg.png" width="35px"
                            height="35px"> Message</a></div>
                <div class="icon"><a href="guardian_info.php"><img src="../Resourses/index/persInfo.png"
                            width="35px" height="35px"> Personal Info</a></div>
            </div>
        </header>

       <!--the messagepopup container -->
       <div class="messages-container" id="popupMessages">
    <h2>Messages</h2>
    <div class="message-item">
        <img src="../Resourses/index/inbox01.gif" alt="Inbox Icon">
        <a href="guardian_inbox.php">Inbox</a>
    </div>
    <div class="message-item">
        <img src="../Resourses/index/send msg01.gif" alt="Sent Icon">
        <a href="gudian_sent_msg.php">Sent</a>
    </div>
</div>
<script>
    // JavaScript to handle popup
document.addEventListener("DOMContentLoaded", () => {
    const icon = document.querySelector(".icon");
    const popupMessages = document.getElementById("popupMessages");
    const overlay = document.createElement("div");
    overlay.className = "overlay";
    document.body.appendChild(overlay);

    // Show popup on click
    icon.addEventListener("click", (e) => {
        e.preventDefault();
        popupMessages.classList.add("active");
        overlay.classList.add("active");
    });

    // Close popup when clicking outside
    overlay.addEventListener("click", () => {
        popupMessages.classList.remove("active");
        overlay.classList.remove("active");
    });
});
</script>


        <section class="who-we-are-intro">
            <div class="who-we-are">
                <img src="../Resourses/Special-need/special01.jpeg" alt="Who we are">

                <div class="who-we-are-text">
                    <h2>ONLINE SPEECH THERAPY</h2><br>
                    <h1>Welcome to Vocal Vantage</h1>
                    <p>We’re thrilled to support you on your journey toward <br>improved communication and confidence.
                        At Vocal Vantage, we believe every voice is unique and deserves to be heard. <br><br>Our
                        dedicated therapists are here to guide you <br> personalized
                        care and effective techniques designed to meet your specific needs. <br>Together, we’ll work
                        toward achieving your goals in a comfortable and supportive environment.<br><br> Thank you for
                        choosing us as your partner in this important journey.
                        <br><br><br><b href="Appoinments_calender.php">Let’s get started!</b>
                    </p><br>
                </div>
            </div>
        </section>


        <section class="Calender">
            <h3 class="section-title">MAKE YOUR</h3>
            <p class="section-subtitle">Appointment Now</p><br>

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
    $Patient_name = $_POST['patient_name'];
    $role = $_POST['role'];
    $Age = $_POST['age'];
    $Therapist = $_POST['therapist'];
    $Date = $_POST['date'];
    $Time = $_POST['time'];

    // Insert appointment into the database
    $sql = "INSERT INTO appoinments (patient_name, role, age, therapist, date, time) VALUES ('$Patient_name' , '$role' , '$Age' , '$Therapist', '$Date', '$Time')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch appointments from the database for calendar
$appointments = [];
$sql = "SELECT date FROM appoinments WHERE role IN ('patient_child', 'patient_specialneeds')";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row['date'];
    }
}


$conn->close();
?>
            <div class="calendar">
                <div class="header-calender">
                    <button id="prev">❮</button>
                    <h2 id="monthYear"></h2>
                    <button id="next">❯</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Sun</th>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thu</th>
                            <th>Fri</th>
                            <th>Sat</th>
                        </tr>
                    </thead>
                    <tbody id="calendarBody">
                        <!-- Dates will be dynamically inserted here -->
                    </tbody>
                </table>
            </div>

            <!-- Overlay for Popup -->
            <div id="overlay"></div>

            <!-- Modal Popup for Appointment Form -->
            <div id="appointmentPopup">
                <div class="form-container">
                    <h2>Appointment</h2>
                    <form action="../patient/Appoinments.php" method="POST">
                        <label for="patient_name">Patient's Name</label>
                        <input type="text" id="patient_name" name="patient_name" required>

                        <label for="role">Patient Type </label>
                        <select id="role" name="role" required>
                        <option value="patient_guardian">Patient - Child </option>
                        <option value="patient_guardian">Patient - Specialneeds </option>
                        </select>
                        
                        <label for="age">Age</label>
                        <input type="number" id="age" name="age" min="1" max="100" required>

                        <label for="therapist">Therapist</label>
                        <select id="therapist" name="therapist" required>
                            <option value="doctor 1">Doctor 1</option>
                        </select>

                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" required>

                        <label for="time">Time</label>
                        <select id="time" name="time" required>
                            <option value="9.00 - 10.00 A.M">9.00 - 10.00 A.M</option>
                            <option value="11.00 A.M - 12.00 P.M">11.00 A.M - 12.00 P.M</option>
                            <option value="1.00 - 2.00 P.M">1.00 - 2.00 P.M</option>
                            <option value="3.00 - 4.00 P.M">3.00 - 4.00 P.M</option>
                            <option value="5.00 - 6.00 P.M">5.00 - 6.00 P.M</option>
                            <option value="7.00 - 8.00 P.M">7.00 - 8.00 P.M</option>
                            <option value="9.00 - 10.00 P.M">9.00 - 10.00 P.M</option>
                        </select>

                        <button type="submit">Make Appointment</button>
                    </form>
                </div>
                <button id="closePopup">Close</button>
            </div>

            <script>
            const calendarBody = document.getElementById('calendarBody');
            const monthYear = document.getElementById('monthYear');
            const prev = document.getElementById('prev');
            const next = document.getElementById('next');
            const overlay = document.getElementById('overlay');
            const appointmentPopup = document.getElementById('appointmentPopup');
            const closePopup = document.getElementById('closePopup');
            const dateInput = document.getElementById('date');

            // Appointments from PHP
            const appointments = <?php echo json_encode($appointments); ?>;

            // Function to generate calendar
            function generateCalendar(month, year) {
                calendarBody.innerHTML = '';
                const firstDay = new Date(year, month, 1).getDay();
                const lastDate = new Date(year, month + 1, 0).getDate();
                let date = 1;

                // Fill the first week
                let row = document.createElement('tr');
                for (let i = 0; i < firstDay; i++) {
                    row.appendChild(document.createElement('td'));
                }

                // Fill the rest of the calendar
                for (let i = firstDay; date <= lastDate; i++) {
                    if (i % 7 === 0) {
                        calendarBody.appendChild(row);
                        row = document.createElement('tr');
                    }

                    const cell = document.createElement('td');
                    const cellDate = new Date(year, month, date);

                    // Format cellDate as YYYY-MM-DD
                    const cellDateString =
                        `${cellDate.getFullYear()}-${String(cellDate.getMonth() + 1).padStart(2, '0')}-${String(cellDate.getDate()).padStart(2, '0')}`;
                    cell.textContent = date;

                    // Highlight cells with appointments
                    if (appointments.includes(cellDateString)) {
                        cell.classList.add('has-appointment');
                    }

                    // Highlight today's date
                    const today = new Date();
                    if (cellDate.toDateString() === today.toDateString()) {
                        cell.classList.add('today');
                    }

                    cell.addEventListener('click', () => openPopup(cellDateString));
                    row.appendChild(cell);
                    date++;
                }

                calendarBody.appendChild(row);
                monthYear.textContent = `${month + 1}/${year}`;
            }


            // Open appointment popup
            function openPopup(date) {
                dateInput.value = date;
                overlay.style.display = 'block';
                appointmentPopup.style.display = 'block';
            }

            closePopup.addEventListener('click', () => {
                overlay.style.display = 'none';
                appointmentPopup.style.display = 'none';
            });

            prev.addEventListener('click', () => {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                generateCalendar(currentMonth, currentYear);
            });

            next.addEventListener('click', () => {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                generateCalendar(currentMonth, currentYear);
            });

            // Set initial date and load calendar
            const currentDate = new Date();
            let currentMonth = currentDate.getMonth();
            let currentYear = currentDate.getFullYear();

            generateCalendar(currentMonth, currentYear);
            </script>

        </section>


        <section id="Doctor-Detail-Profile">
            <div class="section3"><br><br>
                <h3>MEET OUR TEAM</h3><br>
                <p>Below are some of our best therapists</p>
                <center>
                    <div class="container-doc">
                        <div class="slide-track-doc">
                            <?php
$connect = mysqli_connect("localhost", "root", "", "vocal_vantage");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the personal_info table
$query = "SELECT * FROM personal_info";
$result = mysqli_query($connect, $query);
?>

                            <div class="section">
                                <center>
                                    <div class="carousel-container">
                                        <div class="slide-track">
                                            <?php if (mysqli_num_rows($result) > 0): ?>
                                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                            <div class="slide">
                                                <img src="../therapist/files/<?php echo htmlspecialchars($row['filename']); ?>"
                                                    alt="<?php echo htmlspecialchars($row['name']); ?>">
                                                <div class="caption">
                                                    <h3> <b> <?php echo htmlspecialchars($row['name']); ?></b></h3> 
                                                    <?php echo htmlspecialchars($row['speaciality']); ?><br><br>
                                                </div>
                                            </div>
                                            <?php endwhile; ?>
                                            <?php else: ?>
                                            <p>No therapists found.</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </center>
                            </div>
                            <?php mysqli_close($connect); ?>

                            </section><br><br>


                            
    


        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.querySelector('.toggle-btn');
            const sidebarMenu = document.querySelector('.sidebar-menu');

            // Toggle Sidebar Menu
            toggleBtn.addEventListener('click', function() {
                sidebarMenu.classList.toggle('open');
            });
        });

//doctor profile pop up

        document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll(".slide");
    const popupOverlay = document.createElement("div");
    popupOverlay.className = "popup-overlay";

    const popup = document.createElement("div");
    popup.className = "popup";

    const popupClose = document.createElement("button");
    popupClose.className = "popup-close";
    popupClose.textContent = "Close";

    popupClose.addEventListener("click", () => {
        popupOverlay.style.display = "none";
    });

    popupOverlay.appendChild(popup);
    document.body.appendChild(popupOverlay);

    slides.forEach(slide => {
        slide.addEventListener("click", () => {
            const img = slide.querySelector("img").src;
            const name = slide.querySelector("h3").textContent.trim();
            const speciality = slide.querySelector(".caption").textContent.trim();

            popup.innerHTML = `
                <img src="${img}" alt="${name}">
                <h3>${name}</h3>
                <p>${speciality}</p>
            `;
            popup.appendChild(popupClose);
            popupOverlay.style.display = "flex";
        });
    });
});

        </script>



<?php include './chatbot.php'; ?>





        <!-- Footer -->
        <footer class="footer">
            <div class="footer-container">
                <div class="footer-about">
                    <h2>Vocal Vantage</h2>
                    <p>Vocal Vantage is a convenient, effective, and affordable online speech therapy for children and
                        adults. We'll help you communicate at your best!</p>
                    <p>Join now and get matched to a licensed speech therapist to improve your future.</p>
                    <a href="#" class="btn-get-started">Get Vocal Vantage</a><br><br>
                    <div class="social-icons">
                        <a href="#"><img src="../Resourses/index/facebook.png" alt="Facebook"></a>
                        <a href="#"><img src="../Resourses/index/youtube.png" alt="YouTube"></a>
                        <a href="#"><img src="../Resourses/index/instagram.png" alt="Instagram"></a>
                    </div>
                </div>
                <div class="footer-links">
                    <div>
                        <h3>Company</h3>
                        <ul>
                            <li><a href="#who we are">Who we are</a></li>
                            <li><a href="#What we offer">What we offer</a></li>
                            <li><a href="#Quick Website Tour">Website Tour</a></li>
                            <li><a href="#In Session what we do">Features</a></li>
                            <li><a href="#Doctor-Detail-Profile">Team</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3>We Treat</h3>
                        <ul>
                            <li><a href="#">Child/Toddler Speech Disorders</a></li>
                            <li><a href="#">Adult Speech Disorders</a></li>
                            <li><a href="#">Language Disorder/Delay</a></li>
                            <li><a href="#">Early Childhood Development</a></li>
                            <li><a href="#">Speech Sound Disorders</a></li>
                            <li><a href="#">Stuttering and Fluency</a></li>
                            <li><a href="#">And More...</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-contact">
                    <h3>Contact Us</h3>
                    <p>+1-919-589-7941</p>
                    <p>(9am-5pm ) M-F</p>
                    <p><a href="mailto:info@vocalvantage.com">info@vocalvantage.com</a></p>
                </div>
            </div>
        </footer>
    </main>

</body>

</html>