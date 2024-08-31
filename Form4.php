<?php
/* Write Server side  code to validate user submitted data: username, password and phone. [Hint: None 
of the fields are blank, password is at least 6 character long and phone number contains 10 digits and 
must start with 98 and ends with 00]*/
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    // Define regex patterns
    $phonePattern = '/^98\d{6}00$/'; // Must start with 98, end with 00, and be exactly 10 digits long

    // Check for empty fields
    if (empty($username) || empty($password) || empty($phone)) {
        echo "All fields are required.<br>";
    } 
    // Validate password length
    elseif (strlen($password) < 6) {
        echo "Password must be at least 6 characters long.<br>";
    } 
    // Validate phone number
    elseif (!preg_match($phonePattern, $phone)) {
        echo "Phone number must contain exactly 10 digits, start with 98, and end with 00.<br>";
    } 
    else {
        echo "Form is valid.<br>";
    }
}
?>

<form method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    Phone: <input type="text" name="phone"><br>
    <input type="submit" value="Submit"><br>
</form>
