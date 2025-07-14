<?php 
session_start();

define("APIURL", "http://localhost/dashboard/Projects/Udemi/coffee-blend/");

include('../config/config.php');

if (isset($_POST['book'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $phone = $_POST['phone'];
    $message = $_POST['message']; // spelling fix
    $user_id = $_SESSION['user']['id'];

    if (empty($fname)) {
        $_SESSION['error'] = "First name is required";
    } elseif (empty($lname)) {
        $_SESSION['error'] = "Last name is required";
    } elseif (empty($date)) {
        $_SESSION['error'] = "Date is required";
    } elseif (empty($time)) {
        $_SESSION['error'] = "Time is required";
    } elseif (empty($phone)) {
        $_SESSION['error'] = "Phone number is required";
    } elseif (empty($message)) {
        $_SESSION['error'] = "Message is required";
    } elseif ($date <= date('Y-m-d')) {
        $_SESSION['error'] = "Date must be greater than today";
    } else {
        $sql = "INSERT INTO booking (fname, lname, date, time, phone, massage, user_id) 
                VALUES ('$fname', '$lname', '$date', '$time', '$phone', '$message', '$user_id')";
        if ($conn->query($sql)) {
            $_SESSION['success'] = "Booking successful";
        } else {
            $_SESSION['error'] = "Database error: " . $conn->error;
        }
    }

    // ✅ Always redirect after processing
    header("Location: " . APIURL . "index.php");
    exit();
}
?>
