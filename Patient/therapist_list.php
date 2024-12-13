<?php
// Connect to the database
$connect = mysqli_connect("localhost", "root", "", "vocal_vantage");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from personal_info table
$query = "SELECT * FROM personal_info";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Therapist Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            text-align: left;
            padding: 12px;
            border: 1px solid #ddd;
        }
        td img {
            max-width: 50px;
            border-radius: 50%;
        }
        th {
            background-color: #5a7d9a;
            color: white;
        }
        td a {
            text-decoration: none;
            color: #0073e6;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Therapist Details </h2>
    <?php if (mysqli_num_rows($result) > 0): ?>
        <table>
            <thead>
            <tr>
                <th>Filename</th>
                <th>Name</th>
                <th>Speciality</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Age</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td>
                        <img src="../therapist/files/<?php echo htmlspecialchars($row['filename']); ?>" 
                             alt="Profile Image">
                    </td>
                    <td>
                        <a href="../therapist/files/<?php echo htmlspecialchars($row['filename']); ?>" target="_blank">
                            <?php echo htmlspecialchars($row['filename']); ?>
                        </a>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['speaciality']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone_number']); ?></td>
                    <td><?php echo htmlspecialchars($row['age']); ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No records found.</p>
    <?php endif; ?>
    <?php mysqli_close($connect); ?>
</div>
</body>
</html>
