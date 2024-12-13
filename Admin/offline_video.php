<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vocal_vantage";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteQuery = "DELETE FROM therapist_upload_video WHERE id=$id";
    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>alert('Video deleted successfully.');</script>";
    } else {
        echo "Error deleting video: " . $conn->error;
    }
}

// Fetch all videos
$sql = "SELECT * FROM therapist_upload_video";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard -Lesson  Videos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f9;
            margin: 0;
            padding: 0;
        }

        .dashboard-container {
            max-width: 90%;
            margin: 30px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #5a7d9a;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e8f0fe;
        }

        .action-btn {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
            font-size: 14px;
        }

        .edit-btn {
            background-color: #4caf50;
        }

        .delete-btn {
            background-color: #f44336;
        }

        .edit-btn:hover {
            background-color: #45a049;
        }

        .delete-btn:hover {
            background-color: #e53935;
        }

        video {
            max-width: 150px;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="dashboard-container">
        <h2>Admin Dashboard - Uploaded Lesson Videos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Video</th>
                    <th>Age Group</th>
                    <th>Therapy Category</th>
                    <th>Video Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td><video controls><source src='../therapist/videos/" . $row['filename'] . "' type='video/mp4'>Your browser does not support video playback.</video></td>";
                        echo "<td>" . $row['agegroup'] . "</td>";
                        echo "<td>" . $row['therapycategory'] . "</td>";
                        echo "<td>" . $row['videotitle'] . "</td>";
                        echo "<td>" . $row['videodescription'] . "</td>";
                        echo "<td>
                                <a href='?delete=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this video?\");' class='action-btn delete-btn'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No videos found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php
$conn->close();
?>