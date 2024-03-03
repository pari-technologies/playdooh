let xhttp = null;

function getQuotationFirst() {
    // initMap();
    var filters = 0;
    
    var sql = "api/get_result.php?";
    
    sql += "filters="+filters;
    
    axios.get(sql).then(function (response) {
        console.log("from axiossssss");
        console.log(response.data);
    var emptyArray = '{"data":[]}';
    window.sessionStorage.removeItem("vr_item_saved");
    window.sessionStorage.removeItem("vr_item_takeout");
    window.sessionStorage.setItem("vr_item_saved", JSON.stringify(response.data));
    window.sessionStorage.setItem("vr_item_takeout", emptyArray);
    console.log("222");
    let vrData = window.sessionStorage.getItem("vr_item_saved");
    try {
        // alert(vrData);
        if(vrData == "Oops! Something went wrong. Please try again later."){
             alert("No data matches your query.");
        }
        else{
            var rData = JSON.parse(vrData);
               if(rData.result === 0){
                   alert("No data matches your query.");
               }
        }
       
    } catch (e) {
        alert("No data matches your query."+e);
    }
    
    
    var rDataTakeout = JSON.parse(emptyArray);
    if(rData.length<1){
        alert("No data matches your query.");
    }
    else{
                var vrItem = rData.data;
                var totalMinExposures = 0;
                var totalReach = 0;
                var totalRate = 0;
                var totalScreens = 0;
                var totalTraffic = 0;
                
                const unique = [...new Set(vrItem.map(item => item.media_platform))];;
                var unique_cost = [];
                
            
                for(let i = 0; i < vrItem.length; i++) {
                    let obj = vrItem[i];
            
                    if(!isNaN(obj.full_spot_min_exposures.replaceAll(',', ''))){
                        totalMinExposures += parseInt(obj.full_spot_min_exposures.replaceAll(',', ''));
                    }
                    if(!isNaN(obj.traffic_vehicles_monthly.replaceAll(',', ''))){
                        totalTraffic += parseInt(obj.traffic_vehicles_monthly.replaceAll(',', ''));
                    }
                    if(!isNaN(obj.reach_eyeballs_monthly.replaceAll(',', ''))){
                        totalReach += parseInt(obj.reach_eyeballs_monthly.replaceAll(',', ''));
                    }
                    if(!isNaN(obj.full_publish_rate_1_month.replaceAll(',', ''))){
                        totalRate += parseFloat(obj.full_publish_rate_1_month.replaceAll(',', ''));
                    }
                    if(!isNaN(obj.no_of_screens.replaceAll(',', ''))){
                        totalScreens += parseInt(obj.no_of_screens.replaceAll(',', ''));
                    }
                    
            
                
                for(let j=0; j<unique.length; j++){
                    unique_cost[j] = 0;
                    for(let i = 0; i < vrItem.length; i++) {
                    let obj = vrItem[i];
                    
                    if(obj.media_platform == unique[j]){
                        var cost1 = obj.full_publish_rate_1_month.replaceAll('-', '0');
                        var fcost = cost1.replaceAll(',', '')
                        unique_cost[j] += parseInt(fcost);
                    }
            
                    }
                }
            
                    
                    document.getElementById("quotation_title").innerHTML = 'RM'+abbrNum(totalRate,1);
            
                    // document.getElementById("impressions_title").innerHTML = abbrNum(totalReach,1);
            
                    document.getElementById("total_screens_title").innerHTML = abbrNum(totalScreens,2);
                    
                    document.getElementById("min_exposure_title").innerHTML = abbrNum(totalMinExposures,2);
                    
                    document.getElementById("traffic_title").innerHTML = abbrNum(totalTraffic,2);
                    
                    document.getElementById("reach_title").innerHTML = abbrNum(totalReach,2);
            
                    // document.getElementById("total_venue_type").innerHTML = abbrNum(rData.data.length,1);
            
                    // document.getElementById("cpm_average").innerHTML = 'RM'+abbrNum(cpm_average,1);
              }
    }
    });
    // if (value == "") {
    //   document.getElementById("txtHint").innerHTML = "";
    //   return;
    // }

    // alert(sql);
    // const xhttp = new XMLHttpRequest();

    //Prevents an issue where previous requests get stuck and new ones then fail
//   if (xhttp === null) {
//       console.log("xhhtp null");
//       xhttp = new XMLHttpRequest();
//   } else {
//       console.log("xhhtp abort");
//       xhttp.abort();
//   }
//     xhttp.onload = function() {
//         console.log("111");
//     var emptyArray = '{"data":[]}';
//     window.sessionStorage.removeItem("vr_item_saved");
//     window.sessionStorage.removeItem("vr_item_takeout");
//     window.sessionStorage.setItem("vr_item_saved", this.response);
//     window.sessionStorage.setItem("vr_item_takeout", emptyArray);
//     console.log("222");
//     let vrData = window.sessionStorage.getItem("vr_item_saved");
//     try {
//       var rData = JSON.parse(vrData);
//     } catch (e) {
//         alert("No data matches your query.");
//     }
    
    
//     var rDataTakeout = JSON.parse(emptyArray);
//     if(rData.length<1){
//         alert("No data matches your query.");
//     }
//     else{
//                 var vrItem = rData.data;
//                 var totalMinExposures = 0;
//                 var totalReach = 0;
//                 var totalRate = 0;
//                 var totalScreens = 0;
//                 var totalTraffic = 0;
                
//                 const unique = [...new Set(vrItem.map(item => item.media_platform))];;
//                 var unique_cost = [];
                
            
//                 for(let i = 0; i < vrItem.length; i++) {
//                     let obj = vrItem[i];
            
//                     if(!isNaN(obj.full_spot_min_exposures.replaceAll(',', ''))){
//                         totalMinExposures += parseInt(obj.full_spot_min_exposures.replaceAll(',', ''));
//                     }
//                     if(!isNaN(obj.traffic_vehicles_monthly.replaceAll(',', ''))){
//                         totalTraffic += parseInt(obj.traffic_vehicles_monthly.replaceAll(',', ''));
//                     }
//                     if(!isNaN(obj.reach_eyeballs_monthly.replaceAll(',', ''))){
//                         totalReach += parseInt(obj.reach_eyeballs_monthly.replaceAll(',', ''));
//                     }
//                     if(!isNaN(obj.full_publish_rate_1_month.replaceAll(',', ''))){
//                         totalRate += parseFloat(obj.full_publish_rate_1_month.replaceAll(',', ''));
//                     }
//                     if(!isNaN(obj.no_of_screens.replaceAll(',', ''))){
//                         totalScreens += parseInt(obj.no_of_screens.replaceAll(',', ''));
//                     }
                    
            
                
//                 for(let j=0; j<unique.length; j++){
//                     unique_cost[j] = 0;
//                     for(let i = 0; i < vrItem.length; i++) {
//                     let obj = vrItem[i];
                    
//                     if(obj.media_platform == unique[j]){
//                         var cost1 = obj.full_publish_rate_1_month.replaceAll('-', '0');
//                         var fcost = cost1.replaceAll(',', '')
//                         unique_cost[j] += parseInt(fcost);
//                     }
            
//                     }
//                 }
            
                    
//                     document.getElementById("quotation_title").innerHTML = 'RM'+abbrNum(totalRate,1);
            
//                     // document.getElementById("impressions_title").innerHTML = abbrNum(totalReach,1);
            
//                     document.getElementById("total_screens_title").innerHTML = abbrNum(totalScreens,2);
                    
//                     document.getElementById("min_exposure_title").innerHTML = abbrNum(totalMinExposures,2);
                    
//                     document.getElementById("traffic_title").innerHTML = abbrNum(totalTraffic,2);
                    
//                     document.getElementById("reach_title").innerHTML = abbrNum(totalReach,2);
            
//                     // document.getElementById("total_venue_type").innerHTML = abbrNum(rData.data.length,1);
            
//                     // document.getElementById("cpm_average").innerHTML = 'RM'+abbrNum(cpm_average,1);
//               }
//     }
//     };
//     xhttp.onreadystatechange = function() {
//         console.log("readystate - "+this.readyState);
//         console.log("status - "+this.status);
//         console.log("responsetext - "+this.responseText);
        
    
//   };
  
//     xhttp.open("GET", sql,true);
    // xhttp.send();
    
    
  
}
  
