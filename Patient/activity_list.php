<?php
$connect = mysqli_connect("localhost", "root", "", "vocal_vantage");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch uploaded activities from the database
$sql = "SELECT * FROM activities_upload";
$result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Activity Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient( #b3cce6,#02835640, #b3cce6);
            margin: 0;
            padding: 0;
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
            font-size: 0.8rem;
            transition: background-color 0.3s, color 0.3s;
        }
        
        .auth-buttons .signup {
            background-color: transparent;
            color: #028355;
        }
        
        .auth-buttons .signup:hover {
            font-weight: bold;
            font-size: 0.8rem;
            color: #028355;
            animation: buttonHover 0.3s forwards;
        }


h1 {
    font-size: 28px;
    color: #333;
    margin-bottom: 20px;
}

/* Video Grid Styling */
.video-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    padding: 20px;
    justify-items: center;
}

/* Video Card Styling */
.video-cards {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    max-width: 300px;
    width: 100%;
    text-align: center;
}

.video-cards:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

/* Video Styling */
video {
    width: 100%;
    height: auto;
    display: block;
    border-bottom: 1px solid #ddd;
}

/* Title and Description */
.video-title {
    font-size: 1.3rem;
    font-weight: bold;
    color: #204060;
    margin: 10px 0 5px;
    padding: 0 10px;
}

.video-description {
    font-size: 1rem;
    color: #666;
    padding: 0 10px 10px;
    line-height: 1.5;
}

/* No Activities Message */
.video-grid p {
    color: #888;
    font-size: 1rem;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .video-title {
        font-size: 16px;
    }

    .video-description {
        font-size: 12px;
    }
}

@media (max-width: 480px) {
    h1 {
        font-size: 24px;
    }

    .video-title {
        font-size: 14px;
    }

    .video-description {
        font-size: 11px;
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
            <a href=""><button class="signup" >Back to Home</button></a>
        </div>
    </header>


    <h1 style="text-align:center; margin: 20px 0; font-family: Arial, sans-serif;">Patient Activities</h1>
    <div class="video-grid">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $videoPath = "../therapist/activities/" . htmlspecialchars($row['filename']);
                $title = htmlspecialchars($row['activitytitle']);
                $description = htmlspecialchars($row['activitydscription']);
                echo '
                <div class="video-cards">
                    <video controls>
                        <source src="' . $videoPath . '" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="video-title">' . $title . '</div>
                    <div class="video-description">' . $description . '</div>
                </div>
                ';
            }
        } else {
            echo '<p style="text-align:center; font-size:16px;">No activities available at the moment.</p>';
        }
        ?>
    </div>
</body>

</html>
