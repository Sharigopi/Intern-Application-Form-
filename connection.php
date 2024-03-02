<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$Date_of_Joining = $Name_of_the_Intern = $Email = $Phone_Number = $Date_of_Birth = $Age = $Department = $Internship_Period = $Last_Date = '';
$success_message = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize
    $Date_of_Joining = $conn->real_escape_string($_POST['joinDate'] ?? '');
    $Name_of_the_Intern = $conn->real_escape_string($_POST['internName'] ?? '');
    $Email = $conn->real_escape_string($_POST['email'] ?? '');
    $Phone_Number = $conn->real_escape_string($_POST['phoneNumber'] ?? '');
    $Date_of_Birth = $conn->real_escape_string($_POST['dob'] ?? '');
    $Age = $conn->real_escape_string($_POST['age'] ?? '');
    $Department = $conn->real_escape_string($_POST['department'] ?? '');
    $Internship_Period = $conn->real_escape_string($_POST['internPeriod'] ?? '');
    $Last_Date = $conn->real_escape_string($_POST['lastDate'] ?? ''); 
    
   
    $sql = "INSERT INTO intern (joinDate, internName, email, PhoneNumber, dob, age, department, internPeriod, lastDate)
            VALUES ('$Date_of_Joining', '$Name_of_the_Intern', '$Email', '$Phone_Number', '$Date_of_Birth', '$Age', '$Department', '$Internship_Period', '$Last_Date')";
            
    if ($conn->query($sql) === TRUE) {
        $success_message = "Intern added successfully";
    } else {
        $success_message = "Error adding intern: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission Result</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg" style="background-image: url('http://yesofcorsa.com/wp-content/uploads/2016/12/Abstract-Wallpaper-Widescreen.png');">
    <div class="container-xl bg-dark-transparent rounded p-4 mt-5">
        <div class="container-xl p-2 bg-opacity-10">
            <div class="row justify-content-center">
                <div class="custom-form p-3 bg-opacity-10 text-white rounded shadow" style="max-width: 600px;">
                    <h1 class="bg-info p-2 bg-opacity-100">Form Submission Result</h1>
                    <p><?php echo $success_message; ?></p>
                    <p>Date_of_Joining: <?php echo $Date_of_Joining; ?></p>
                    <p>Name_of_the_Intern: <?php echo $Name_of_the_Intern; ?></p>
                    <p>Email: <?php echo $Email; ?></p>
                    <p>Phone_Number: <?php echo $Phone_Number; ?></p>
                    <p>Date_of_Birth: <?php echo $Date_of_Birth; ?></p>
                    <p>Age: <?php echo $Age; ?></p>
                    <p>Department: <?php echo $Department; ?></p>
                    <p>Internship_Period: <?php echo $Internship_Period; ?></p>
                    <p>Last_Date: <?php echo $Last_Date; ?></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
