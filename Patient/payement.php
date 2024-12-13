<?php
// Database connection
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

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $patient_id = htmlspecialchars($_POST['patient_id']);
    $amount = htmlspecialchars($_POST['amount']);
    $status = htmlspecialchars($_POST['status']);
    $card_holder = htmlspecialchars($_POST['card_holder']);
    $card_number = htmlspecialchars($_POST['Card_number']);
    $card_exp = htmlspecialchars($_POST['Card_exp']);
    $cvc = htmlspecialchars($_POST['cvc']);
    $therapist_id = htmlspecialchars($_POST['therapist_id']);
    $date = htmlspecialchars($_POST['date']);

    // Validation
    if (!is_numeric($amount) || $amount <= 0) {
        echo "<script>alert('Invalid amount entered'); window.history.back();</script>";
        exit;
    }
    if (!preg_match("/^\d{16}$/", $card_number)) {
        echo "<script>alert('Invalid card number'); window.history.back();</script>";
        exit;
    }
    if (!preg_match("/^\d{2}\/\d{4}$/", $card_exp)) {
        echo "<script>alert('Invalid card expiry format. Use MM/YYYY.'); window.history.back();</script>";
        exit;
    }
    if (!preg_match("/^\d{3,4}$/", $cvc)) {
        echo "<script>alert('Invalid CVC code'); window.history.back();</script>";
        exit;
    }

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO payments (patient_id, amount, status, card_holder, card_number, card_exp, cvc, therapist_id, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sdsssssss", $patient_id, $amount, $status, $card_holder, $card_number, $card_exp, $cvc, $therapist_id, $date);

    // Execute the statement
    if ($stmt->execute()) {
        // Generate receipt content
        $receipt = "----- Payment Receipt -----\n";
        $receipt .= "Patient ID: $patient_id\n";
        $receipt .= "Amount: $amount\n";
        $receipt .= "Status: $status\n";
        $receipt .= "Therapist ID: $therapist_id\n";
        $receipt .= "Date: $date\n";
        $receipt .= "---------------------------\n";

        // Set headers to force download
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="receipt.txt"');
        header('Content-Length: ' . strlen($receipt));
        
        // Output receipt
        echo $receipt;

        // Close the connection and exit to prevent further output
        $stmt->close();
        $conn->close();
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
}

$conn->close();
?>
