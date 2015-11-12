<?php
$result = '';

# General info
$firstName = $lastName = $birthDate = $gender = $address = $city = $province = $postalCode = $country = $name = $position = '';
$errfirstName = $errlastName = $errBirthDate = $errGender = $errAddress = $errCity = $errProvince = $errPostalCode = $errCountry = '';

# Student info
$studentNumber = $phoneNumber = $email = $status = $type = $level = $program = $department = '';
$errStudentNumber = $errPhoneNumber = $errEmail = $errStatus = $errtype = $errLevel = $errProgram = $errDepartment = $errPosition = '';

if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $birthDate = $_POST['birthDate'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $address = $_POST['address'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $postalCode = $_POST['postalCode'];
    $country = $_POST['country'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $studentNumber = $_POST['studentNumber'];
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $level = isset($_POST['level']) ? $_POST['level'] : '';
    $program = $_POST['program'];
    $department = $_POST['department'];
    $position = isset($_POST['position']) ? $_POST['position'] : '';

    # RAVI - Need to validate INFO

    // Check if first name and last name has been entered
    if (!$_POST['firstName']) {
        $errfirstName = '*Enter your First Name';
    }
    if (!$_POST['lastName']) {
        $errlastName = '*Enter your Last Name';
    }
    // Check if birth date has been entered
    if (!$_POST['birthDate']) {
        $errBirthDate = '*Enter your Date of Birth';
    }
    // Check if gender has been selected
    if (!isset($_POST['gender'])) {
        $errGender = '*Select a Gender';
    }
    // Check if address has been entered
    if (!$_POST['address']) {
        $errAddress = '*Enter your address';
    }
    // Check if city has been entered
    if (!$_POST['city']) {
        $errCity = '*Enter a valid city';
    }
    // Check if province has been entered
    if (!$_POST['province']) {
        $errProvince = '*Enter a valid Province';
    }
    // Check if zip code has been entered
    if (!$_POST['postalCode']) {
        $errPostalCode = '*Enter a valid Postal Code';
    }
    // Check if country has been entered
    if (!$_POST['country']) {
        $errCountry = '*Select a Country';
    }
    // Check if phone has been entered
    if (!$_POST['phoneNumber']) {
        $errPhoneNumber = '*Enter your Phone Number';
    }
    // Check if email has been entered and is valid
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errEmail = '*Enter a valid Email';
    }
    // Check if student number has been entered
    if (!$_POST['studentNumber']) {
        $errStudentNumber = '*Enter your Student Number';
    }
    // Check if student status has been selected
    if (!isset($_POST['status'])) {
        $errStatus = '*Choose a Status';
    }
    // Check if student status has been selected
    if (!isset($_POST['type'])) {
        $errtype = '*Select a Student Type';
    }
    // Check if student level has been selected
    if (isset($_POST['level']) && $_POST['level']=="--- Select a Level ---") {
        $errLevel = '*Select a Student Level';
    }
    // Check if student status has been selected
    if (!$_POST['program']) {
        $errProgram = '*Enter a valid Program';
    }
    // Check if student status has been selected
    if (!$_POST['department']) {
        $errDepartment = '*Enter a valid Department';
    }
}
?>