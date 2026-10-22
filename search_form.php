<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Lab 09 - Search for a car by model">
    <meta name="author" content="Krishaga Maddumage">
    <title>Lab 09 - Car Search</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 2em;
        }
        label, input {
            margin-right: 0.5em;
        }
    </style>
</head>
<body>
    <h1>Search for a Car</h1>
    <!-- GET is used for search forms: it's a read-only request and the
         search term shows in the URL, so results can be bookmarked/shared -->
    <form action="search_result.php" method="get">
        <p>
            <label for="model">Car model:</label>
            <input type="text" id="model" name="model" placeholder="e.g. Corolla" required>
            <input type="submit" value="Search">
        </p>
    </form>
</body>
</html>
