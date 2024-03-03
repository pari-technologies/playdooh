            var keyMetricsBoxOpen = false;
			var quotationBoxOpen = false;
			var summaryBoxOpen = false;
			var locationBoxOpen = false;
			var impactBoxOpen = false;
			var demoBoxOpen = false;

			
			var keyMetricsDiv = document.getElementById("collapseExample");
			var quotationDiv = document.getElementById("collapse2");
			var locationDiv = document.getElementById("collapse3");

			function openKeyMetricsBox() {

				keyMetricsBoxOpen = !keyMetricsBoxOpen;

				if(keyMetricsBoxOpen){
					keyMetricsDiv.style.display = "block";
					quotationDiv.style.display = "none";
					locationDiv.style.display = "none";
					document.getElementById("key_metrics_box").style.backgroundImage = "url('assets/img/playdooh_btn.png')";
					document.getElementById("key_metrics_box").style.backgroundSize = "cover";
					document.getElementById("key_metrics_box").style.backgroundRepeat = "no-repeat";
					document.getElementById("key_metrics_box_carret").classList.add('fa-caret-up');
					document.getElementById("key_metrics_box_carret").classList.remove('fa-caret-down');

					quotationBoxOpen = false;
					document.getElementById("quotation_box_carret").classList.add('fa-caret-down');
					document.getElementById("quotation_box_carret").classList.remove('fa-caret-up');
					document.getElementById("quotation_box").style.background = "black";

					locationBoxOpen = false;
					document.getElementById("pic1").src = "assets/img/icons/map2.png";
					document.getElementById("location_box_carret").classList.add('fa-caret-down');
					document.getElementById("location_box_carret").classList.remove('fa-caret-up');
					document.getElementById("location_box").style.background = "white";
				}
				else{
					keyMetricsDiv.style.display = "none";
					document.getElementById("key_metrics_box_carret").classList.add('fa-caret-down');
					document.getElementById("key_metrics_box_carret").classList.remove('fa-caret-up');
					document.getElementById("key_metrics_box").style.background = "black";
				}
			  
			}

			function openQuotationBox() {
				quotationBoxOpen = !quotationBoxOpen;

				if(quotationBoxOpen){
					keyMetricsDiv.style.display = "none";
					quotationDiv.style.display = "block";
					locationDiv.style.display = "none";
					
					document.getElementById("quotation_box").style.backgroundImage = "url('assets/img/playdooh_btn.png')";
					document.getElementById("quotation_box").style.backgroundSize = "cover";
					document.getElementById("quotation_box").style.backgroundRepeat = "no-repeat";
					document.getElementById("quotation_box_carret").classList.add('fa-caret-up');
					document.getElementById("quotation_box_carret").classList.remove('fa-caret-down');

					keyMetricsBoxOpen = false;
					document.getElementById("key_metrics_box_carret").classList.add('fa-caret-down');
					document.getElementById("key_metrics_box_carret").classList.remove('fa-caret-up');
					document.getElementById("key_metrics_box").style.background = "black";

					locationBoxOpen = false;
					document.getElementById("pic1").src = "assets/img/icons/map2.png";
					document.getElementById("location_box_carret").classList.add('fa-caret-down');
					document.getElementById("location_box_carret").classList.remove('fa-caret-up');
					document.getElementById("location_box").style.background = "white";
				}
				else{
					quotationDiv.style.display = "none";
					document.getElementById("quotation_box_carret").classList.add('fa-caret-down');
					document.getElementById("quotation_box_carret").classList.remove('fa-caret-up');
					document.getElementById("quotation_box").style.background = "black";
				}
			  
			}

			function openLocationBox() {
				locationBoxOpen = !locationBoxOpen;

				if(locationBoxOpen){
					keyMetricsDiv.style.display = "none";
					quotationDiv.style.display = "none";
					locationDiv.style.display = "block";
				// 	document.getElementById("location_box").style.background = "linear-gradient(to right, #34F5C5 0%, #2FBED0 51%, #3FA9F5 100%)";
					document.getElementById("location_box").style.backgroundImage = "url('assets/img/playdooh_btn.png')";
					document.getElementById("location_box").style.backgroundSize = "cover";
					document.getElementById("location_box").style.backgroundRepeat = "no-repeat";
					document.getElementById("pic1").src = "assets/img/icons/map_white.png";
					document.getElementById("location_box_carret").classList.add('fa-caret-up');
					document.getElementById("location_box_carret").classList.remove('fa-caret-down');

					keyMetricsBoxOpen = false;
					document.getElementById("key_metrics_box_carret").classList.add('fa-caret-down');
					document.getElementById("key_metrics_box_carret").classList.remove('fa-caret-up');
					document.getElementById("key_metrics_box").style.background = "black";

					quotationBoxOpen = false;
					quotationDiv.style.display = "none";
					document.getElementById("quotation_box_carret").classList.add('fa-caret-down');
					document.getElementById("quotation_box_carret").classList.remove('fa-caret-up');
					document.getElementById("quotation_box").style.background = "black";
				}
				else{
					locationDiv.style.display = "none";
					document.getElementById("pic1").src = "assets/img/icons/map2.png";
					document.getElementById("location_box_carret").classList.add('fa-caret-down');
					document.getElementById("location_box_carret").classList.remove('fa-caret-up');
					document.getElementById("location_box").style.background = "white";
				}
			  
			}

			function openSummaryBox() {
				summaryBoxOpen = !summaryBoxOpen;

				if(summaryBoxOpen){
					document.getElementById("summaryBox").style.display = "block";
				}
				else{
					document.getElementById("summaryBox").style.display = "none";
				}
			  
			}

			function openImpactBox() {
				impactBoxOpen = !impactBoxOpen;

				if(impactBoxOpen){
					document.getElementById("impact_box").style.display = "block";
					document.getElementById("impact_arrow").src = "assets/img/icons/arrow_down.png";
					document.getElementById("impact_arrow").style.width = "20px";
				}
				else{
					document.getElementById("impact_box").style.display = "none";
					document.getElementById("impact_arrow").src = "assets/img/icons/arrow_right.png";
				}
			  
			}

			function openDemoBox() {
				demoBoxOpen = !demoBoxOpen;

				if(demoBoxOpen){
					document.getElementById("demo_box").style.display = "block";
					document.getElementById("demo_arrow").src = "assets/img/icons/arrow_down.png";
					document.getElementById("demo_arrow").style.width = "20px";
				}
				else{
					document.getElementById("demo_box").style.display = "none";
					document.getElementById("demo_arrow").src = "assets/img/icons/arrow_right.png";
				}
			  
			}