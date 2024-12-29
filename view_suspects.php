<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Suspects</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>All Suspects</h1>
        <?php
        include 'config.php'; // Include database configuration

        // SQL to fetch suspect data
        $sql = "SELECT * FROM Suspect";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1' style='width: 100%; text-align: left;'>";
            echo "<tr>
                    <th>Suspect ID</th>
                    <th>Name</th>
                    <th>Personal Details</th>
                    <th>Associated Case ID</th>
                  </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Suspect_ID'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['Personal_details'] . "</td>";
                echo "<td>" . $row['Case_ID'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No suspects found.</p>";
        }

        $conn->close(); // Close the database connection
        ?>
        <a href="index.html">Back to Home</a>
    </div>
</body>
</html>
