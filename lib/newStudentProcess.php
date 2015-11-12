
<?php

    require("../lib/sqlQueries.php");

//# General info
//    $firstName = $lastName = $birthDate = $gender = $address = $city = $province = $postalCode = $country = $name = $position = '';
//
//# Student info
//    $studentNumber = $phoneNumber = $email = $status = $type = $level = $program = $department = '';

    $newStudent = new AdminSystem();


    $name = $_POST['firstName'] + " " + $_POST['lastName'];
    //$name = $newStudent->escape($name);

    $birthDate = $_POST['birthDate'];
    $birthDate = $newStudent->escape($birthDate);

    if(isset($_POST['gender'])) {
        $gender = $_POST['gender'];
        $gender = $newStudent->escape($gender);
    }

    $address = $_POST['address'];
    $address = $newStudent->escape($address);

    $city = $_POST['city'];
    $city = $newStudent->escape($city);

    $province = $_POST['province'];
    $province = $newStudent->escape($province);

    $postalcode = $_POST['postalCode'];
    $postalcode = $newStudent->escape($postalcode);

    if(isset($_POST['country'])) {
        $country = $_POST['country'];
        $country = $newStudent->escape($country);
    }


    $phoneNumber = $_POST['phoneNumber'];
    $phoneNumber = $newStudent->escape($phoneNumber);

    $email = $_POST['email'];
    $email = $newStudent->escape($email);

    $studentNumber = $_POST['studentNumber'];
    $studentNumber = $newStudent->escape($studentNumber);

    if(isset($_POST['status'])) {
        $status = $_POST['status'];
        $status = $newStudent->escape($status);
    }

    if(isset($_POST['type'])) {
        $type = $_POST['type'];
        $type = $newStudent->escape($type);
    }


    $level = $_POST['level'];
    $level = $newStudent->escape($level);

    $program = $_POST['program'];
    $program = $newStudent->escape($program);

    if(isset($_POST['department'])) {
    $department = $_POST['department'];
    $department = $newStudent->escape($department);
    $deptId = $newStudent->getDepartementID($department);
    }


    $position = $_POST['position'];
    $position = $newStudent->escape($position);


    $query = "INSERT INTO Student ( studentName, studentNumber, studentEmail, studentStatus, studentType, studentLevel, studentPhone, studentGender, studentBirthDate, studentProgram,  deptId) VALUES ( '$name', '$studentNumber', '$email', '$status','$type','$level','$phoneNumber','$gender','$birthDate','$program', '$deptId')";
    $studentId=$newStudent->addNewStudent($query);
//    $_SESSION['studentId']=$studentId;

    $query = "INSERT INTO CurrentPosition ( positionType, studentId) VALUES ( '$position', '$studentId')";
    $newStudent->addNewStudentPosition($query);


?>