<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vocal_vantage";

$connect = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Handle delete operation
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteQuery = "DELETE FROM guardian_personal_info WHERE id=$id";

    if ($connect->query($deleteQuery) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
        echo "<script>window.location.href='guardian_personal_info.php';</script>";
    } else {
        echo "<script>alert('Error deleting record: " . $connect->error . "');</script>";
    }
}

// Handle form submission for editing
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_id'])) {
    $id = $_POST['edit_id'];
    $name = $_POST['name'];
    $gname = $_POST['gname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];

    $updateQuery = "UPDATE guardian_personal_info SET name='$name', gname='$gname', email='$email', phone_number='$phone', age='$age' WHERE id=$id";
    if ($connect->query($updateQuery) === TRUE) {
        echo "<script>alert('Record updated successfully');</script>";
        echo "<script>window.location.href='guardian_personal_info.php';</script>";
    } else {
        echo "<script>alert('Error updating record: " . $connect->error . "');</script>";
    }
}

// Fetch data from personal_info table
$query = "SELECT * FROM guardian_personal_info";
$result = $connect->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Guardian Personal Info</title>
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
.dashboard-container {
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
    color: #204060;
    margin-bottom: 20px;
    font-size: 2rem;
    letter-spacing: 2px;
    animation: slideIn 1s ease-in-out;
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #fff;
    margin-top: 20px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 10px;
    overflow: hidden;
}

table thead {
    background: linear-gradient(135deg, #b3cce6, #E9EDF4);
    color: #204060;
}

table th, table td {
    padding: 12px 15px;
    text-align: left;
    font-size: 14px;
    border-bottom: 1px solid #ddd;
}

table th {
    background: linear-gradient(135deg, #b3cce6, #E9EDF4);
    color: #204060;
        padding: 12px;
        text-align: left;
        font-size: 1rem;
}
table td{
        padding: 10px;
        border: 2px solid #b3cce6;
        font-size: 17px;
        cursor: pointer;
        color: #000E00;
}
table tr {
    transition: background-color 0.3s ease, transform 0.3s ease;
}

table tr:hover {
    background-color: #f4f4f9;
}

table img {
    width: 50px;
    height: 50px;
    align-items: center;
    object-fit: cover;
}

/* Action Buttons */
a.edit-btn,
a.delete-btn {
    text-decoration: none;
    font-size: 14px;
    padding: 8px 12px;
    border-radius: 5px;
    margin-right: 5px;
    display: inline-block;
    transition: background-color 0.3s, color 0.3s, transform 0.3s;
}

a.edit-btn {
    background-color: #028355;
    color: white;
    animation: pulse 2s infinite alternate;
}

a.edit-btn:hover {
    background-color: #218838;
    transform: scale(1.1);
}

a.delete-btn {
    background-color: #dc3545;
    color: white;
}

a.delete-btn:hover {
    background-color: #c82333;
    transform: scale(1.1);
}
/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7); /* Darker, smooth overlay */
    z-index: 9999;
    align-items: center;
    justify-content: center;
    animation: fadeIn 0.5s ease-in-out;
}

/* Modal Content */
.modal-content {
    background: linear-gradient(135deg, #ffffff, #f5f8fc); /* Soft gradient background */
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3); /* Larger, soft shadow */
    width: 90%;
    max-width: 600px;
    position: relative;
    animation: slideUp 0.5s ease-in-out;
    transform: translateY(-50px);
    transition: transform 0.3s ease-in-out, box-shadow 0.3s;
}

.modal-content:hover {
    transform: translateY(-10px); /* Subtle lift effect on hover */
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
}


/* Responsive Adjustments */
@media screen and (max-width: 768px) {
    .modal-content {
        width: 95%;
        padding: 20px;
    }
}

/* Close Button */
.modal-close button {
    position: absolute;
    top: 10px;
    right: 10px;
    background: none;
    border: none;
    font-size: 16px;
    color: #333;
    cursor: pointer;
    transition: transform 0.3s ease, color 0.3s ease;
}

.modal-close button:hover {
    color: #000E00;
    font-weight: bold;
}

/* Form Styles */
.modal form {
    width: 100%;
}

.modal form label {
    display: block;
    margin-bottom: 8px;
    font-size: 15px;
    color: #000E00;
    font-weight: 600;
    letter-spacing: 0.5px;
}

