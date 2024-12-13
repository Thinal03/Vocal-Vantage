<?php
// Connect to the database
$connect = mysqli_connect("localhost", "root", "", "vocal_vantage");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get search query if it exists
$search = '';
if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($connect, $_POST['search']);
}

// Fetch videos from the database with search filter
$sql = "SELECT * FROM therapist_upload_video WHERE 
        videotitle LIKE '%$search%' OR 
        agegroup LIKE '%$search%' OR 
        therapycategory LIKE '%$search%'";

$result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Library</title>
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


        .container {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
        }
.container h1{
    color: #204060;
    font-size: 2rem;
    text-align: center;
    margin-bottom: 30px;
}
        .search-bar {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
        }

        .search-bar input {
            padding: 10px;
            font-size: 16px;
            width: 300px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .video-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 5px; 
        }

        .video-card {
            background-color: #000E00;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 30%; 
            box-sizing: border-box;
            text-align: center; 
            margin-bottom: 50px;
        }

        .video-card video {
            width: 100%;
            height: 200px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .video-details {
            border-radius: 0 0 20px 20px;
            background-color:  #E9EDF4;
            margin-top: 10px;
        }

        .video-title {
            font-size: 1.6rem;
            font-weight: bold;
            color: #204060;
        }

        .video-description {
            color: #666;
            font-size: 1.3rem;
            margin: 8px 0;
        }

        .video-meta {
            font-size: 1rem;
            color: #999;
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

    <div class="container">
        <h1>Enhance your Private <br>Practice with Vocal Vantage <br>Academy</h1>

        <!-- Search Bar -->
        <div class="search-bar">
            <form method="POST" action="">
                <input type="text" name="search" placeholder="Search by title, age group, or category" value="<?php echo htmlspecialchars($search); ?>" />
            </form>
        </div><br><br>

        <div class="video-row">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="video-card">';
                    echo '<video controls>
                            <source src="../therapist/videos/' . htmlspecialchars($row['filename']) . '" type="video/mp4">
                            Your browser does not support the video tag.
                          </video>';
                    echo '<div class="video-details"><br>';
                    echo '<div class="video-title">' . htmlspecialchars($row['videotitle']) . '</div>';
                    echo '<div class="video-description">' . htmlspecialchars($row['videodescription']) . '</div>';
                    echo '<div class="video-meta">
                            Age Group: ' . htmlspecialchars($row['agegroup']) . ' | 
                            Therapy Category: ' . htmlspecialchars($row['therapycategory']) . '
                          </div><br><br>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No videos found matching your search.</p>";
            }

            // Close the connection
            mysqli_close($connect);
            ?>
        </div>
    </div>
</body>

</html>
