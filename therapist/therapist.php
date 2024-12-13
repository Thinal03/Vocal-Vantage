<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Therapist Home Page </title>

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
        color:#204060;
        border: none;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        margin-top: 10px;
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
        padding: 8px;
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
        background-color: #c6d9ec;
        color: #204060;
        font-weight: bold;
        border: 1px solid #204060;
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
        color: #2d5986;
        background-color: white;
        padding: 0.5rem 0.8rem;
        border-radius: 35px;
        animation: slideIn 4s ease forwards;
    }

    .navbar .header-icons {
        margin-left: 550px;
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
        color: #204060;
        text-decoration: none;
        cursor: pointer;
    }

    .header-icons .icon a:hover {
        font-weight: bold;
        font-size: 18px;
    }

    /*who-we-are*/
    .who-we-are-intro {
        background: linear-gradient(135deg, #b3cce6, #E9EDF4);
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
        background: linear-gradient(135deg, #E9EDF4, #b3cce6);
        color:#204060;
        border: none;
        border: 1px solid #204060;
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



    /* General Styling */

    .calendar {
        width: 90%;
        margin: 20px auto;
        padding: 10px;
        border: 1px solid #ddd;
        background: linear-gradient(135deg, #E9EDF4, #b3cce6);
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        color: #fff;
    }

    .section-title {
        font-size: 1.2rem;
        text-align: center;
        color: #204060;
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
        color:#204060;
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
        background: linear-gradient(135deg, #b3cce6, #E9EDF4);
        color: #204060;
        padding: 12px;
        text-transform: uppercase;
        font-size: 14px;
    }

    td {
        text-align: center;
        padding: 10px;
        border: 2px solid #b3cce6;
        font-size: 17px;
        cursor: pointer;
        color: #000E00;
    }

    td.day:hover {
        background-color: #b3cce6;
        color: #000E00;
        font-weight: bold;
        font-size: 20px;
        border-radius: 5px;
        transition: 0.3s ease;
    }

    .today {
        background-color: #b3cce6;
        color: #204060;
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

    #appointmentPopup h3{
        font-size: 1.6rem;
        margin-top: 10px;
        margin-bottom: 30px;
        text-align: center;
        color: #204060;
    }

    #appintmentPopup span{
        color: #666;
    }

    #appointmentPopup p {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        border: 0.5px solid #b3cce6;
        border-radius: 5px;
        font-size: 1rem;
    }
  #appointmentPopup button {
        width: 100%;
        padding: 10px;
        margin-top: 15px;
        background: linear-gradient(135deg, #b3cce6, #E9EDF4);
        color: #204060;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        transition: 0.3s ease;
    }

    #appointmentPopup button:hover {
        background-color: #204060;
        color: #204060;
        font-weight: bold;
        border: 0.5px solid #204060;
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



    /* General Styles */


    .header-service {
        margin-top: 20px;
        text-align: center;
        display: flex;
        margin-left: 200px;
    }

    .header-service h2 {
        color: #0283569b;
        font-size: 1.2rem;
    }

    .header-service h1 {
        font-size: 2rem;
        color: #000E00;
        margin-top: 20px;
        margin-bottom: 30px;
    }

    .see-more {
        color: #f26322;
        text-decoration: none;
        font-size: 0.9rem;
        text-align: right;
    }


    /* Service Cards */
    .services {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin: 20px;
        padding: 0 10px;
    }

    .service-card {
        background: white;
        border-radius: 10px;
        text-align: center;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .service-card .icon {
        height: 50px;
        width: 50px;
        border-radius: 50%;
        margin: 0 auto 10px auto;
    }

    .service-card p {
        font-size: 1rem;
        color: #333;
    }

    /* Modal Styles */






    .video {
        max-width: 500px;
        margin: 20px auto;
        padding: 20px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .video h1 {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    label {
        font-size: 16px;
        margin-bottom: 5px;
        display: block;
    }

    input,
    textarea {
        width: 100%;
        margin-bottom: 15px;
        padding: 10px;
        color: #666;
        border-radius: 5px;
        font-size: 14px;
        border: 0.5px solid #02835662;
    }

    .submit {
        width: 100%;
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    .submit {
        background: linear-gradient(135deg, #0283565b, #E9EDF4);
        color: #028355;
        border: none;
        cursor: pointer;
        font-size: 16px;
        border: 0.5px solid #028355;
    }

    .submit:hover {
        background-color: #0056b3;
        color: white;
        border: 0.5px solid #0056b3;
    }

    .video-section {
        margin-top: 20px;
        display: none;
    }

    #videos {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .video-link {
        background: #f1f1f1;
        padding: 10px;
        border-radius: 5px;
        text-decoration: none;
        color: #000E00;
        font-size: 14px;
    }

    .video-link:hover {
        background: #a1311b;
        color: white;
    }

    /* Responsive Design */
    @media (max-width: 600px) {
        .container {
            padding: 15px;
        }

        h1 {
            font-size: 20px;
        }

        label,
        button {
            font-size: 14px;
        }
    }



    /* General Styles */
    .Activities-detail {
        margin: 20px auto;
        padding: 20px;
        max-width: 800px;
        background: white;
        border-radius: 10px;
        text-align: center;
    }

    .Activities-detail h1 {
        font-size: 28px;
        margin-bottom: 20px;
        color: #333;
    }

    /* Activity Section Styles */
    .activity {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .activity video {
        width: 300px;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* Hover Animation */
    .activity video:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .Activities-detail {
            padding: 15px;
        }

        .Activities-detail h1 {
            font-size: 24px;
        }

        .activity video {
            width: 100%;
            max-width: 100%;
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
                <a href="therapist_appoinments.php"> Manage Appoinments </a>
                <a href="zoom.php">Attend Live Session</a>
                <a href="upload_video.php"> Upload Video</a>
                <a href="upload_activities.php"> Upload Activity</a>
                <a href="paitent_list.php">My Patients</a>
                <a href="therapist_message.html">Messages</a>
                <a href="therapist_report.html"> Generate Reports</a>
                <a href="paymentlist.php">Payments</a>
                <a href="../Patient/feedback.html">Feedback</a>
                <a href="../login.html">Logout</a>
            </div>
        </div>
    </div>


    <main>
        <!-- Main Content -->
        <header class="navbar">
        <img class="logo-image" src="../Resourses/index/logo 01.png">
            <div class="logo">Vocal Vantage</div>

            <div class="header-icons">
                <div class="icon"><a href="inbox.php"><img src="../Resourses/Therapist/msg 02.gif" width="35px"
                            height="35px"> Notification</a></div>
                <div class="icon"><a href="personal_details.php"><img src="../Resourses/Therapist/user.gif"
                            width="35px" height="35px"> Personal Info</a></div>
            </div>
        </header>

        <section class="who-we-are-intro">
            <div class="who-we-are">
                <img src="../Resourses/Therapist/Therapists.jpg" alt="Who we are">

                <div class="who-we-are-text">
                    <h2>ONLINE SPEECH THERAPY</h2><br>
                    <h1>Therapist Speech Therapy</h1>
                    <p> Our
                        dedicated therapists are here to guide you <br> personalized
                        care and effective techniques designed to meet your specific needs. <br>Together, we’ll work
                        toward achieving your goals in a comfortable and supportive environment.<br><br> Thank you for
                        choosing us as your partner in this important journey.
                        <br><br><br><b>Let’s get started!</b>
                    </p><br>
                </div>
            </div>
        </section>


        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vocal_vantage";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch appointments from database
$sql = "SELECT * FROM appoinments";
$result = $conn->query($sql);

$appointments = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $appointments[] = [
            'app_id' => $row['App_id'],
            'date' => $row['Date'],
            'patient_name' => $row['Patient_name'],
            'age' => $row['Age'],
            'therapist' => $row['Therapist'],
            'time' => $row['Time'],
        ];
    }
}

// Insert appointment logic if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Patient_name = $_POST['patient_name'];
    $Age = $_POST['age'];
    $Therapist = $_POST['therapist'];
    $Date = $_POST['date'];
    $Time = $_POST['time'];

    // Get the current timestamp for Get_at
    $Get_at = date('Y-m-d H:i:s');

    $sql = "INSERT INTO appoinments (Patient_name, Age, Therapist, Date, Time, Get_at) 
            VALUES ('$Patient_name', '$Age', '$Therapist', '$Date', '$Time', '$Get_at')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment scheduled successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<br><br>
    <div id="calendar" class="calendar">
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
    </div><br><br>

    <!-- Overlay for Popup -->
    <div id="overlay"></div>

    <!-- Modal Popup for Appointment Details -->
    <div id="appointmentPopup">
        <h3>Appointment Details</h3>
        <p><strong>Patient:</strong> <span id="popupPatientName"></span></p>
        <p><strong>Age:</strong> <span id="popupAge"></span></p>
        <p><strong>Therapist:</strong> <span id="popupTherapist"></span></p>
        <p><strong>Date:</strong> <span id="popupDate"></span></p>
        <p><strong>Time:</strong> <span id="popupTime"></span></p><br>
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

    // PHP data passed to JS
    const appointments = <?php echo json_encode($appointments); ?>;

    let date = new Date();
    let currentMonth = date.getMonth();
    let currentYear = date.getFullYear();
    let selectedDateCell = null;

    const months = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    function showCalendar(month, year) {
        calendarBody.innerHTML = "";
        monthYear.textContent = `${months[month]} ${year}`;

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        let date = 1;
        for (let i = 0; i < 6; i++) {
            let row = document.createElement("tr");

            for (let j = 0; j < 7; j++) {
                let cell = document.createElement("td");

                if (i === 0 && j < firstDay) {
                    row.appendChild(cell);
                } else if (date > daysInMonth) {
                    break;
                } else {
                    cell.textContent = date;

                    // Highlight the dates with appointments
                    const dateString = `${year}-${month + 1}-${date}`;
                    const appointment = appointments.find(app => app.date === dateString);

                    if (appointment) {
                        cell.classList.add("has-appointment");
                        cell.title = `Appointment: ${appointment.patient_name} with ${appointment.therapist} at ${appointment.time}`;
                    }

                    // Highlight today's date
                    const today = new Date();
                    if (today.getFullYear() === year && today.getMonth() === month && today.getDate() === date) {
                        cell.classList.add("today");
                    }

                    // Add click event for date selection
                    cell.addEventListener("click", function () {
                        // Display appointment details in popup
                        if (appointment) {
                            document.getElementById('popupPatientName').textContent = appointment.patient_name;
                            document.getElementById('popupAge').textContent = appointment.age;
                            document.getElementById('popupTherapist').textContent = appointment.therapist;
                            document.getElementById('popupDate').textContent = appointment.date;
                            document.getElementById('popupTime').textContent = appointment.time;
                            appointmentPopup.style.display = "block";
                            overlay.style.display = "block";
                        }
                    });

                    row.appendChild(cell);
                    date++;
                }
            }

            calendarBody.appendChild(row);
        }
    }

    prev.addEventListener('click', () => {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        showCalendar(currentMonth, currentYear);
    });

    next.addEventListener('click', () => {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        showCalendar(currentMonth, currentYear);
    });

    // Close the popup
    closePopup.addEventListener('click', () => {
        appointmentPopup.style.display = "none";
        overlay.style.display = "none";
    });

    // Show the current month calendar
    showCalendar(currentMonth, currentYear);
    </script>
<?php include './chatbot.php'; ?>
    </main>

</body>

</html>