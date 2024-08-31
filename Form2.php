<?php
/*WAP to create the following signup form and perform the following: Email: Username: Password:
Confirm Password:
• email validation • username consists of number and characters and six digits long • password and username should 
not be same and must be greater than 8 digits. • all the fields are required  */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Define patterns for validation
    $usernamePattern = '/^[a-zA-Z0-9]{6}$/';
    $emailPattern = '/^[\w\.]+@[\w]+\.[a-z]{2,}$/';
    
    // Initialize an array to hold error messages
    $errors = [];

    // Validate fields
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $errors[] = "All fields are required.";
    }

    if (!preg_match($usernamePattern, $username)) {
        $errors[] = "Username must be 6 characters long and consist of letters and numbers.";
    }

    if (!preg_match($emailPattern, $email)) {
        $errors[] = "Email format is invalid.";
    }

    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    if ($username === $password) {
        $errors[] = "Username and password must not be the same.";
    }

    // If no errors, print success message
    if (empty($errors)) {
        echo "Form is Valid";
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>

<form method="post">
    Username: <input type="text" name="username"><br>
    Email: <input type="text" name="email"><br>
    Password: <input type="password" name="password"><br>
    Confirm Password: <input type="password" name="confirm_password"><br>
    <input type="submit" value="Submit"><br>
</form>