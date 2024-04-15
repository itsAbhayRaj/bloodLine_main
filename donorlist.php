

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        li:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>

<div class="container">
<?php

// Start the session
session_start();

// Check if donor data is available in the session
if(isset($_SESSION['donors'])) {
    // Retrieve donor data from the session
    $donors = $_SESSION['donors'];

    echo "<h2>Matching Donors:</h2>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Blood Group</th>";
    echo "<th>Age</th>";
    echo "<th>Email</th>";
    echo "<th>Phone</th>";
    echo "<th>Gender</th>";
    echo "<th>Weight</th>";
    echo "<th>State</th>";
    echo "<th>District</th>";
 
    echo "</tr>";
    function calculateAge($dob) {
        $dob = new DateTime($dob);
        $now = new DateTime();
        $interval = $now->diff($dob);
        return $interval->y;
    }

    foreach($donors as $donor) {


        echo "<tr>";
        echo "<td>" . $donor["name"] . "</td>";
        echo "<td>" . $donor["bloodgroup"] . "</td>";
        echo "<td>" . calculateAge($donor["birthdate"]) . "</td>";
        echo "<td>" . $donor["email"] . "</td>";
        echo "<td>" . $donor["phone"] . "</td>";
        echo "<td>" . $donor["gender"] . "</td>";
        echo "<td>" . $donor["weight(kg)"] . "</td>";
        echo "<td>" . $donor["state"] . "</td>";
        echo "<td>" . $donor["district"] . "</td>";

        echo "</tr>";
    }
    echo "</table>";

    // Clear the session data
    unset($_SESSION['donors']);
} else {
    echo "<p>No donor data found.</p>";
}


?>
</div>

</body>
</html>
