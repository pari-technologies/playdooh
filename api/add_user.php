<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
//echo "in login php";
// Include config file
require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){  
 
    $i_first_name = $_POST["firstname"];
    $i_last_name = $_POST["lastname"];
    $i_email = $_POST["email"];
    $i_company = $_POST["company"];
    $i_phone_no = $_POST["phone_no"];
    $i_pass = $_POST["pass"];
    $i_verify_pass = $_POST["verify_pass"];

    // echo $i_contact_person_phone;
    
     // Attempt select query execution
                    $sql = "INSERT INTO vr_user (vr_f_name,vr_l_name,vr_email,vr_company,vr_phone_no,vr_password) "
                         . "VALUES ('".$i_first_name."','".$i_last_name."','".$i_email."','".$i_company."','".$i_phone_no."','".md5($i_pass)."')";
                    
                    if ($link->query($sql) === TRUE) {
                        $_SESSION["vr_email"] = $i_email;

                        header("Location: ../index.html");
                        // Free result set
                      } else {
                        // echo mysqli_error($link);
                            header("Location: ../signup.html");

                      }
 
                    // Close connection
                    mysqli_close($link);
}



?>

