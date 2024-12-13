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
    $sql = "INSERT INTO appoinments (patient_name, role , age, therapist, date, time) VALUES ('$Patient_name' , '$role' , '$Age' , '$Therapist', '$Date', '$Time')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch appointments from the database for calendar
$appointments = [];
$sql = "SELECT date FROM appoinments WHERE role = 'patient_child'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row['date'];
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Calendar</title>
    <style>
/* General Styling */
       /* General Reset */
       * {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

}
body{
    background: linear-gradient(white,#E9EDF4);
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

.calendar {
        width: 90%;
        margin: 20px auto;
        padding: 10px;
        border: 1px solid #ddd;
        background: linear-gradient(135deg, #02835640, #b3cce6);
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
        background-color: #028355;
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
        background: linear-gradient(135deg,#b3cce6, #02835640);
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


    </style>
</head>
<body>

        <!-- Navbar -->
        <header class="navbar">
            <img src="../Resourses/index/logo 01.png">
            <div class="logo">Vocal Vantage</div>
    
            
        </header>
    <br>

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

// Fetch adult patient appointments from the database for calendar
$appointments = [];
$sql = "SELECT date FROM appoinments WHERE role = 'patient_child'";
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
                    <form action="Appoinments.php" method="POST">
                        <label for="patient_name">Patient's Name</label>
                        <input type="text" id="patient_name" name="patient_name" required>

                        <label for="role">Patient Type </label>
                        <select id="role" name="role" required>
                        <option value="patient_child">Patient - Child </option>
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
<br><br><br><br><br>
        </section>
</body>
</html>
