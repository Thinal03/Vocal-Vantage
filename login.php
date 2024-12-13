<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vocal_vantage";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insert into the login table
    $insert_sql = "INSERT INTO login (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("ss", $email, $password);

    if ($stmt->execute()) {
        // Check user role after successful insert
        $select_sql = "SELECT id, role FROM register WHERE email = ? AND password = ?";
        $select_stmt = $conn->prepare($select_sql);
        $select_stmt->bind_param("ss", $email, $password);
        $select_stmt->execute();
        $result = $select_stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['userid'] = $row['id'];
            $_SESSION['role'] = $row['role'];

            // Redirect based on role
            switch ($row['role']) {
                case 'patient_adult':
                    header("Location: Patient/patient Home page.php");
                    break;
                case 'patient_child':
                    header("Location: Patient/patient_child Home page.php");
                    break;
                case 'patient_specialneeds':
                    header("Location: Patient/patient_specialneeds Home page.php");
                    break;
                case 'therapist':
                    header("Location: therapist/therapist.php");
                    break;
                case 'admin':
                    header("Location: Admin/admin.html");
                    break;
                case 'guardian':
                    header("Location: Guardian/guardian Home page.php");
                    break;
                default:
                    echo "Role not recognized.";
            }
            exit; // Ensure no further code executes after redirection
        } else {
            echo "<script>
                alert('Username or password invalid.');
                window.location.href = 'login.html';
              </script>";
        }
    } else {
        echo "Error inserting into login table: " . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>
