<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
//echo "in login php";
// Include config file
require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $input_email = $_POST["email"];
  $input_password = $_POST["password"];

   // Attempt select query execution
                      $sql = "SELECT * from vr_user where vr_email = '".$input_email."' and vr_password = '".md5($input_password)."'";
                     
                      if($result = mysqli_query($link, $sql)){
                          if(mysqli_num_rows($result) > 0){
                            while( $row = mysqli_fetch_assoc($result)){
                              $new_array[] = $row; // Inside while loop
                          }

                          $_SESSION["vr_email"] = $input_email;
                          $_SESSION["vr_name"] = $new_array[0]['vr_f_name']." ".$new_array[0]['vr_l_name'];

                          echo "<script>";
                          //echo "alert('Welcome!');";
                          echo "window.location = ' ../campaign.php'"; // redirect with javascript, after page loads
                          echo "</script>";
                          } 
                          else{
                            echo "<script>";
                            echo "alert('Wrong email or password');";
                            echo "window.history.back();"; // redirect with javascript, after page loads
                            echo "</script>";
                          }
                      } else{
                          echo "Oops! Something went wrong. Please try again later.";
                      }
   
                      // Close connection
                      mysqli_close($link);
  }
  
  ?>