function getQuotation() {
    initMap();
    var filters = 0;
    var quote_query = "";
    
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
        quote_query += "&media_platform="+eMediaPlatformValue;
    }

    if(eSiteCodeValue.length!==0){
        filters +=1;
        sql += "&site_code="+eSiteCodeValue;
        quote_query += "&site_code="+eSiteCodeValue;
    }
    
     if(eTotalScreenSizeValue.length!==0){
         filters +=1;
        sql += "&total_screen_size="+eTotalScreenSizeValue;
        quote_query += "&total_screen_size="+eTotalScreenSizeValue;
    }
    
    if(eStateNameValue.length!==0){
        filters +=1;
        sql += "&state_name="+eStateNameValue;
        quote_query += "&state_name="+eStateNameValue;
    }
    
    if(eDistrictValue.length!==0){
        filters +=1;
        sql += "&district="+eDistrictValue;
        quote_query += "&district="+eDistrictValue;
    }
    
    if(eRoadSiteValue.length!==0){
        filters +=1;
        sql += "&road_site="+eRoadSiteValue;
        quote_query += "&road_site="+eRoadSiteValue;
    }
    
    if(eOrientationValue !== ""){
        filters +=1;
        sql += "&orientation="+eOrientationValue;
        quote_query += "&orientation="+eOrientationValue;
    }
    
    if(eLocation1Value !== ""){
        filters +=1;
        sql += "&location1="+eLocation1Value;
        quote_query += "&location1="+eLocation1Value;
    }
    
    if(eLocation2Value !== ""){
        filters +=1;
        sql += "&location2="+eLocation2Value;
        quote_query += "&location2="+eLocation2Value;
    }
    
    if(ePcValue !== ""){
        filters +=1;
        sql += "&pc="+ePcValue;
        quote_query += "&pc="+ePcValue;
    }
    
    if(eDwellTimeValue !== ""){
        filters +=1;
        sql += "&dwell_time="+eDwellTimeValue;
        quote_query += "&dwell_time="+eDwellTimeValue;
    }
    
    if(eAngleOfViewValue !== ""){
        filters +=1;
        sql += "&angle_of_view="+eAngleOfViewValue;
        quote_query += "&angle_of_view="+eAngleOfViewValue;
    }
    
    if(eBoardViewingDistanceValue !== ""){
        filters +=1;
        sql += "&board_viewing_distance="+eBoardViewingDistanceValue;
        quote_query += "&board_viewing_distance="+eBoardViewingDistanceValue;
    }
    
    if(eCompetingScreensValue !== ""){
        filters +=1;
        sql += "&competing_screens="+eCompetingScreensValue;
        quote_query += "&competing_screens="+eCompetingScreensValue;
    }
    
    sql += "&filters="+filters;
    quote_query += "&filters="+filters;
    
    window.sessionStorage.setItem("vr_quote_query", quote_query);
    
    // if (value == "") {
    //   document.getElementById("txtHint").innerHTML = "";
    //   return;
    // }

    // alert(sql);
    // const xhttp = new XMLHttpRequest();
    
     axios.get(sql).then(function (response) {
        console.log("from axiossssss");
        console.log(response.data);
        var emptyArray = '{"data":[]}';
        window.sessionStorage.removeItem("vr_item_saved");
        window.sessionStorage.removeItem("vr_item_takeout");
        window.sessionStorage.setItem("vr_item_saved", JSON.stringify(response.data));
        window.sessionStorage.setItem("vr_item_takeout", emptyArray);
        console.log("222");
        let vrData = window.sessionStorage.getItem("vr_item_saved");
        try {
        // alert(vrData);
        if(vrData == "Oops! Something went wrong. Please try again later."){
             alert("No data matches your query.");
        }
        else{
            var rData = JSON.parse(vrData);
               if(rData.result === 0){
                   alert("No data matches your query.");
               }
               else{
                   var rDataTakeout = JSON.parse(emptyArray);
                    if(rData.length<1){
                        alert("No data matches your query.");
                    }
                    else{
                        console.log("createtable");
                        createTable(rData.data,rDataTakeout.data);
                    }
               }
        }
       
    } catch (e) {
        alert("No data matches your query.");
    }
        
        
        
    });

    //Prevents an issue where previous requests get stuck and new ones then fail