.modal form input {
    width: 96%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #b3cce6;
    border-radius: 8px;
    font-size: 14px;
    background: #f9f9f9;
    transition: border 0.3s ease, box-shadow 0.3s ease;
}

.modal form input:focus {
    border-color: #b3cce6;
    box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
    outline: none;
}

/* Form Button */
.modal form button {
    width: 100%;
    padding: 12px;
    background: linear-gradient(135deg,#204060, #E9EDF4);
    color: white;
    font-size: 1.1rem;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.3s ease;
    letter-spacing: 0.8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}

.modal form button:hover { /* Gradient shift on hover */
    transform: translateY(-3px); /* Subtle lift effect */
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
    background: linear-gradient(135deg, #b3cce6, #E9EDF4);
    color: #204060;
}

/* Responsive Adjustments for Button */
@media screen and (max-width: 768px) {
    .modal form button {
        font-size: 14px;
        padding: 10px;
    }
}


/* Keyframe Animations */
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
        transform: translateY(-30px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes slideUp {
    from {
        transform: translateY(30px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes pulse {
    from {
        box-shadow: 0 0 10px rgba(40, 167, 69, 0.5);
    }
    to {
        box-shadow: 0 0 20px rgba(40, 167, 69, 0.8);
    }
}

@keyframes glow {
    from {
        background-color: #0056b3;
    }
    to {
        background-color: #007bff;
    }
}

/* Responsive Design */
@media screen and (max-width: 768px) {
    table th, table td {
        font-size: 12px;
        padding: 8px;
    }

    a.edit-btn,
    a.delete-btn {
        font-size: 12px;
        padding: 5px;
    }

    .modal-content {
        width: 95%;
    }

    h2 {
        font-size: 22px;
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
            <a href="usermanagement.html"><button class="signup" >Back to Home</button></a>
        </div>
    </header>

<div class="dashboard-container"><br>
        <h2>Admin Dashboard - Guardian Personal Info</h2><br>
    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
            <tr>
                <th>Profile Image</th>
                <th>Name</th>
                <th>Guardian Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Age</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td>
                        <img src="../guardian/files/<?php echo htmlspecialchars($row['filename']); ?>" 
                             alt="Profile Image">
                    </td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['gname']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone_number']); ?></td>
                    <td><?php echo htmlspecialchars($row['age']); ?></td>
                    <td class="action-buttons">
                    <a href="javascript:void(0);" 
       class="edit-btn" 
       onclick="openEditModal(<?php echo htmlspecialchars(json_encode($row)); ?>)">
        Edit
    </a>
                        <a href="?delete=<?php echo $row['id']; ?>" 
                           onclick="return confirm('Are you sure you want to delete this record?');" 
                           class="delete-btn">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No records found.</p>
    <?php endif; ?>
    <?php $connect->close(); ?>
</div>

<!-- Modal for editing -->
<div class="modal" id="editModal">
    <div class="modal-content">
        <div class="modal-close">
            <button onclick="closeEditModal()">Close</button>
        </div><br><br>
        <h2>Update - Guardian Personal Info</h2><br>
        <form method="POST" action="">
            <input type="hidden" id="edit_id" name="edit_id">
            <label for="name">Name:</label>
            <input type="text" id="edit_name" name="name" required>
            <label for="gname">Guardian name:</label>
            <input type="text" id="edit_gname" name="gname" required>
            <label for="email">Email:</label>
            <input type="email" id="edit_email" name="email" required>
            <label for="phone">Phone:</label>
            <input type="text" id="edit_phone" name="phone" required>
            <label for="age">Age:</label>
            <input type="number" id="edit_age" name="age" required>
            <button type="submit" style="margin-top: 10px;">Update</button>
        </form>
    </div>
</div>

<script>
    function openEditModal(data) {
        document.getElementById('edit_id').value = data.id;
        document.getElementById('edit_name').value = data.name;
        document.getElementById('edit_gname').value = data.gname;
        document.getElementById('edit_email').value = data.email;
        document.getElementById('edit_phone').value = data.phone_number;
        document.getElementById('edit_age').value = data.age;
        document.getElementById('editModal').style.display = 'block';
      // Show the modal
      const modal = document.getElementById('editModal');
    modal.style.display = 'flex'; // Change from 'block' to 'flex' for centering
}

function closeEditModal() {
    const modal = document.getElementById('editModal');
    modal.style.display = 'none';
}
    
</script>
</body>
</html>

   
