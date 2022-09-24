<?php

$errors = [];
$data = [];
$name = $_POST['name'];
$email = $_POST['email'];
$super = $_POST['superheroAlias'];
if (empty($name)) {
    $errors['name'] = 'Name is required.';
}

if (empty($_POST['email'])) {
    $errors['email'] = 'Email is required.';
}

if (empty($_POST['superheroAlias'])) {
    $errors['superheroAlias'] = 'Superhero alias is required.';
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {


$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "blog";

//create connection

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

$sql = "INSERT INTO student (name, email, super) VALUES ('$name','$email','$super')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

    $data['success'] = true;
    $data['message'] = 'Success!';
}

echo json_encode($data);

?>