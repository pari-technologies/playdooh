<?php
error_reporting(E_ERROR | E_PARSE);
// echo "in login php";
// Include config file
require_once "config.php";



if($_SERVER["REQUEST_METHOD"] == "GET"){
    $i_media_platform = $_GET["media_platform"];
    
    if($i_media_platform == ""){
    $sql = "SELECT DISTINCT(site_code) from vr_assets";
    }
    else{
        $sql = "SELECT DISTINCT(site_code) from vr_assets where media_platform REGEXP '".$i_media_platform."'";
    }

                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            while( $row = mysqli_fetch_assoc($result)){
                                
                                $new_array[] = mb_convert_encoding($row, 'UTF-8', 'UTF-8'); // Inside while loop
                            }

                            $myObj->result = 1;
                            $myObj->data = $new_array;
                            
                            $myJSON = json_encode($myObj);
                            
                            echo $myJSON;
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            $myObj->result = 0;
                            $myObj->message = "No results";
                            $myObj->error = mysqli_error($link);

                            $myJSON = json_encode($myObj);
                            echo $myJSON;
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
    
}


?>