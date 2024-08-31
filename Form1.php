<?php
/*Perform server side validation using regex of:
a. Name validation
b. Number validation
C. Email validation
d. Phone pattern (must valid 98x-xxx-xxxx) and for(+977-01-xxxxxxx)
e. Password(must contain at least one upper case one lower case one numbers and one special symbol
 and not less than 8 characters)*/
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['myname'];
    $number = $_POST['mynumber'];
    $email = $_POST['myemail'];
    $password = $_POST['mypassword'];

    // Define validation patterns
    $namePattern = '/^[a-zA-Z0-9_\s]+$/';
    $numberPattern = '/^(?:98\d{8}|\+977-01-\d{7})$/';
    $emailPattern = '/^[\w\-.]+@([\w-]+\.)+[\w]{2,4}$/';
    $passwordPattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$/';

    // Error messages
    if (empty($name) || empty($number) || empty($email) || empty($password)) {
        echo "All fields are required.<br>";
    } elseif (!preg_match($namePattern, $name)) {
        echo "Invalid name format.<br>";
    } elseif (!preg_match($numberPattern, $number)) {
        echo "Invalid phone number format.<br>";
    } elseif (!preg_match($emailPattern, $email)) {
        echo "Invalid email format.<br>";
    } elseif (!preg_match($passwordPattern, $password)) {
        echo "Password should include at least 8 characters, one uppercase, one lowercase, one number, and one special character.<br>";
    } else {
        echo "Form is Valid.<br>";
        // Here you can process the valid input (e.g., save to database)
    }
}
?>

<form method="post">
    Name: <input type="text" name="myname"><br>
    Number: <input type="text" name="mynumber"><br>
    Email: <input type="text" name="myemail"><br>
    Password: <input type="password" name="mypassword"><br>
    <input type="submit" value="OK"><br>
</form>