//   if (xhttp === null) {
//       console.log("xhhtp null");
//       xhttp = new XMLHttpRequest();
//   } else {
//       console.log("xhhtp abort");
//       xhttp.abort();
//   }
//     xhttp.onload = function() {
//         console.log("111");
//     var emptyArray = '{"data":[]}';
//     window.sessionStorage.removeItem("vr_item_saved");
//     window.sessionStorage.removeItem("vr_item_takeout");
//     window.sessionStorage.setItem("vr_item_saved", this.response);
//     window.sessionStorage.setItem("vr_item_takeout", emptyArray);
//     console.log("222");
//     let vrData = window.sessionStorage.getItem("vr_item_saved");
//     try {
//       var rData = JSON.parse(vrData);
//     } catch (e) {
//         alert("No data matches your query.");
//     }
    
    
//     var rDataTakeout = JSON.parse(emptyArray);
//     if(rData.length<1){
//         alert("No data matches your query.");
//     }
//     else{
//         console.log("createtable");
//         createTable(rData.data,rDataTakeout.data);
//     }
//     };
//     xhttp.onreadystatechange = function() {
//         console.log("readystate - "+this.readyState);
//         console.log("status - "+this.status);
//         console.log("responsetext - "+this.responseText);
        
    
//   };
  
//     xhttp.open("GET", sql,true);
    // xhttp.send();
  }

