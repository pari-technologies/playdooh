<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
//echo "in login php";
// Include config file
require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){  
 
    $i_email = $_POST["email"];
    $i_quote_query = $_POST["quote_query"];
    $i_client_name = $_POST["client_name"];
    $i_compaign_name = $_POST["campaign_name"];
    $i_duration = $_POST["duration"];

    // echo $i_contact_person_phone;
    
     // Attempt select query execution
                    $sql = "INSERT INTO vr_quotation (user_email,user_quote,client_name,campaign_name,duration) "
                         . "VALUES ('".$i_email."','".$i_quote_query."','".$i_client_name."','".$i_compaign_name."','".$i_duration."')";
                    
                    if ($link->query($sql) === TRUE) {

                        $myObj->result = 1;
                        $myObj->message = "Save success";

                        $myJSON = json_encode($myObj);
                        echo $myJSON;
                      } else {
                          
                        $myObj->result = 0;
                        $myObj->message = "No results";
                        $myObj->error = mysqli_error($link);

                        $myJSON = json_encode($myObj);
                        echo $myJSON;

                      }
 
                    // Close connection
                    mysqli_close($link);
}



?>

