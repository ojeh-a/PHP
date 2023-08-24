<?php

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$number = $_POST['number'];
$gender = $_POST['gender'];
$message = $_POST['message'];
$mood = $_POST['mood'];


//var_dump($firstname, $lastname, $email, $number, $gender, $message, $mood);
// database connection
$connect = new mysqli('localhost', 'root', '', 'personal_data');

// check connection
if ($connect->connect_error){
    die("Connection failed: ". $connect->connect_error);
}

// prepare and bind
$statement = $connect->prepare("INSERT INTO registration (firstname, lastname, email, number, gender, message, mood) VALUES (?, ?, ?, ?, ?, ?, ?)");

if (!$statement){
    die("Prepare failed: " . $connect->error);
}

$statement->bind_param("sssisss", $firstname, $lastname, $email, $number, $gender, $message, $mood);

// execute
if ($statement->execute()){
echo "Data successfully saved.";
} else{
    echo "Error: " . $statement->error;
}

// close statement
$statement->close();
$connect->close()
?>
