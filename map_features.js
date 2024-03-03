let map;


async function initMap() {
  const { Map } = await google.maps.importLibrary("maps");
  var bounds = new google.maps.LatLngBounds();
  map = new Map(document.getElementById("map"), {
    center: { lat: 3.1319, lng: 101.6841 },
    zoom: 12,
  });

  var sql = "api/get_result.php?";
  var markers = [];
  var marker;
  var filters = 0;
    var sql = "api/get_result.php?";
    var eMediaPlatform = document.getElementById("media_platform");
    var eMediaPlatformValue = eMediaPlatform.value;
    var eSiteCode = document.getElementById("site_code").selectedOptions;
    var eSiteCodeValue = Array.from(eSiteCode).map(({ value }) => value);
    var eTotalScreenSize = document.getElementById("total_screen_size").selectedOptions;
    var eTotalScreenSizeValue = Array.from(eTotalScreenSize).map(({ value }) => value);
    var eStateName = document.getElementById("state_name").selectedOptions;
    var eStateNameValue = Array.from(eStateName).map(({ value }) => value);
    var eDistrict = document.getElementById("district").selectedOptions;
    var eDistrictValue = Array.from(eDistrict).map(({ value }) => value);
    var eRoadSite = document.getElementById("road_site").selectedOptions;
    var eRoadSiteValue = Array.from(eRoadSite).map(({ value }) => value);
    var eOrientation = document.getElementById("orientation");
    var eOrientationValue = eOrientation.value;
    var eLocation1 = document.getElementById("location_1");
    var eLocation1Value = eLocation1.value;
    var eLocation2 = document.getElementById("location_2");
    var eLocation2Value = eLocation2.value;
    var ePc = document.getElementById("pc");
    var ePcValue = ePc.value;
    var eDwellTime = document.getElementById("dwell_time");
    var eDwellTimeValue = eDwellTime.value;
    var eAngleOfView = document.getElementById("angle_of_view");
    var eAngleOfViewValue = eAngleOfView.value;
    var eBoardViewingDistance = document.getElementById("board_viewing_distance");
    var eBoardViewingDistanceValue = eBoardViewingDistance.value;
    var eCompetingScreens = document.getElementById("competing_screens");
    var eCompetingScreensValue = eCompetingScreens.value;
    if(eMediaPlatformValue !== ""){
        filters +=1;
        sql += "&media_platform="+eMediaPlatformValue;
    }

    if(eSiteCodeValue.length!==0){
        filters +=1;
        sql += "&site_code="+eSiteCodeValue;
    }
    
     if(eTotalScreenSizeValue.length!==0){
         filters +=1;
        sql += "&total_screen_size="+eTotalScreenSizeValue;
    }
    
    if(eStateNameValue.length!==0){
        filters +=1;
        sql += "&state_name="+eStateNameValue;
    }
    
    if(eDistrictValue.length!==0){
        filters +=1;
        sql += "&district="+eDistrictValue;
    }
    
    if(eRoadSiteValue.length!==0){
        filters +=1;
        sql += "&road_site="+eRoadSiteValue;
    }
    
    if(eOrientationValue !== ""){
        filters +=1;
        sql += "&orientation="+eOrientationValue;
    }
    
    if(eLocation1Value !== ""){
        filters +=1;
        sql += "&location1="+eLocation1Value;
    }
    
    if(eLocation2Value !== ""){
        filters +=1;
        sql += "&location2="+eLocation2Value;
    }
    
    if(ePcValue !== ""){
        filters +=1;
        sql += "&pc="+ePcValue;
    }
    
    if(eDwellTimeValue !== ""){
        filters +=1;
        sql += "&dwell_time="+eDwellTimeValue;
    }
    
    if(eAngleOfViewValue !== ""){
        filters +=1;
        sql += "&angle_of_view="+eAngleOfViewValue;
    }
    
    if(eBoardViewingDistanceValue !== ""){
        filters +=1;
        sql += "&board_viewing_distance="+eBoardViewingDistanceValue;
    }
    
    if(eCompetingScreensValue !== ""){
        filters +=1;
        sql += "&competing_screens="+eCompetingScreensValue;
    }
    
    sql += "&filters="+filters;

   var xhttp_map = null;
    //Prevents an issue where previous requests get stuck and new ones then fail
   if (xhttp_map === null) {
       xhttp_map = new XMLHttpRequest();
   } else {
       xhttp_map.abort();
   }
    xhttp_map.onload = function() {
    
    var rData = JSON.parse(this.response);
    

  //   var markers = [
  //     ['Linden Lodge Care Home', 3.1319,101.6841],
  //     ['Linden Lodge Residential Home', 52.6009934, -1.6183551],
  //     // ['Linden Grange Residential Home', 52.5486357, -1.5215572],
  // ];

    for(let i = 0; i < rData.data.length; i++) {
        let obj = rData.data[i];
        if(obj.gps_coordinate !== "-"){
          // markers.push([obj.vr_location_type,obj.vr_gps]);
        //   console.log(obj.vr_main_type);
          const locArray = obj.gps_coordinate.split(",");
        //   console.log(locArray);

          var position = new google.maps.LatLng(locArray[0],locArray[1]);
          bounds.extend(position);
          marker = new google.maps.Marker({
              position: position,
              map: map,
              title: obj.vr_location_type,
          });
          // Automatically center the map fitting all markers on the screen
          map.fitBounds(bounds);
          marker.setMap(map);
        }
       
    }
    };
    xhttp_map.onreadystatechange = function() {
        // console.log("readystate map- "+this.readyState);
        // console.log("status map- "+this.status);
        // console.log("responsetext map- "+this.responseText);
    
  };
    xhttp_map.open("GET", sql,true);
    xhttp_map.send();

 



// for( i = 0; i < markers.length; i++ ) {
//   var position = new google.maps.LatLng(markers[i][1]);
//   bounds.extend(position);
//   marker = new google.maps.Marker({
//       position: position,
//       map: map,
//       title: markers[i][0],
//   });
//   // Automatically center the map fitting all markers on the screen
//   map.fitBounds(bounds);
//   marker.setMap(map);
// }

}

// initMap();