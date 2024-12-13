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

// Fetch appointments from the database
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

// Handle form submission for inserting an appointment
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Patient_name = $_POST['patient_name'];
    $Age = $_POST['age'];
    $Therapist = $_POST['therapist'];
    $Date = $_POST['date'];
    $Time = $_POST['time'];

    // Get current timestamp for 'Get_at'
    $Get_at = date('Y-m-d H:i:s');

    $sql = "INSERT INTO appoinments (Patient_name, Age, Therapist, Date, Time, Get_at) 
            VALUES ('$Patient_name', '$Age', '$Therapist', '$Date', '$Time', '$Get_at')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment scheduled successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();

// Pass appointments data to JavaScript as JSON
echo "<script>const appointments = " . json_encode($appointments) . ";</script>";
?>
