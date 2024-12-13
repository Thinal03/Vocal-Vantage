<?php

$connect = mysqli_connect("localhost", "root", "", "vocal_vantage");

if (isset($_POST["submit"])) {
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./files/" . $filename;

    $name = htmlspecialchars($_POST['name']);
    $speaciality = htmlspecialchars($_POST['speaciality']);
    $email = htmlspecialchars($_POST['email']);
    $phone_number = htmlspecialchars($_POST['phone_number']);
    $age = htmlspecialchars($_POST['age']);

    // Corrected SQL query to insert data
    $sql = "INSERT INTO personal_info (filename, name, speaciality, email, phone_number, age) 
            VALUES ('$filename', '$name', '$speaciality', '$email', '$phone_number', '$age')";

    if (mysqli_query($connect, $sql)) {
        echo '<div class="success-container">';
        echo '<div class="success-box">';
        echo '<h1>Details saved successfully. <br>File uploaded successfully.</h1>';
        echo '<button class="btn" onclick="goHome()">Back to Home</button>';
        echo '</div>';
        echo '</div>';
    } else {
        echo "Error saving details: " . mysqli_error($connect);
    }

    // File upload logic
    if (move_uploaded_file($tempname, $folder)) {
        echo '<div class="success-container">';
        echo '<div class="success-box">';
        echo '<h1>File uploaded successfully.</h1>';
        echo '<button class="btn" onclick="goHome()">Back to Home</button>';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<h1>Failed to upload file.</h1>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Details Form</title>
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
.form-container {
    background: #ffffff;
    padding: 20px 30px;
    border-radius: 50px 0 50px 0;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    width: 100%;
    max-width: 450px;
    margin-left: 500px;
    margin-top: 10px;
    animation: slideIn 0.8s ease-out;
}

/* Header */
.form-container h2 {
    font-size: 2rem;
   text-align: center;
    color: #204060;
    margin-bottom: 20px;
}

/* Form Field Styling */
.form-field-upload {
    margin-bottom: 05px;
    
}
.form-field {
    margin-bottom: 05px;
    
}
.row-x{
    display: flex;
    gap: 30px;
}
label {
    display: block;
    margin-bottom: 5px;
    font-size: 1rem;
    font-weight: 600;
    color: #000E00;
}

input[type="text"],
input[type="email"],
input[type="number"],
select,
input[type="file"] {
    width: 94%;
    padding: 5px;
    border-radius: 8px;
    border: 1px solid #b3cce6;
    font-size: 1em;
    outline: none;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

input[type="text"]:focus, 
input[type="email"]:focus, 
input[type="number"]:focus, 
select:focus {
    border-color: #b3cce6;
    box-shadow: 0 0 8px  rgba(39, 62, 138, 0.5);
}

/* Upload Field Styling */
#preview {
    width: 120px;
    height: 120px;
    border-radius: 30%;
    border: 2px solid white;
    background-color: white;
    object-fit: cover;
    display: block;
    margin: 10px auto 15px;
    animation: fadeIn 0.6s ease-in-out;
}

input[type="file"] {
    background: #E9EDF4;
    padding: 10px;
    border: 2px dashed #b3cce6;
    border-radius: 8px;
    color: #666;
    cursor: pointer;
    transition: border-color 0.3s ease;
}

input[type="file"]:hover {
    border-color: #b3cce6;
}

/* Button Styling */
button.save-btn {
    display: block;
    width: 100%;
    padding: 12px;
    background: linear-gradient(135deg, #b3cce6, #E9EDF4);
    color: #204060;
    border: none;
    border-radius: 30px 0 30px 0;
    font-size: 1.1em;
    font-weight: 700;
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

button.save-btn:hover {
    transform: translateY(-2px);
    font-size: 1.3em;
    background: linear-gradient(135deg, #19334d, #E9EDF4);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}

/* Mobile Responsive Design */
@media screen and (max-width: 768px) {
    .form-container {
        padding: 15px 20px;
        max-width: 90%;
    }

    h2 {
        font-size: 1.5em;
    }

    input[type="text"], 
    input[type="email"], 
    input[type="number"], 
    select {
        font-size: 0.9em;
    }

    button.save-btn {
        font-size: 0.9em;
    }
}

/* Animations */
@keyframes slideIn {
    0% {
        transform: translateY(-50px);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes fadeIn {
    0% {
        opacity: 0;
        transform: scale(0.8);
    }
    100% {
        opacity: 1;
        transform: scale(1);
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
    background: linear-gradient(135deg, #b3cce6, #E9EDF4);
    padding: 30px 50px;
    border-radius: 20px;
    border: 2px solid #204060;
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15), 0px -10px 20px rgba(255, 255, 255, 0.8);
    max-width: 500px;
    animation: fadeIn 1s ease, popIn 0.5s ease;
}

h1 {
    font-size: 1.5rem;
    margin-bottom: 20px;
    color: #204060;
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
    background: linear-gradient( #E9EDF4,#b3cce6, #E9EDF4);
    border: 2px solid #b3cce6;
    color: #204060;
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
    background: linear-gradient(135deg, #19334d, #E9EDF4);
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
            <a href="therapist.php"><button class="signup" >Back to Home</button></a>
        </div>
    </header>


    <div class="form-container">
        <h2>Personal Details</h2>
        <form method="POST" enctype="multipart/form-data">
            <center>
            <div>
            <img id="preview" src="../Resourses/Therapist/therapyProf.png" alt="Profile Image Preview" />
        </div>
            </center>
            <div class="form-field">
                <label>Upload File</label>
                <input type="file" name="uploadfile" id="file" onchange="previewImage()" required />
            </div>

            <div class="form-field">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-field">
                <label for="speaciality">Speciality</label>
                <input type="text" id="speaciality" name="speaciality" required>
            </div>
            <div class="form-field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="row-x">
            <div class="form-field">
                <label for="phone_number">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" required>
            </div>
            <div class="form-field">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" required>
            </div>
            </div><br>

            <button class="save-btn" type="submit" name="submit">Save</button>
        </form>

        <!-- Image Preview -->
        
    </div>

    <script>
        // JavaScript function to preview image before upload
        function previewImage() {
            const file = document.getElementById("file").files[0];
            const reader = new FileReader();

            reader.onloadend = function () {
                document.getElementById("preview").src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file); // Converts file to base64 and displays image
            }
        }
    </script>

<script>
        function goHome() {
            window.location.href = "therapist.php"; // Replace with your actual home page URL
        }
    </script>

</body>

</html>
