<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Details Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(#E9EDF4, #b3cce6, #E9EDF4);
            min-height: 80vh;
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
            background-color: transparent;
            color: #204060;
        }

        .auth-buttons .signup:hover {
            font-weight: bold;
            font-size: 1rem;
            color: #204060;
        }

        /* Form container styling */
        .form-container {
            background: #ffffff;
            padding: 20px 30px;
            border-radius: 50px 0 50px 0;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 450px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
            animation: slideIn 0.8s ease-out;
        }

        .form-container h2 {
            font-size: 2rem;
            text-align: center;
            color: #204060;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            color: #000E00;
            font-size: 1rem;
        }

        input[type="text"],
        select,
        input[type="file"] {
            width: 100%;
            padding: 5px;
            border-radius: 8px;
            border: 1px solid #b3cce6;
            font-size: 1em;
            margin-bottom: 10px;
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="text"]:focus,
        select:focus,
        input[type="file"]:focus {
            border-color: #b3cce6;
            box-shadow: 0 0 8px rgba(39, 62, 138, 0.5);
        }

        .upload-btn {
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

        .upload-btn:hover {
            transform: translateY(-2px);
            font-size: 1.3em;
            background: linear-gradient(135deg, #19334d, #E9EDF4);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        /* Popup styling */
        .popup-container {
            display: none; /* Hidden by default */
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            background-color: white;
            border: 2px solid #b3cce6;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
            z-index: 1000;
        }

        .popup-container.show {
            display: block; /* Show when needed */
            animation: fadeIn 0.5s ease-in-out;
        }

        .popup-container h3 {
            margin: 10px 0;
            color: #204060;
        }

        .popup-container button {
            background: linear-gradient(135deg, #b3cce6, #E9EDF4);
            border: none;
            color: #204060;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .popup-container button:hover {
            background: linear-gradient(135deg, #19334d, #E9EDF4);
            color: white;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
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
.popup-container.active {
    display: block;
}

.popup-container.active {
    transform: translate(-50%, -50%) scale(1);
    opacity: 1;
}

        
        

    </style>
</head>

<body>
    <!-- Navbar -->
    <header class="navbar">
    <img src="../Resourses/index/logo 01.png">
        <div class="logo">Vocal Vantage</div>

        <div class="auth-buttons">
            <a href="therapist.php"><button class="signup">Back to Home</button></a>
        </div>
    </header>

    <!-- Popup Container -->
    <div id="popup" class="popup-container">
        <h3 id="popup-message"></h3>
        <button onclick="closePopup()">Close</button>
    </div>
<br>
    <!-- Form -->
    <div class="form-container">
        <h2>Offline Video Details</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-field-upload">
                <label>Upload Video</label>
                <input type="file" name="uploadfile" id="file" required />
            </div>

            <div class="form-field">
                <label for="agegroup">Age Group</label>
                <select name="agegroup" id="agegroup" required>
                    <option value="">Select Age Group</option>
                    <option value="0-5">0-5 Years</option>
                    <option value="6-12">6-12 Years</option>
                    <option value="13-18">13-18 Years</option>
                    <option value="18+">18+ Years</option>
                </select>
            </div>

            <div class="form-field">
                <label for="therapycategory">Lesson Category</label>
                <select name="therapycategory" id="therapycategory" required>
                    <option value="">Select Therapy Category</option>
                    <option value="speech">Speech Therapy</option>
                    <option value="language">Language Therapy</option>
                    <option value="cognitive">Cognitive Therapy</option>
                    <option value="swallowing">Swallowing Therapy</option>
                </select>
            </div>

            <div class="form-field">
                <label for="videotitle">Video Title</label>
                <input type="text" id="videotitle" name="videotitle" required>
            </div>

            <div class="form-field">
                <label for="videodescription">Video Description</label>
                <input type="text" id="videodescription" name="videodescription" required>
            </div><br>

            <button class="upload-btn" type="submit" name="submit">Upload Now</button>
        </form>
    </div>

    <script>
                const overlay = document.createElement("div");
    overlay.className = "overlay";
    document.body.appendChild(overlay);
        // Function to show popup with a message
        function showPopup(message) {
            const popup = document.getElementById("popup");
            const popupMessage = document.getElementById("popup-message");
            popupMessage.textContent = message;
            popup.classList.add("show");
            overlay.classList.add("active");
        }

        // Function to close the popup
        function closePopup() {
            const popup = document.getElementById("popup");
            popup.classList.remove("show");
            overlay.classList.remove("active");
        }

        <?php
        $connect = mysqli_connect("localhost", "root", "", "vocal_vantage");

        if (isset($_POST["submit"])) {
            $filename = $_FILES["uploadfile"]["name"];
            $tempname = $_FILES["uploadfile"]["tmp_name"];
            $folder = "./videos/" . $filename;

            $agegroup = htmlspecialchars($_POST["agegroup"]);
            $therapycategory = htmlspecialchars($_POST["therapycategory"]);
            $videotitle = htmlspecialchars($_POST["videotitle"]);
            $videodescription = htmlspecialchars($_POST["videodescription"]);

            $sql = "INSERT INTO `therapist_upload_video` (filename, AgeGroup, TherapyCategory, VideoTitle, VideoDescription) VALUES ('$filename', '$agegroup', '$therapycategory', '$videotitle', '$videodescription')";

            if (mysqli_query($connect, $sql)) {
                move_uploaded_file($tempname, $folder);
                echo 'showPopup("Details saved successfully!");';
            } else {
                echo 'showPopup("Error saving details: ' . mysqli_error($connect) . '");';
            }
        }
        ?>
    </script>
</body>

</html>
