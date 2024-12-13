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
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $Conpassword = $_POST['Conpassword'];
    $role = $_POST['role'];

    $sql = "INSERT INTO register (name, email, password, Conpassword, role) VALUES ('$name' , '$email' , '$password', '$Conpassword', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Registration successful');
                window.location.href = 'login.html';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