function abbrNum(number, decPlaces) {
    // 2 decimal places => 100, 3 => 1000, etc
    decPlaces = Math.pow(10,decPlaces);

    // Enumerate number abbreviations
    var abbrev = [ "K", "M", "B", "T" ];

    // Go through the array backwards, so we do the largest first
    for (var i=abbrev.length-1; i>=0; i--) {

        // Convert array index to "1000", "1000000", etc
        var size = Math.pow(10,(i+1)*3);

        // If the number is bigger or equal do the abbreviation
        if(size <= number) {
             // Here, we multiply by decPlaces, round, and then divide by decPlaces.
             // This gives us nice rounding to a particular decimal place.
             number = Math.round(number*decPlaces/size)/decPlaces;

             // Handle special case where we round up to the next abbreviation
             if((number == 1000) && (i < abbrev.length - 1)) {
                 number = 1;
                 i++;
             }

             // Add the letter for the abbreviation
             number += abbrev[i];

             // We are done... stop
             break;
        }
    }

    return number;
}

function itemToTakeout(sitecode_value){
    let vrData = window.sessionStorage.getItem("vr_item_saved");
    let rData = JSON.parse(vrData);
    let vrDataTakeout = window.sessionStorage.getItem("vr_item_takeout");
    let rDataTakeout = JSON.parse(vrDataTakeout);
    
    let takeoutResult = rData.data.find((e) => e.site_code == sitecode_value);
    
    
    let vrItemNew = rData.data.filter(obj => {
          return obj.site_code !== sitecode_value
        })
        
    rDataTakeout.data.push(takeoutResult);
    
    window.sessionStorage.setItem("vr_item_saved", JSON.stringify(vrItemNew));
    window.sessionStorage.setItem("vr_item_takeout", JSON.stringify(rDataTakeout));
    
    createTable(vrItemNew,rDataTakeout.data);
    
}

function takeoutToItem(sitecode_value){
    let vrData = window.sessionStorage.getItem("vr_item_saved");
    let rData = JSON.parse(vrData);
    let vrDataTakeout = window.sessionStorage.getItem("vr_item_takeout");
    let rDataTakeout = JSON.parse(vrDataTakeout);
    
    let takeoutResult = rDataTakeout.data.find((e) => e.site_code == sitecode_value);
    
    
    let vrItemNew = rDataTakeout.data.filter(obj => {
          return obj.site_code !== sitecode_value
        })
        
    rData.push(takeoutResult);
    
    window.sessionStorage.setItem("vr_item_saved", JSON.stringify(rData));
    window.sessionStorage.setItem("vr_item_takeout", JSON.stringify(vrItemNew));
    
    createTable(rData,vrItemNew);
    
}


