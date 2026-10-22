<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Lab 09 - Car search results">
    <meta name="author" content="Krishaga Maddumage">
    <title>Lab 09 - Search Results</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 2em;
        }
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #333;
            padding: 5px 10px;
            text-align: left;
        }
        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h1>Search Results</h1>
<?php
    require_once "settings.php";

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$conn) {
        echo "<p>Unable to connect to the db.</p>";
    } else {
        if (isset($_GET['model']) && trim($_GET['model']) !== "") {
            // Sanitise input to protect against SQL injection
            $model = mysqli_real_escape_string($conn, trim($_GET['model']));

            // LIKE with % wildcards matches partial names, e.g. "cor" finds Corolla and Commodore
            $sql = "SELECT * FROM cars WHERE model LIKE '%$model%'";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Make</th><th>Model</th><th>Price</th><th>Year</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['car_id'] . "</td>";
                    echo "<td>" . htmlspecialchars($row['make']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['model']) . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['yom'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>&#128683; No matching cars found.</p>";
            }
        } else {
            echo "<p>Please enter a model to search.</p>";
        }

        mysqli_close($conn);
    }
?>
    <p><a href="search_form.php">Back to search</a></p>
</body>
</html>
