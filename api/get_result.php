<?php
error_reporting(E_ERROR | E_PARSE);
// echo "in login php";
// Include config file
require_once "config.php";


if($_SERVER["REQUEST_METHOD"] == "GET"){
$i_filters = $_GET["filters"];
$i_media_platform = $_GET["media_platform"];
$i_site_code = $_GET["site_code"];
$i_total_screen_size = $_GET["total_screen_size"];
$i_state_name = $_GET["state_name"];
$i_district = $_GET["district"];
$i_road_site = $_GET["road_site"];
$i_orientation = $_GET["orientation"];
$i_location1 = $_GET["location1"];
$i_location2 = $_GET["location2"];
$i_pc = $_GET["pc"];
$i_dwell_time = $_GET["dwell_time"];
$i_angle_of_view = $_GET["angle_of_view"];
$i_board_viewing_distance = $_GET["board_viewing_distance"];
$i_competing_screens = $_GET["competing_screens"];

// echo $i_media_platform."<br>";
// echo $i_site_code."<br>";
// echo $i_state_name."<br>";
// echo $i_district."<br>";
// echo $i_road_site."<br>";
// echo $i_orientation."<br>";
// echo $i_location1."<br>";
// echo $i_location2."<br>";
// echo $i_pc."<br>";
// echo $i_dwell_time."<br>";
// echo $i_angle_of_view."<br>";
// echo $i_board_viewing_distance."<br>";
// echo $i_competing_screens."<br>";

if($i_filters == 0){
    $sql = "SELECT * from vr_assets";
}
else{
    $sql = "SELECT * from vr_assets where";
}



if($i_media_platform != ""){
    $sql .= " media_platform REGEXP '".$i_media_platform."' ";
}

if($i_site_code != ""){
    $array = explode(",",$i_site_code);
    $comma_separated = implode("','", $array);
    $comma_separated = "'".$comma_separated."'";
    if($i_filters > 1){
        $sql .= " and site_code IN (".$comma_separated.") ";
    }
    else{
        $sql .= " site_code IN (".$comma_separated.") ";
    }
    
}

if($i_total_screen_size != ""){
    if($i_filters > 1){
         if($i_total_screen_size === "b_100ft"){
            $sql .= " and total_screen_size < 1000";
          }
          else{
              $sql .= " and total_screen_size >= 1000";
          }
    }
    else{
        if($i_total_screen_size === "b_100ft"){
            $sql .= " total_screen_size < 1000";
          }
          else{
              $sql .= " total_screen_size >= 1000";
          }
    }
    
   
}

if($i_state_name != ""){
    $array = explode(",",$i_state_name);
    $comma_separated = implode("','", $array);
    $comma_separated = "'".$comma_separated."'";
    if($i_filters > 1){
        $sql .= " and state IN (".$comma_separated.") ";
    }
    else{
        $sql .= " state IN (".$comma_separated.") ";
    }
    
}


if($i_district != ""){
    $array = explode(",",$i_district);
    $comma_separated = implode("','", $array);
    $comma_separated = "'".$comma_separated."'";
    if($i_filters > 1){
        $sql .= " and district IN (".$comma_separated.") ";
    }
    else{
        $sql .= " district IN (".$comma_separated.") ";
    }
    
}


if($i_road_site != ""){
    $array = explode(",",$i_road_site);
    $comma_separated = implode("','", $array);
    $comma_separated = "'".$comma_separated."'";
    if($i_filters > 1){
        $sql .= " and road_site IN (".$comma_separated.") ";
    }
    else{
        $sql .= " road_site IN (".$comma_separated.") ";
    }
    
}

if($i_orientation != ""){
    if($i_filters > 1){
        $sql .= " and orientation REGEXP '".$i_orientation."' ";
    }
    else{
        $sql .= " orientation REGEXP '".$i_orientation."' ";
    }
    
}

if($i_location1 != ""){
    if($i_filters > 1){
        $sql .= " and location_type_1 REGEXP '".$i_location1."' ";
    }
    else{
        $sql .= " location_type_1 REGEXP '".$i_location1."' ";
    }
    
}

if($i_location2 != ""){
    if($i_filters > 1){
        $sql .= " and location_type_2 REGEXP '".$i_location2."' ";
    }
    else{
        $sql .= " location_type_2 REGEXP '".$i_location2."' ";
    }
    
}

if($i_pc != ""){
    if($i_filters > 1){
        $sql .= " and pc REGEXP '".$i_pc."' ";
    }
    else{
        $sql .= " pc REGEXP '".$i_pc."' ";
    }
    
}


if($i_dwell_time != ""){
    if($i_filters > 1){
        $sql .= " and dwell_time REGEXP '".$i_dwell_time."' ";
    }
    else{
        $sql .= " dwell_time REGEXP '".$i_dwell_time."' ";
    }
    
}


if($i_angle_of_view != ""){
    if($i_filters > 1){
        $sql .= " and angle_of_view REGEXP '".$i_angle_of_view."' ";
    }
    else{
        $sql .= " angle_of_view REGEXP '".$i_angle_of_view."' ";
    }
    
}

if($i_board_viewing_distance != ""){
    if($i_filters > 1){
        $sql .= " and board_viewing_distance LIKE '".$i_board_viewing_distance."' ";
    }
    else{
        $sql .= " board_viewing_distance LIKE '".$i_board_viewing_distance."' ";
    }
    
}


if($i_competing_screens != ""){
    if($i_filters > 1){
        $sql .= " and competing_screens LIKE '".$i_competing_screens."' ";
    }
    else{
        $sql .= " competing_screens LIKE '".$i_competing_screens."' ";
    }
    
}


// $sql .= " limit 400";
// echo $sql.'<br>';

 // Attempt select query execution
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