function createTable(vrItem,vrItemTakeout){
    
    var quoteTable = '<table class="table table-bordered" id="example1" >'+
                        '<thead>'+
                                '<tr style="background-color:#FCF9FA">'+
                                    '<th class="wd-1" >&nbsp;</th>'+
                                    '<th class="wd-1" >No</th>'+
                                    '<th>Media Platform</th>'+
                                    '<th>Site Code</th>'+
                                    '<th>State</th>'+
                                    '<th>Location</th>'+
                                    '<th>No of Screens</th>'+
                                    '<th>Height</th>'+
                                    '<th>Width</th>'+
                                    '<th>Total Sq Feet</th>'+
                                    '<th>Min Exposures Per Day</th>'+
                                    '<th>Duration Per Ad/Slot</th>'+
                                    '<th>Traffic/Vehicles Daily</th>'+
                                    '<th>Traffic/Vehicles Monthly</th>'+
                                    '<th>Reach/Eyeballs Daily</th>'+
                                    '<th>Reach/Eyeballs Monthly</th>'+
                                    '<th>Total</th>'+
                                    '</tr></thead><tbody>';
                                    
    var takeoutTable = '<h5>Takeout Screens</h5>'+
                    '<table class="table table-bordered" id="example2">'+
                        '<thead>'+
                                '<tr>'+
                                    '<th class="wd-1" >&nbsp;</th>'+
                                    '<th class="wd-1" >No</th>'+
                                    '<th >Media Platform</th>'+
                                    '<th >Site Code</th>'+
                                    '<th >State</th>'+
                                    '<th >Location</th>'+
                                    '<th >No of Screens</th>'+
                                    '<th >Height</th>'+
                                    '<th >Width</th>'+
                                    '<th >Total Sq Feet</th>'+
                                    '<th >Min Exposures Per Day</th>'+
                                    '<th >Duration Per Ad/Slot</th>'+
                                    '<th >Traffic/Vehicles Daily</th>'+
                                    '<th >Traffic/Vehicles Monthly</th>'+
                                    '<th >Reach/Eyeballs Daily</th>'+
                                    '<th >Reach/Eyeballs Monthly</th>'+
                                    '<th >Total</th>'+
                                    '</tr></thead><tbody>';
                                    
    var smallQuoteTable = "";
    
    
    var maps_location = "";
    var totalMinExposures = 0;
    var totalReach = 0;
    var totalRate = 0;
    var totalScreens = 0;
    var totalTraffic = 0;
    
    const unique = [...new Set(vrItem.map(item => item.media_platform))];;
    var unique_cost = [];
    
    

    for(let i = 0; i < vrItem.length; i++) {
        let obj = vrItem[i];

        quoteTable += '<tr class="border-bottom">';
        quoteTable += '<td><a href="javascript:itemToTakeout(\''+obj.site_code+'\')" "><i class="fa fa-trash"></i></a></td>';
        quoteTable += '<td>'+(i+1)+'</td>';
        quoteTable += '<td>'+obj.media_platform+'</td>';
        quoteTable += '<td>'+obj.site_code+'</td>';
        quoteTable += '<td>'+obj.state+'</td>';
        quoteTable += '<td>'+obj.road_site+'</td>';
        quoteTable += '<td>'+obj.no_of_screens+'</td>';
        quoteTable += '<td>'+obj.height+'</td>';
        quoteTable += '<td>'+obj.width+'</td>';
        quoteTable += '<td>'+obj.total_screen_size+'</td>';
        quoteTable += '<td>'+obj.full_spot_min_exposures+'</td>';
        quoteTable += '<td>'+obj.duration_per_add+'</td>';
        quoteTable += '<td>'+obj.traffic_vehicles_daily+'</td>';
        quoteTable += '<td>'+obj.traffic_vehicles_monthly+'</td>';
        quoteTable += '<td>'+obj.reach_eyeballs_daily+'</td>';
        quoteTable += '<td>'+obj.reach_eyeballs_monthly+'</td>';
        quoteTable += '<td>'+obj.full_publish_rate_1_month+'</td>';
        quoteTable += '</tr>';

        if(!isNaN(obj.full_spot_min_exposures.replaceAll(',', ''))){
            totalMinExposures += parseInt(obj.full_spot_min_exposures.replaceAll(',', ''));
        }
        if(!isNaN(obj.traffic_vehicles_monthly.replaceAll(',', ''))){
            totalTraffic += parseInt(obj.traffic_vehicles_monthly.replaceAll(',', ''));
        }
        if(!isNaN(obj.reach_eyeballs_monthly.replaceAll(',', ''))){
            totalReach += parseInt(obj.reach_eyeballs_monthly.replaceAll(',', ''));
        }
        if(!isNaN(obj.full_publish_rate_1_month.replaceAll(',', ''))){
            totalRate += parseFloat(obj.full_publish_rate_1_month.replaceAll(',', ''));
        }
        if(!isNaN(obj.no_of_screens.replaceAll(',', ''))){
            totalScreens += parseInt(obj.no_of_screens.replaceAll(',', ''));
        }
        
        
        // totalMinExposures += parseInt(obj.full_spot_min_exposures.replaceAll(',', ''));
        // totalTraffic += parseInt(obj.traffic_vehicles_monthly.replaceAll(',', ''));
        // totalReach += parseInt(obj.reach_eyeballs_monthly.replaceAll(',', ''));
        // totalRate += parseFloat(obj.full_publish_rate_1_month.replaceAll(',', ''));
        // totalScreens += parseInt(obj.no_of_screens.replaceAll(',', ''));

        var filename = "assets/img/billboards/"+obj.site_code.replaceAll(' ', '')+".png";
        // var imagefile = new File([""],filename);
        // console.log(imagefile);
        // var srcname = "";
        // if(imagefile.exists()){
        //     srcname = filename;
        // }
        // else{
        //     srcname = "assets/img/billboards/no_img.jpg";
        // }
        
        // console.log(srcname);

        //Maps locations
        maps_location  += '<div class="custom-card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);transition: 0.3s;border-radius: 5px; /">';
        maps_location  += '<div class="card-body p-3">';
        maps_location  += '<div class="row g-0 blog-list">';
        maps_location  += '<div class="col-xl-5 col-lg-12 col-md-12"  style="padding:0 !important;">';
        maps_location  += '<div class="card-body p-0">';
        maps_location  += '<div class="item-card-img">';
        maps_location  += '<a data-bs-target="#modaldemo6" data-bs-toggle="modal" href="" style="color:black">';
        maps_location  += '<img style="object-fit: cover;height:180px;padding-left:10px" src="'+filename+'" alt="no image" onerror="javascript:this.src=\'assets/img/billboards/no_img.jpg\'" loading="lazy">';
        // maps_location  += '<img style="object-fit: cover;height:180px" src="assets/img/billboards/no_img.jpg" alt="">';
        maps_location  += '</a></div></div></div>';
																
        maps_location  += '<div class="col-xl-7 col-lg-12 col-md-12">';
        maps_location  += '<div class="card-body p-2">';
        maps_location  += '<a data-bs-target="#modaldemo6" data-bs-toggle="modal" href="" style="color:black"><h5 class="font-weight-semibold mt-3">'+obj.media_platform+'('+obj.site_code+')</h5></a>';
        maps_location  += '<h6 class="font-weight-semibold mt-3">'+obj.road_site+'</h6>';
        maps_location  += '<p class=""></p>';
        maps_location  += '<div class="item-card-desc d-flex">';
        maps_location  += '<div class="main-contact-body">';
        maps_location  += '<img src="assets/img/icons/view.png" style="width:25px"/><br><span>'+obj.reach_eyeballs_monthly+'</span>';
        maps_location  += '</div>';
        maps_location  += '<div class="main-contact-body">';
        maps_location  += '<img src="assets/img/icons/scale-up.png" style="width:25px"/><br><span>'+obj.total_screen_size+'</span>';
        maps_location  += '</div>';
        maps_location  += '<div class="main-contact-body">';
        maps_location  += '<img src="assets/img/icons/compass.png" style="width:25px"/><br><span>'+obj.state+'</span>';
        maps_location  += '</div>';
        maps_location  += '<div class="main-contact-body">';
        maps_location  += '<img src="assets/img/icons/seen.png" style="width:25px"/><br><span style="color:green">Available</span>';
        maps_location  += '</div></div>';
        maps_location  += '<div class="col-xl-12 col-lg-12 col-md-12">';
        maps_location  += '<button class="btn ripple btn-block btn-1" style="color:white"><i class="fe fe-plus"></i>&nbsp;Add Sign</button>';
        maps_location  += '</div></div></div></div></div></div>';

        

    }
    
    for(let k = 0; k < vrItemTakeout.length; k++) {
        let obj = vrItemTakeout[k];

        takeoutTable += '<tr class="border-bottom">';
        takeoutTable += '<td><a href="javascript:takeoutToItem(\''+obj.site_code+'\')" "><i class="fa fa-save"></i></a></td>';
        takeoutTable += '<td>'+(k+1)+'</td>';
        takeoutTable += '<td>'+obj.media_platform+'</td>';
        takeoutTable += '<td>'+obj.site_code+'</td>';
        takeoutTable += '<td>'+obj.state+'</td>';
        takeoutTable += '<td>'+obj.road_site+'</td>';
        takeoutTable += '<td>'+obj.no_of_screens+'</td>';
        takeoutTable += '<td>'+obj.height+'</td>';
        takeoutTable += '<td>'+obj.width+'</td>';
        takeoutTable += '<td>'+obj.total_screen_size+'</td>';
        takeoutTable += '<td>'+obj.full_spot_min_exposures+'</td>';
        takeoutTable += '<td>'+obj.duration_per_add+'</td>';
        takeoutTable += '<td>'+obj.traffic_vehicles_daily+'</td>';
        takeoutTable += '<td>'+obj.traffic_vehicles_monthly+'</td>';
        takeoutTable += '<td>'+obj.reach_eyeballs_daily+'</td>';
        takeoutTable += '<td>'+obj.reach_eyeballs_monthly+'</td>';
        takeoutTable += '<td>'+obj.full_publish_rate_1_month+'</td>';
        takeoutTable += '</tr>';

    }

    document.getElementById("map_locations").innerHTML = maps_location;
    
    for(let j=0; j<unique.length; j++){
        unique_cost[j] = 0;
        for(let i = 0; i < vrItem.length; i++) {
        let obj = vrItem[i];
        
        if(obj.media_platform == unique[j]){
            var cost1 = obj.full_publish_rate_1_month.replaceAll('-', '0');
            var fcost = cost1.replaceAll(',', '')
            unique_cost[j] += parseInt(fcost);
        }

        }
    }

        // quoteTable += '<tr class="border-bottom">';
        // quoteTable += '<td colspan="4"><b>Total</b></td>';
        // quoteTable += '<td></td>';
        // quoteTable += '<td></td>';
        // quoteTable += '<td></td>';
        // quoteTable += '<td><b>'+totalMinExposures+'</b></td>';
        // quoteTable += '<td><b>'+totalReach+'</b></td>';
        // quoteTable += '<td><b>'+totalRate.toFixed(2)+'</b></td>';
        // quoteTable += '</tr>';
        // quoteTable += '</tbody></table>';

        document.getElementById("quotation_table").innerHTML = quoteTable;
        document.getElementById("takeout_quotation_table").innerHTML = takeoutTable;


        smallQuoteTable += '<table class="table table-bordered" id="example3">';

        for(let j=0; j<unique.length; j++){
            smallQuoteTable += '<tr >';
            smallQuoteTable += '<td style="background-color:#3FA9F5;color:white">'+unique[j]+'</td>';
            smallQuoteTable += '<td style="text-align: end;">'+unique_cost[j].toFixed(2)+'</td>';
            smallQuoteTable += '</tr>';
        }
        smallQuoteTable += '</table>';
        
        // smallQuoteTable += '<tr >';
        // smallQuoteTable += '<td style="background-color:#3FA9F5;color:white">Project Cost</td>';
        // smallQuoteTable += '<td style="text-align: end;">'+totalRate.toFixed(2)+'</td>';
        // smallQuoteTable += '</tr>';

        // smallQuoteTable += '<tr >';
        // smallQuoteTable += '<td style="background-color:#3FA9F5;color:white">Discounted Rate</td>';
        // smallQuoteTable += '<td style="text-align: end;">0</td>';
        // smallQuoteTable += '</tr>';

        // smallQuoteTable += '<tr >';
        // smallQuoteTable += '<td style="background-color:#3FA9F5;color:white">Project Cost</td>';
        // smallQuoteTable += '<td style="text-align: end;">80%</td>';
        // smallQuoteTable += '</tr>';

        // smallQuoteTable += '<tr >';
        // smallQuoteTable += '<td style="background-color:#3FA9F5;color:white">Insights (pre & Post) - 2 Campaigns</td>';
        // smallQuoteTable += '<td style="text-align: end;">Included in the package</td>';
        // smallQuoteTable += '</tr>';

        // smallQuoteTable += '<tr >';
        // smallQuoteTable += '<td style="background-color:#3FA9F5;color:white">Content development adn adaptation</td>';
        // smallQuoteTable += '<td style="text-align: end;">0</td>';
        // smallQuoteTable += '</tr></table>';


        // var cpm_average = totalRate/rData.data.length;
        document.getElementById("small_quotation_table").innerHTML = smallQuoteTable;
        
        document.getElementById("quotation_title").innerHTML = 'RM'+abbrNum(totalRate,1);

        // document.getElementById("impressions_title").innerHTML = abbrNum(totalReach,1);

        document.getElementById("total_screens_title").innerHTML = abbrNum(totalScreens,2);
        
        document.getElementById("min_exposure_title").innerHTML = abbrNum(totalMinExposures,2);
        
        document.getElementById("traffic_title").innerHTML = abbrNum(totalTraffic,2);
        
        document.getElementById("reach_title").innerHTML = abbrNum(totalReach,2);

        // document.getElementById("total_venue_type").innerHTML = abbrNum(rData.data.length,1);

        // document.getElementById("cpm_average").innerHTML = 'RM'+abbrNum(cpm_average,1);

        
        var groupColumn = 2;
        $('#example1').DataTable( {
            paging: false,
            searching: false,
            columnDefs: [{ visible: false, targets: groupColumn }],
            order: [[groupColumn, 'asc']],
            displayLength: 25,
            drawCallback: function (settings) {
                var api = this.api();
                var rows = api.rows({ page: 'current' }).nodes();
                var last = null;
         
                api.column(groupColumn, { page: 'current' })
                    .data()
                    .each(function (group, i) {
                        if (last !== group) {
                            $(rows)
                                .eq(i)
                                .before(
                                    '<tr class="group"><td colspan="16">' +
                                        group +
                                        '</td></tr>'
                                );
         
                            last = group;
                        }
                    });
            }
                } );
                
                
            $('#example2').DataTable( {
            paging: false,
            searching: false,
            columnDefs: [{ visible: false, targets: groupColumn }],
            order: [[groupColumn, 'asc']],
            displayLength: 25,
            drawCallback: function (settings) {
                var api = this.api();
                var rows = api.rows({ page: 'current' }).nodes();
                var last = null;
         
                api.column(groupColumn, { page: 'current' })
                    .data()
                    .each(function (group, i) {
                        if (last !== group) {
                            $(rows)
                                .eq(i)
                                .before(
                                    '<tr class="group"><td colspan="16">' +
                                        group +
                                        '</td></tr>'
                                );
         
                            last = group;
                        }
                    });
            }
                } );
}


