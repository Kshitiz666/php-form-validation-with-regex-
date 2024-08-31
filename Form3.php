<?php
/* WAP to create a HTML form that contains , a textbox for name, email, phone, a select box for 
country, radio for gender and check box for interest and perform server side validation when the form 
is submitted: 
o All fields are required  
o Name only contain character & whitespace  
o Phone number contains only numbers & 9 digits only \ 
o Gender must be selected  
o At least one character box should be selected. */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['my_name'];
    $email = $_POST['my_email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : []; // Handle checkbox array
    $about = $_POST['about'];
    
    // Define regex patterns
    $namePattern = '/^[A-Za-z\s]+$/'; // Only letters and whitespace
    $phonePattern = '/^[0-9]{9}$/'; // Exactly 9 digits

    // Check for empty fields
    if (empty($name) || empty($email) || empty($phone) || empty($gender) || empty($country)) {
        echo "All fields are required.<br>";
    } 
    // Check if at least one checkbox is selected
    elseif (empty($hobbies)) {
        echo "Please select at least one hobby.<br>";
    } 
    // Validate name
    elseif (!preg_match($namePattern, $name)) {
        echo "Name must only contain letters and whitespace.<br>";
    } 
    // Validate email
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.<br>";
    } 
    // Validate phone number
    elseif (!preg_match($phonePattern, $phone)) {
        echo "Phone number must contain exactly 9 digits.<br>";
    } 
    // Validate about us field
    elseif (strlen($about) > 250) {
        echo "About us must be less than 250 characters.<br>";
    } 
    else {
        echo "Form is valid.<br>";
    }
}
?>

<form method="post">
    Name: <input type="text" name="my_name"><br>
    Email: <input type="text" name="my_email"><br>
    Phone: <input type="text" name="phone"><br>
    Gender:
    <input type="radio" name="gender" value="male"> Male
    <input type="radio" name="gender" value="female"> Female<br>
    Country:
    <select name="country">
        <option value="">Select a country</option>
        <option value="USA">USA</option>
        <option value="Canada">Canada</option>
        <option value="UK">UK</option>
        <!-- Add more countries as needed -->
    </select><br>
    Hobbies:
    <input type="checkbox" name="hobbies[]" value="Studying"> Studying
    <input type="checkbox" name="hobbies[]" value="Playing"> Playing
    <input type="checkbox" name="hobbies[]" value="Riding"> Riding<br>
    About us: <textarea name="about" rows="10" cols="20"></textarea><br>
    <input type="submit" value="Submit"><br>
</form>
