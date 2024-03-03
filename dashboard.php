<?php
require_once "api/config.php";
session_start();
if(!isset($_SESSION['vr_email']) && empty($_SESSION['vr_email'])) {
	echo "<script>";
	//echo "alert('Welcome!');";
	echo "window.location = ' index.html'"; // redirect with javascript, after page loads
	echo "</script>";
 }
 else{
     echo "<script>";
     echo "window.sessionStorage.setItem('vr_email','".$_SESSION['vr_email']."');";
     echo "</script>";
 }
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="Play/Dooh -  Admin Panel HTML Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin,dashboard,panel,bootstrap admin template,bootstrap dashboard,dashboard,themeforest admin dashboard,themeforest admin,themeforest dashboard,themeforest admin panel,themeforest admin template,themeforest admin dashboard,cool admin,it dashboard,admin design,dash templates,saas dashboard,dmin ui design">

		<!-- Favicon -->
		<link rel="icon" href="assets/img/playdooh_logo.png" type="image/x-icon"/>

		<!-- Title -->
		<title>Play/Dooh</title>

		<!-- Bootstrap css-->
		<link  id="style" href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
		
		<!-- Icons css-->
		<link href="assets/plugins/web-fonts/icons.css" rel="stylesheet"/>
		<link href="assets/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
		<link href="assets/plugins/web-fonts/plugin.css" rel="stylesheet"/>
		
		<!-- DATA TABLE CSS -->
		<!--<link href="assets/plugins/datatable/css/dataTables.bootstrap5.css" rel="stylesheet" />-->
		<!--<link href="assets/plugins/datatable/css/buttons.bootstrap5.min.css"  rel="stylesheet">-->
		<!--<link href="assets/plugins/datatable/css/responsive.bootstrap5.css" rel="stylesheet" />-->
			
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

		<!-- Style css-->
		<link href="assets/css/style.css" rel="stylesheet">

		<!-- Select2 css-->
		<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet">

		<!-- Mutipleselect css-->
		<link rel="stylesheet" href="assets/plugins/multipleselect/multiple-select.css">

		<!-- Internal Morrirs Chart css-->
		<link href="assets/plugins/morris.js/morris.css" rel="stylesheet">
		
		<!--<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>-->
		<script src="quotation_features.js"></script>

		<style>
		@font-face {
                font-family: Montserrat;
                src: url(assets/font/Montserrat/Montserrat-Regular.ttf);
            }
            html * {
              font-family: Montserrat;
            }
			.scroll-div{
				padding:5px;
				margin:5px;
				overflow-y: auto;
				overflow-x: hidden;
				text-align:justify;
				height:500px;
				}
			.btn-1 {
			/*background-image: linear-gradient(to right, #34F5C5 0%, #2FBED0 51%, #3FA9F5 100%);*/
			background-image: url("assets/img/playdooh_btn.png");
			 background-size: cover;
			 background-position: center;
            background-repeat: no-repeat;
			border: none;
			}
			.leftbox {
                float:left;
                width:33%;
            }
            .middlebox{
                float:left;
                width:33%;
            }
            .rightbox{
                float:right;
                width:33%;
            }
            /* 
             * Always set the map height explicitly to define the size of the div element
             * that contains the map. 
             */
            #map {
              height: 100%;
              width: 100%;
            }
		  </style>

	</head>

	<body class="ltr main-body leftmenu">

		<!-- Loader -->
		<div id="global-loader">
			<img src="assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- End Loader -->

		<!-- Page -->
		<div class="page" style="background-color:#FCF9FA">

		<!-- Main Header-->
		<div class="main-header sticky">
			<div class="main-container container-fluid">
				<div class="main-header-left" style=" display: flex;align-items: left;">
					<a href="index.html"><img src="assets/img/playdooh_logo.png" class="mobile-logo" alt="logo" style="height:50px"></a>
				</div>
				<div class="main-header-center">
					
					
				</div>
				<div class="main-header-right">
					<button class="navbar-toggler navresponsive-toggler" type="button" data-bs-toggle="collapse"
						data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
						aria-expanded="false" aria-label="Toggle navigation">
						<i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
					</button><!-- Navresponsive closed -->
					
					<div class="navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
						<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
							<div class="d-flex order-lg-2 ms-auto">
								<div class="main-header-notification">
									<a class="nav-link" href="campaign.php" style="font-size: small;">
										<i class="fe fe-grid header-icons"></i>
										Campaigns
									</a>
								</div>
								<div class="main-header-notification">
									<a class="nav-link" href="" style="font-size: small;">
										<i class="fe fe-monitor header-icons"></i>
										Account Settings
									</a>
								</div>
								<div class="main-header-notification">
									<a class="nav-link" href="index.html" style="font-size: small;">
										<i class="fe fe-user header-icons"></i>
										Logout
									</a>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Main Header-->

			<!-- Main Content-->
			<div class="main-content pt-0">

				<div class="main-container container-fluid">
					<div class="inner-body">

						<!-- Page Header -->
						<div class="page-header">
							<!-- Row -->
											
							<div class="col-lg-1 col-md-1">
								&nbsp;
							</div>
							<div class="col-lg-10 col-md-10">
								<div class="card custom-card">
									<div class="card-body">
										<div class="row row-sm">
											<div class="col-md-1">
												<a class="btn ripple" style="color:white;background-color:#983E97" onclick="save_quotation()">Save</a>
											</div>
											<div class="col-md-3">
												<input class="form-control" placeholder="Client Name" type="text" id="client_name" name="client_name">
											</div>
											<div class="col-md-3">
												<input class="form-control" placeholder="Campaign Name" type="text" id="campaign_name" name="campaign_name">
											</div>
											<div class="col-md-3">
												<!--<input class="form-control" placeholder="Duration" type="text">-->
												<select name="duration" id="duration" placeholder="Duration" class="form-control select2">
																<option value="">Default Select</option>
																<option value="1 week">1 week</option>
																<option value="2 weeks">2 weeks</option>
																<option value="1 month">1 month</option>
																<option value="2 months">3 months</option>
																<option value="6 moths">6 months</option>
																<option value="12 months">12 months</option>
																
															</select>
											</div>
											<div class="col-lg">
												<!--<button class="btn ripple btn-1" style="color:white">Share</button>-->
												<img src="assets/img/icons/share2.png" width="25px" style="color:orange;padding-top:5px"/>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-1 col-md-1">
								&nbsp;
							</div>
						
						<!-- End Row -->

						</div>
						<!-- End Page Header -->

						<!-- row -->
						
						<div class="row row-sm">
							<div style="width:12%">
								&nbsp;
							</div>
							<div class="col-lg-6 col-xl-6 col-xxl-6 col-md-6 col-6" >
								<h4 class="text-center tx-15">Key Metrics</h4>
								<div id="key_metrics_box" class="card custom-card text-center" style="background-color: #36454F;color:white">
									<div class="card-body pb-3">
										<div class="d-flex">
											<div class="">
												<h4 class="mb-2" id="total_screens_title">0</h4>
												<div class="d-flex tx-12">Total Screens No</div>
											</div>
											<div style="width:5%;"></div>
											<div class="">
												<h4 class="mb-2" id="average_sqfeet_title">0</h4>
												<div class="d-flex tx-12">Avg SqFeet</div>
											</div>
											<div style="width:5%;"></div>
											<div class="">
												<h4 class="mb-2" id="total_sqfeet_title">0</h4>
												<div class="d-flex tx-12">Total SqFeet</div>
											</div>
											<div style="width:5%;"></div>
											<div class="">
												<h4 class="mb-2" id="min_exposure_title">0</h4>
												<div class="d-flex tx-12">Min Exposures/Day</div>
											</div>
											<div style="width:5%;"></div>
											<div class="">
												<h4 class="mb-2" id="traffic_title">0</h4>
												<div class="d-flex tx-12">Traffic/ Vehicles</div>
											</div>
											<div style="width:5%;"></div>
											<div class="">
												<h4 class="mb-2" id="reach_title">0</h4>
												<div class="d-flex tx-12">Reach/ Eyeballs</div>
											</div>
											<div style="width:5%;"></div>
											<!-- <a aria-controls="collapseExample" aria-expanded="false" data-bs-toggle="collapse" href="#collapseExample" style="color:white" onclick="openKeyMetricsBox()"> -->
											
											<a href="#" style="color:white;" onclick="openKeyMetricsBox()">
												<div class="">
													<h6 class="tx-15" id="total_venue_type">Details</h6>
													<div class="tx-12" style="text-align: center;">
														<i id="key_metrics_box_carret" class="fas fa-caret-down ms-1"></i>
													</div>
												</div>
											</a>

											<!-- <a href="#" style="color:white" onclick="openKeyMetricsBox()">
												<div>
													<h6 class="tx-15">Details</h6>
													<div class="text-center">
														<i id="key_metrics_box_carret" class="fas fa-caret-down ms-1"></i>
													</div>
												</div>
											</a> -->
											
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-xl-2 col-xxl-2 col-md-2 col-12">
								<h4 class="tx-15 text-center">Quotation</h4>
								<div id="quotation_box" class="card custom-card text-center" style="background-color: #36454F;color:white">
									<div class="card-body pb-3">
										
										<div class="d-flex">
											<div class="">
												<h4 class="mb-2" id="quotation_title">RM0</h4>
												<div class="d-flex tx-12"> Total</div>
												<div class="d-flex tx-12"> &nbsp;</div>
												
											</div>
											<div style="width:40%;"></div>
											<!-- <a aria-controls="collapse2" aria-expanded="false" data-bs-toggle="collapse" href="#collapse2" style="color:white" onclick="openQuotationBox()"> -->
											<a href="#" style="color:white" onclick="openQuotationBox()">
												<div>
													<h6 class="tx-15">Details</h6>
													<div class="text-center"><i id="quotation_box_carret" class="fas fa-caret-down ms-1"></i></div>
												</div>
											</a>
											
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-xl-1 col-xxl-1 col-md-1 col-12">
								<h4 class="tx-15 text-center">Locations</h4>
								<div id="location_box" class="card custom-card text-center">
									<div class="card-body pb-1">
										<!-- <a aria-controls="collapse3" aria-expanded="false" data-bs-toggle="collapse" href="#collapse3" > -->
										<a href="#" onclick="openLocationBox()">
											<div class="">
												<img id="pic1" class="pic-1" alt="product-image-1" src="assets/img/icons/map2.png" style="width:50px;padding-bottom:10px">
												<div class="text-center"><i id="location_box_carret" class="fas fa-caret-down"></i></div>
											</div>
										</a>
									</div>
								</div>
							</div>
						
						</div>
						<!-- End row -->
						<div class="collapse mg-t-5" id="collapseExample">
							<div class="row row-sm">
								<!-- <div class="col-md-12 col-lg-12 col-xl-12"> -->
									<div class="card custom-card transcation-crypto">
										<div class="card-body">

											<div class="leftbox"> 
												<div>
													<h5>Reach/Eyeballs - Daily and Monthly</h5>
													<canvas id="chart_one"></canvas>
												</div>
											</div>
											<div class="middlebox"> 
												<div>
													<h5>Traffic Light</h5>
													<canvas id="chart_two"></canvas>
												</div>
											</div>
											<div class="rightbox"> 
												<div>
													<h5>Traffic/Vehicles - Daily and Monthly</h5>
													<canvas id="chart_three"></canvas>
												</div>
											</div>

										</div>
										
									</div>

								<!-- </div> -->
							</div>
							<!-- <img src="assets/img/dooh_chart.png" /> -->
						</div>
						<!-- Row -->
						<div class="collapse mg-t-5" id="collapse2">
							<div class="row row-sm">
								<div class="col-md-12 col-lg-12 col-xl-12">
									<div class="card custom-card transcation-crypto">
										
										<div class="card-body">
										    <div class="table-responsive" style="width:40%">
												<div id="small_quotation_table"></div>
											</div>
											<br><br>
											<div class="table-responsive">
												<div id="quotation_table"></div>
											</div>
											
											
											<div class="table-responsive">
												<div id="takeout_quotation_table"></div>
											</div>
											
										</div>
									</div>
									<!-- Row End -->
								</div>
							</div>
							
						</div>
						<!-- End row -->
						<div class="collapse mg-t-5" id="collapse3">
							<div class="card custom-card">
								<div class="row row-sm">
									<div class="col-xl-6 col-lg-6 col-sm-6 pe-0 ps-0 border-end">	
										<div id="map"></div>
											<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1991.880709041158!2d101.71099650800299!3d3.157485099425247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc37d12d669c1f%3A0xc955b08cfc1aae29!2sSuria%20KLCC!5e0!3m2!1sen!2smy!4v1681234604303!5m2!1sen!2smy" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
									</div>
									<div class="col-xl-6 col-lg-6 col-sm-6 pe-0 ps-0 border-end">
											<div class="scroll-div">
												<div class="col-xl-12 col-lg-12 col-md-12">
													<div id="map_locations"></div>
													<!-- <div class="card custom-card">
														<div class="card-body p-3">
															<div class="row g-0 blog-list">
																<div class="col-xl-5 col-lg-12 col-md-12"  style="padding:0 !important;">
																	<div class="card-body p-0">
																		<div class="item-card-img">
																			<a data-bs-target="#modaldemo6" data-bs-toggle="modal" href="" style="color:black">
																				<img style="object-fit: cover;height:180px" src="assets/img/billboards/board1.png" alt="">
																			</a>
																		</div>
																	</div>
																</div>
																
																	<div class="col-xl-7 col-lg-12 col-md-12">
																			<div class="card-body p-2">
																				<a data-bs-target="#modaldemo6" data-bs-toggle="modal" href="" style="color:black"><h5 class="font-weight-semibold mt-3">Jalan Damansara</h5></a>
																				<h6 class="font-weight-semibold mt-3">VR 2003</h6>
																				<p class=""></p>
																				<div class="item-card-desc d-flex">
																					<div class="main-contact-body">
																						<img src="assets/img/icons/view.png" style="width:25px"/><br><span>680.1K</span>
																					</div>
																					<div class="main-contact-body">
																						<img src="assets/img/icons/scale-up.png" style="width:25px"/><br><span>846x234</span>
																					</div>
																					<div class="main-contact-body">
																						<img src="assets/img/icons/compass.png" style="width:25px"/><br><span>North</span>
																					</div>
																					<div class="main-contact-body">
																						<img src="assets/img/icons/seen.png" style="width:25px"/><br><span style="color:green">Available</span>
																					</div>
																				</div>
																				<div class="col-xl-12 col-lg-12 col-md-12">
																					<button class="btn ripple btn-block btn-1" style="color:white"><i class="fe fe-plus"></i>&nbsp;Add Sign</button>
																				</div>
																				
																			</div>
																	
																	</div>
																
															</div>
														</div>
													</div>
													<div class="card custom-card">
														<div class="card-body p-3">
															<a data-bs-target="#modaldemo6" data-bs-toggle="modal" href="" style="color:black">
															<div class="row g-0 blog-list">
																<div class="col-xl-5 col-lg-12 col-md-12"  style="padding:0 !important;">
																	<div class="card-body p-0">
																		<div class="item-card-img">
																			<a data-bs-target="#modaldemo6" data-bs-toggle="modal" href="" style="color:black">
																				<img style="object-fit: cover;height:180px" src="assets/img/billboards/board2.png" alt="">
																			</a>
																		</div>
																	</div>
																</div>
																<div class="col-xl-7 col-lg-12 col-md-12">
																	<div class="card-body p-2">
																		<a data-bs-target="#modaldemo6" data-bs-toggle="modal" href="" style="color:black"><h5 class="font-weight-semibold mt-3">KL South, Jalan Puchong</h5></a>
																		<h6 class="font-weight-semibold mt-3">VR 2014</h6>
																		<p class=""></p>
																		<div class="item-card-desc d-flex">
																			<div class="main-contact-body">
																				<img src="assets/img/icons/view.png" style="width:25px"/><br><span>680.1K</span>
																			</div>
																			<div class="main-contact-body">
																				<img src="assets/img/icons/scale-up.png" style="width:25px"/><br><span>846x234</span>
																			</div>
																			<div class="main-contact-body">
																				<img src="assets/img/icons/compass.png" style="width:25px"/><br><span>North</span>
																			</div>
																			<div class="main-contact-body">
																				<img src="assets/img/icons/seen.png" style="width:25px"/><br><span style="color:green">Available</span>
																			</div>
																		</div>
																		<div class="col-xl-12 col-lg-12 col-md-12">
																			<button class="btn ripple btn-block btn-1" style="color:white"><i class="fe fe-plus"></i>&nbsp;Add Sign</button>
																		</div>
																		
																	</div>
																</div>
															</div>
														
														</div>
													</div>
													<div class="card custom-card">
														<div class="card-body p-3">
															
																<div class="row g-0 blog-list">
																	<div class="col-xl-5 col-lg-12 col-md-12"  style="padding:0 !important;">
																		<div class="card-body p-0">
																			<div class="item-card-img">
																				<a data-bs-target="#modaldemo6" data-bs-toggle="modal" href="" style="color:black">
																					<img style="object-fit: cover;height:180px" src="assets/img/billboards/board3.png" alt="">
																				</a>
																				
																			</div>
																		</div>
																	</div>
																	<div class="col-xl-7 col-lg-12 col-md-12" >
																		<div class="card-body p-2">
																			<a data-bs-target="#modaldemo6" data-bs-toggle="modal" href="" style="color:black"><h5 class="font-weight-semibold mt-3">Jalan Raja Laut</h5></a>
																			<h6 class="font-weight-semibold mt-3">VR 2014</h6>
																			<p class=""></p>
																			<div class="item-card-desc d-flex">
																				<div class="main-contact-body">
																					<img src="assets/img/icons/view.png" style="width:25px"/><br><span>680.1K</span>
																				</div>
																				<div class="main-contact-body">
																					<img src="assets/img/icons/scale-up.png" style="width:25px"/><br><span>846x234</span>
																				</div>
																				<div class="main-contact-body">
																					<img src="assets/img/icons/compass.png" style="width:25px"/><br><span>North</span>
																				</div>
																				<div class="main-contact-body">
																					<img src="assets/img/icons/seen.png" style="width:25px"/><br><span style="color:green">Available</span>
																				</div>
																			</div>
																			<div class="col-xl-12 col-lg-12 col-md-12">
																				<button class="btn ripple btn-block btn-1" style="color:white"><i class="fe fe-plus"></i>&nbsp;Add Sign</button>
																			</div>
																			
																		</div>
																	</div>
																</div>	
															
														</div>
													</div> -->
												</div>
											</div>
										
									</div>
									
								</div>

							</div>
							
							
						</div>
						<!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="row row-sm">
										<div class="col-xl-12 col-lg-12 col-sm-12">
											<div class="card-body">
											    <div class="row row-sm">
											        <div class="col-xl-11 col-lg-11 col-sm-11" >
    											        <h4 class="mb-0">Site Attributes</h4> 
    											    </div>
    											    <div class="col-xl-1 col-lg-1 col-sm-1">
    											        	<!--<a class="btn ripple btn-1" style="color:white" href="#" onclick="getQuotation();">Get quotation</a>-->
    											    </div>
											    </div>
											    
												
											
												<br>
												<div class="row row-sm">
													<div class="form-group col-lg-4 ">
														<span style="text-align: start;">Media Platform</span>
														<div class="form-group ">
															<select name="media_platform" id="media_platform" class="form-control select2" onchange="callAndRefresh();">
																<option value="">Default Select</option>
																<option value="indoor">Indoor</option>
																<option value="outdoor">Outdoor</option>
																
															</select>
														</div>
													</div>
													<div class="form-group col-lg-4 ">
														<span style="text-align: start;">Site code</span>
														<!-- <div class="form-group ">
															<select name="site_name" id="site_name" class="form-control select2">
																<option value="">Default Select</option>
															</select>
														</div> -->
														<select class="form-control select2 select2-hidden-accessible" name="site_code" id="site_code" multiple="" tabindex="-1" aria-hidden="true" onchange="getQuotation();">
														<?php
														
                                                            $sql = "SELECT DISTINCT(site_code) from vr_assets";
                                                            if($result = mysqli_query($link, $sql)){
                                                                if(mysqli_num_rows($result) > 0){
                                                                    while($row = mysqli_fetch_array($result)){
                                                                    
                    												echo '<option value="'.$row['site_code'].'">'.$row['site_code'].'</option>';
                    												
                                                                        }
                                
                                                                    // Free result set
                                                                    mysqli_free_result($result);
                                                                } 
                                                            } 
                                
                                                            // Close connection
                                                            // mysqli_close($link);
                                                          ?>
															<!-- <option value="VR 0101"> VR 0101 </option> 
															<option value="Chrome"> Chrome </option> 
															<option value="Safari"> Safari </option> 
															<option value="Opera"> Opera </option> 
															<option value="Internet Explorer"> Internet Explorer </option>  -->
														</select>
														<!-- <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" style="width: 100%;"> -->
														
													</div>
													<div class="form-group col-lg-4 ">
														<span style="text-align: start;">Total Screen Size</span>
														<div class="form-group ">
														<select class="form-control select2 select2-hidden-accessible" name="total_screen_size" id="total_screen_size" multiple="" tabindex="-1" aria-hidden="true" onchange="getQuotation();">
																<option value="">Default Select</option>
																<option value="b_100ft">Below 1000 sqft</option>
																<option value="a_100ft">Above 1000 sqft</option>
																
															</select>
														</div>
													</div>
												</div>
												<div class="row row-sm">
													<div class="form-group col-lg-4 ">
														<span style="text-align: start;">State</span>
														<div class="form-group ">
														<select class="form-control select2 select2-hidden-accessible" name="state_name" id="state_name" multiple="" tabindex="-1" aria-hidden="true" onchange="getQuotation();">
														<?php
                                                            $sql = "SELECT DISTINCT(state) from vr_assets ";
                                                            if($result = mysqli_query($link, $sql)){
                                                                if(mysqli_num_rows($result) > 0){
                                                                    while($row = mysqli_fetch_array($result)){
                    												echo '<option value="'.$row['state'].'">'.$row['state'].'</option>';
                                                                        }
                                
                                                                    // Free result set
                                                                    mysqli_free_result($result);
                                                                } 
                                                            }
                                                          ?>
														</select>
														</div>
													</div>
													<div class="form-group col-lg-4 ">
														<span style="text-align: start;">District</span>
														<div class="form-group ">
															<select class="form-control select2 select2-hidden-accessible" name="district" id="district" multiple="" tabindex="-1" aria-hidden="true" onchange="getQuotation();">
															<?php
																$sql = "SELECT DISTINCT(district) from vr_assets ";
																if($result = mysqli_query($link, $sql)){
																	if(mysqli_num_rows($result) > 0){
																		while($row = mysqli_fetch_array($result)){
																		echo '<option value="'.$row['district'].'">'.$row['district'].'</option>';
																			}
									
																		// Free result set
																		mysqli_free_result($result);
																	} 
																}
															?>
															</select>
														</div>
													</div>
													<div class="form-group col-lg-4 ">
														<span style="text-align: start;">Road/Site</span>
														<div class="form-group ">
															<select class="form-control select2 select2-hidden-accessible" name="road_site" id="road_site" multiple="" tabindex="-1" aria-hidden="true" onchange="getQuotation();">
																<?php
																	$sql = "SELECT DISTINCT(road_site) from vr_assets ";
																	if($result = mysqli_query($link, $sql)){
																		if(mysqli_num_rows($result) > 0){
																			while($row = mysqli_fetch_array($result)){
																			echo '<option value="'.$row['road_site'].'">'.$row['road_site'].'</option>';
																				}
										
																			// Free result set
																			mysqli_free_result($result);
																		} 
																	}
															?>
															</select>
														</div>
													</div>
												</div>
												<div class="row row-sm">
													<div class="form-group col-lg-4 ">
														<span style="text-align: start;">Orientation</span>
														<div class="form-group ">
														<select name="orientation" id="orientation" class="form-control select2" onchange="getQuotation();">
																<option value="">Default Select</option>
																<option value="Vertical">Vertical</option>
																<option value="Horizontal">Horizontal</option>
																
															</select>
														</div>
													</div>
													<div class="form-group col-lg-4 ">
														<span style="text-align: start;">Location: Urban/ Other Urban/ Rural</span>
														<div class="form-group ">
															<select name="location_1" id="location_1"  class="form-control select2" onchange="getQuotation();">
																<option value="">Default Select</option>
																<option value="Urban">Urban</option>
																<option value="Suburban">Suburban</option>
																<option value="Rural">Rural</option>
															</select>
														</div>
													</div>
													<div class="form-group col-lg-4 ">
														<span style="text-align: start;">Location: Commercial/ Arterial/ Neighbourhood</span>
														<div class="form-group ">
															<select name="location_2" id="location_2" class="form-control select2" onchange="getQuotation();">
																<option value="">Default Select</option>
																<?php
																	$sql = "SELECT DISTINCT(location_type_2) from vr_assets ORDER BY location_type_2 ASC";
																	if($result = mysqli_query($link, $sql)){
																		if(mysqli_num_rows($result) > 0){
																			while($row = mysqli_fetch_array($result)){
																			echo '<option value="'.$row['location_type_2'].'">'.$row['location_type_2'].'</option>';
																				}
										
																			// Free result set
																			mysqli_free_result($result);
																		} 
																	}
																	?>
															</select>
														</div>
													</div>
												</div>
												<div class="row row-sm">
													<div class="form-group col-lg-4 ">
														<span style="text-align: start;">PC</span>
														<div class="form-group ">
														<select name="pc" id="pc" class="form-control select2" onchange="getQuotation();">
																<option value="">Default Select</option>
																<option value="Yes">Yes</option>
																<option value="No">No</option>
																
															</select>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row row-sm">
									    <a href="#/" onclick="openImpactBox()" style="color:black"><h5 class="mb-2">&nbsp;&nbsp;&nbsp;<img id="impact_arrow" src="assets/img/icons/arrow_right.png" height="20px"/>Advanced</h5></a>
										<div id="impact_box" class="col-xl-12 col-lg-12 col-sm-12" style="display:none">
											<div class="card-body">
												<h4 class="mb-0">Impact Attributes</h4>
												<br>
												<div class="row row-sm">
													<div class="form-group col-lg-3 ">
														<span style="text-align: start;">Dwell Time</span>
														<div class="form-group ">
															<select name="dwell_time" id="dwell_time" class="form-control select2" onchange="getQuotation();">
																<option value="">Default Select</option>
																<option value="slow traffic">Slow traffic</option>
																<option value="moving traffic">Moving traffic</option>
																<option value="traffic light">Traffic lights</option>
																
															</select>
														</div>
													</div>
													<div class="form-group col-lg-3 ">
														<span style="text-align: start;">Angle of view</span>
														<div class="form-group ">
															<select name="angle_of_view" id="angle_of_view" class="form-control select2" onchange="getQuotation();">
																<option value="">Default Select</option>
																<option value="poor">Poor</option>
																<option value="medium">Medium</option>
																<option value="good">Good</option>
															
															</select>
														</div>
													</div>
													<div class="form-group col-lg-3 ">
														<span style="text-align: start;">Board Viewing Distance</span>
														<div class="form-group ">
															<select name="board_viewing_distance" id="board_viewing_distance" class="form-control select2" onchange="getQuotation();">
																<option value="">Default Select</option>
																<option value="(S) Able to view from 50m">(S) Able to view from 50m</option>
																<option value="(M) Able to view from 100m">(M) Able to view from 100m </option>
																<option value="(L) Able to view from 150m">(L) Able to view from 150m </option>
															</select>
														</div>
													</div>
													<div class="form-group col-lg-3 ">
														<span style="text-align: start;">Competing Screens</span>
														<div class="form-group ">
															<select name="competing_screens" id="competing_screens" class="form-control select2" onchange="getQuotation();">
																<option value="">Default Select</option>
																<option value="0">0</option>
																<option value="1">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
																<option value="4">4</option>
																<option value="5">5</option>
																<option value="6">6</option>
																<option value="7">7</option>
																<option value="8">8</option>
																<option value="9">9</option>
																<option value="10">10</option>
																
															</select>
														</div>
													</div>
												</div>
												
											</div>
											
											<div class="row row-sm">
										<a href="#/" onclick="openDemoBox()" style="color:black"><h5 class="mb-2">&nbsp;&nbsp;&nbsp;<img id="demo_arrow" src="assets/img/icons/arrow_right.png" height="20px"/>Advanced</h5></a>
										<div id="demo_box" class="col-xl-12 col-lg-12 col-sm-12" style="display:none">
											<div class="card-body">
												<h4 class="mb-0">Demographics Attributes</h4>
												<br>
												<div class="row row-sm">
													<div class="form-group col-lg-4 ">
														<span style="text-align: start;">Affluence</span>
														<div class="form-group ">
															<select name="affluance" id="affluance" class="form-control select2">
																<option value="">Default Select</option>
																<option value="Low">Low</option>
																<option value="High">High</option>
															</select>
														</div>
													</div>
													<div class="form-group col-lg-4 ">
														<span style="text-align: start;">Age Bands</span>
														<div class="form-group ">
															<select name="country" class="form-control select2">
																<option value="">Default Select</option>
																
															</select>
														</div>
													</div>
													<div class="form-group col-lg-4 ">
														<span style="text-align: start;">Buyer Behaviour</span>
														<div class="form-group ">
															<select name="country" class="form-control select2">
																<option value="">Default Select</option>
																
															</select>
														</div>
													</div>
												</div>
												<div class="row row-sm">
													<div class="form-group col-lg-4 ">
														<span style="text-align: start;">Family Units</span>
														<div class="form-group ">
															<select name="country" class="form-control select2">
																<option value="">Default Select</option>
															</select>
														</div>
													</div>
													<div class="form-group col-lg-4 ">
														<span style="text-align: start;">Gender</span>
														<div class="form-group ">
															<select name="country" class="form-control select2">
																<option value="">Default Select</option>
																
															</select>
														</div>
													</div>
													<div class="form-group col-lg-4 ">
														<span style="text-align: start;">Hobby</span>
														<div class="form-group ">
															<select name="country" class="form-control select2">
																<option value="">Default Select</option>
																
															</select>
														</div>
													</div>
												</div>
												<div class="row row-sm">
													<div class="form-group col-lg-4 ">
														<span style="text-align: start;">Millennial Gender</span>
														<div class="form-group ">
															<select name="country" class="form-control select2">
																<option value="">Default Select</option>
															</select>
														</div>
													</div>
													<div class="form-group col-lg-4 ">
														<span style="text-align: start;">Tourist & Travelers</span>
														<div class="form-group ">
															<select name="country" class="form-control select2">
																<option value="">Default Select</option>
																
															</select>
														</div>
													</div>
													<div class="form-group col-lg-4 ">
														<span style="text-align: start;">Mobile device</span>
														<div class="form-group ">
															<select name="country" class="form-control select2">
																<option value="">Default Select</option>
																
															</select>
														</div>
													</div>
												</div>
												
											</div>
										</div>
									</div>
										</div>
									</div>

									
								</div>
								<!-- Grid modal -->
								<div class="modal" id="modaldemo6">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content modal-content-demo">
											
											<div class="modal-body">
												<div class="row row-sm">
													<div class="col-md-3">
														<div class="item-card-img">
															<img style="object-fit: cover;height:150px" src="assets/img/billboards/board2.png" alt="">
														
														</div>
													</div>
													<div class="col-md-7">
														<h5 class="font-weight-bold mt-0">Jalan Raja Laut</h5>
														<p class="font-weight-semibold mt-0">VR 2014</p>
														<p>3.1334 &deg;N, 101.629320 &deg;E</p>
														<img src="assets/img/icons/view.png" style="width:20px"/> &nbsp;<span>360,000 Average Daily Views</span><br>
														<img src="assets/img/icons/day-and-night.png" style="width:20px"/> &nbsp;<span>2160 per day</span><br>
														<img src="assets/img/icons/road.png" style="width:20px"/> &nbsp;<span>Left side of the road</span><br>
														<img src="assets/img/icons/stopwatch.png" style="width:20px"/> &nbsp;<span>15 seconds</span><br>
														<img src="assets/img/icons/scale-up.png" style="width:20px"/> &nbsp;<span>30x20</span><br>
														<img src="assets/img/icons/seen.png" style="width:20px"/> &nbsp;<span>Available</span>
													</div>
													<div class="col-md-2">
														<button class="btn ripple btn-block btn-1" style="color:white"><i class="fe fe-plus"></i>&nbsp;Add Sign</button>
													</div>
													
												</div>
												
											</div>
											
										</div>
									</div>
								</div>
								<!--End Grid modal -->
							</div>
						</div>
						<!-- End Row -->
					</div>
				</div>
			</div>
			<!-- End Main Content-->

			<!-- Main Footer-->
			<div class="main-footer text-center">
				<div class="container">
					<div class="row row-sm">
						<div class="col-md-12">
							<span>Copyright © 2023/24 <a href="#">PLAY/DOOH</a>. All rights reserved.</span>
						</div>
					</div>
				</div>
			</div>
			<!--End Footer-->

		</div>
		<!-- End Page -->

		<!-- Back-to-top -->
		<a href="#top" id="back-to-top" style="background-color:#983E97;border-color: #983E97;"><i class="fe fe-arrow-up"></i></a>

		<!-- Jquery js-->
		<script src="assets/plugins/jquery/jquery.min.js"></script>

		<!-- Bootstrap js-->
		<script src="assets/plugins/bootstrap/js/popper.min.js"></script>
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Internal Chart.Bundle js-->
		<!--<script src="assets/plugins/chart.js/Chart.bundle.min.js"></script>-->

		<!-- Peity js-->
		<script src="assets/plugins/peity/jquery.peity.min.js"></script>

		<!-- Internal Flot Chart js-->
		<script src="assets/plugins/jquery.flot/jquery.flot.js"></script>
		<script src="assets/plugins/jquery.flot/jquery.flot.pie.js"></script>
		<script src="assets/plugins/jquery.flot/jquery.flot.resize.js"></script>
		<!--<script src="assets/js/chart.flot.js"></script>-->

		<!-- Select2 js-->
		<script src="assets/plugins/select2/js/select2.min.js"></script>
		<script src="assets/js/select2.js"></script>

		<!-- Perfect-scrollbar js -->
		<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

		<!-- Sidemenu js -->
		<script src="assets/plugins/sidemenu/sidemenu.js" id="leftmenu"></script>

		<!-- Sidebar js -->
		<script src="assets/plugins/sidebar/sidebar.js"></script>

		<!-- Internal Apexchart js-->
		<!--<script src="assets/js/apexcharts.js"></script>-->

		<!-- Internal Dashboard js-->
		<script src="assets/js/crypto-market.js"></script>

		<!-- Color Theme js -->
		<script src="assets/js/themeColors.js"></script>

		<!-- Sticky js -->
		<script src="assets/js/sticky.js"></script>
		
		<!-- Internal Data Table js -->
		<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
		<script src="assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
		<script src="assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
		<script src="assets/plugins/datatable/js/jszip.min.js"></script>
		<script src="assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
		<script src="assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
		<script src="assets/plugins/datatable/js/buttons.html5.min.js"></script>
		<script src="assets/plugins/datatable/js/buttons.print.min.js"></script>
		<script src="assets/plugins/datatable/js/buttons.colVis.min.js"></script>
		<script src="assets/plugins/datatable/dataTables.responsive.min.js"></script>
		<script src="assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
		<script src="assets/js/table-data.js"></script>
		<script src="assets/js/select2.js"></script>

		<!-- Custom js -->
		<script src="assets/js/custom.js"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.1/axios.min.js"></script>

		<script src="dashboard_features.js"></script>
		
		<script>
		    $(document).ready( function () {
		        getQuotation();
                $('#example1').DataTable();
            } );
            
            function setMediaPlatform(){
                var eMediaPlatform = document.getElementById("media_platform");
                var eMediaPlatformValue = eMediaPlatform.value;
                var sql = "api/get_sitecode.php?";
                
                
                if(eMediaPlatformValue !== ""){
                    sql += "media_platform="+eMediaPlatformValue;
                }
                const xhttp = new XMLHttpRequest();
                
                xhttp.onload = function() {
                var rData = JSON.parse(this.response);
                
                document.getElementById("site_code").innerHTML = "";
                var parent = document.getElementById("site_code");
                
                for ( var pos = 0; pos < rData.data.length; pos++)
                {
                    //create an <option> to add the <select>
                    var child = document.createElement("option");
                
                    //assign values to the <option>
                    child.textContent = rData.data[pos].site_code
                    child.value = rData.data[pos].site_code;
                
                    //attach the mew <option> to the <selection>
                    parent.appendChild(child);
                };
                xhttp.onreadystatechange = function() {
        console.log("readystate mediaplaform- "+this.readyState);
        console.log("status mediaplaform- "+this.status);
        console.log("responsetext mediaplaform- "+this.responseText);
        
    
  };
            
                }
                xhttp.open("GET", sql,true);
                xhttp.send();
               }
            
		</script>

	

		<!--<script src="chart_features.js"></script>-->
		
		<script src="map_features.js"></script>

		<!--<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>-->
		
		 <!-- prettier-ignore -->
     <script>//(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
    //      ({key: "AIzaSyAfNwYDsoHn47AWav3I0-ht1Oh5ZnVnS0M", v: "weekly"});</script>
        
        <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfNwYDsoHn47AWav3I0-ht1Oh5ZnVnS0M">
</script>

	</body>
</html>