function callAndRefresh(){
    setMediaPlatform();
    setTimeout(() => {
        getQuotation();
        console.log('Hello, World!');
    }, 1000);
    
}


function save_quotation(){
    
    var email = window.sessionStorage.getItem("vr_email");
    
    var quote_query = window.sessionStorage.getItem("vr_quote_query");
    
    var eClientName = document.getElementById("client_name");
    var eClientNameValue = eClientName.value;
    var eCampaignName = document.getElementById("campaign_name");
    var eCampaignNameValue = eCampaignName.value;
    var eDuration = document.getElementById("duration");
    var eDurationValue = eDuration.value;
    
    //  var sql = "api/save_quotation.php?email="+email+"&quote_query="+quote_query+"&client_name="+eClientNameValue+"&campaign_name="+eCampaignNameValue+"&duration="+eDurationValue;
     var sql = "api/save_quotation.php";
    //  alert(sql);
    
    axios.post(sql,{
    email: email,
    quote_query: quote_query,
    client_name: eClientNameValue,
    campaign_name: eCampaignNameValue,
    duration: eDurationValue
  },{
    headers: {
      'Content-Type': 'multipart/form-data'
    }
  }).then(function (response) {
        console.log("from axiossssss");
        console.log(response);
        if(reponse.data.result == 1){
            alert("Quotation is saved");
        }
        else{
            alert("An error has occured");
        }
        
    });
}