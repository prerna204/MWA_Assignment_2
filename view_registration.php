<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Registrations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .back-btn {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h2>Event Registrations</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Contact No.</th>
            <th>Event</th>
            <th>No. of Members</th>
        </tr>
        <?php
            // Database connection settings
            $servername = "127.0.0.1";
            $username = "root";  // Default XAMPP username
            $password = "";  // Default XAMPP password (empty)
            $dbname = "event_registration";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname, 3307);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch registrations from the database
            $sql = "SELECT name, email, contact, event, members FROM registrations";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['name']) . "</td>
                            <td>" . htmlspecialchars($row['email']) . "</td>
                            <td>" . htmlspecialchars($row['contact']) . "</td>
                            <td>" . htmlspecialchars($row['event']) . "</td>
                            <td>" . htmlspecialchars($row['members']) . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No registrations found.</td></tr>";
            }

            $conn->close();
        ?>
    </table>

    <a href="index.html" class="back-btn">Back to Registration</a>

</body>
</html>
