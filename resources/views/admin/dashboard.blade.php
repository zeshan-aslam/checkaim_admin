@extends('master.main')

@section('content')

    <!-- BEGIN PAGE -->
    <div id="main-content">
		
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
			 <h3 class="page-title">
                        Dashboard
                    </h3>
        
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                <!--BEGIN METRO STATES-->
                <div class="metro-nav">
                    <div class="metro-nav-block nav-block-blue">
                        <a data-original-title="" href="#">
                          
                            <div class="info">
                                Amount : {{number_format($amount,2)  }} <br>
                                <hr>
                                <span> Transactions : ({{number_format( $transactions) }})</span>
                            </div>
                            <div class="status">Total Sales Monitored</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-green">
						
                        <a data-original-title="" href="#">
                          
                            <div class="info">
                                @if ($report[0]->sales == null)
                                    (0)
                                @else
                                    {{number_format( $report[0]->sales,2) }}
                                @endif
                            </div>

                            <div class="status">Today's Sales
                               
                               
                            </div>

                        </a>
                    </div>
                    <div class="metro-nav-block nav-light-green">
						
                        <a data-original-title="" href="#">
                           
                            <div class="info">
                                @if ($report[0]->alerts == null)
                                    (0)
                                @else
                                    {{ $report[0]->alerts }}
                                @endif
                            </div>
                            <div class="status">Today's Alerts
                              
                                
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span6">
                    <!-- BEGIN CHART PORTLET-->
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Clients Sales</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>

                            </span>
                        </div>
                        <div class="widget-body">
                            <div class="text-center">
                                <canvas id="pie" height="400" width="400"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- END CHART PORTLET-->
                </div>
                <div class="span6">
                    <!-- BEGIN CHART PORTLET-->
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"> </i> Clients Transactions</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>

                            </span>
                        </div>
                        <div class="widget-body">
                            <div class="text-center">
                                <canvas id="bar" height="400" width="450"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- END PAGE CONTENT-->
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN CHART PORTLET-->
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"> </i> Estimated Earnings</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>

                            </span>
                        </div>
                        <div class="widget-body">
                            <div class="text-center">
                                <canvas id="linechart" height="100" width="450"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- END PAGE CONTENT-->
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN MAP PAGE PORTLET-->
                    <div class="widget blue">
                        <div class="widget-title">
                            <h4><i class="icon-edit"></i> Sales Locations </h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <div id="location" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>
                    <!-- END MAP PAGE PORTLET-->
                </div>
            </div>
		</div>
</div>

        @endsection
        @section('js')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="//cdn.amcharts.com/lib/4/core.js"></script>
            <script src="//cdn.amcharts.com/lib/4/maps.js"></script>
            <script src="//cdn.amcharts.com/lib/4/geodata/worldLow.js"></script>
	   @endsection
			 @section('script')
            <script>
                $(document).ready(function() {

                   
                    var newdata = [];
                    let dataSum = 0;
                    const getData = [];
                    url = "{{ url('/Client_Sales') }}";

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: url,
                        type: 'POST',
                        success: function(response) {
                            this.newdata = response;
                            console.log(this.newdata);
                            for (let i = 0; i < this.newdata.length; i++) {
                                // console.log(this.data[i]['value']);
                                dataSum += this.newdata[i]['value'];
                            }
                            let finalData = this.newdata.map(item => (
                                (item['value'] * 100 / dataSum).toFixed(2)
                            ));
                            let finallabel = this.newdata.map(item => (
                                item['name']
                            ));
                            let transaction = this.newdata.map(item => (
                                item['transactions']
                            ))

                            const labels = finallabel;
                            const testData = finalData;
                            const piedata = {
                                labels: labels,
                                datasets: [{
                                    backgroundColor: [
                                        'rgb(39, 98, 158)',
                                        'rgba(239, 41, 48, 0.9)',
                                        'rgba(239, 41, 255, 0.9)',
										'rgba(201, 203, 207, 0.6)',
                                        'rgba(75, 244, 92, 0.8)',
                                        'rgba(54, 162, 235, 0.6)',
                                        'rgba(153, 122, 255, 0.6)',
                                        'rgba(201, 203, 207, 0.6)',
                                    ],
                                    borderColor: 'rgb(255, 99, 132)',
                                    data: testData,
                                }]
                            };
                            const bardata = {
                                labels: labels,
                                datasets: [{
                                    label: 'Client Transactions',
                                   backgroundColor: [
                                        'rgb(39, 98, 158)',
                                        'rgba(18, 54, 84, 0.8)',
                                        'rgba(239, 41, 48, 0.9)',
									   'rgba(201, 203, 207, 0.6)',
                                        'rgba(75, 244, 92, 0.8)',
                                        'rgba(54, 162, 235, 0.6)',
                                        'rgba(153, 122, 255, 0.6)',
                                        'rgba(201, 203, 207, 0.6)',
                                    ],
                                    borderColor: 'rgb(255, 99, 132)',
                                    data: transaction,
                                }]
                            };
                            // Pie Chart Config    
                            const config = {
                                type: 'pie',
                                data: piedata,
                                options: {
                                    maintainAspectRatio: false,
                                }
                            };
                            var myChart = new Chart(
                                document.getElementById('pie'),
                                config
                            );
                            // Bar Chart Config
                            const config2 = {
                                type: 'bar',
                                data: bardata,
                                options: {
                                    maintainAspectRatio: false,
                                    indexAxis: 'y',
                                }
                            };
                            new Chart(
                                document.getElementById('bar'),
                                config2
                            );
                        },
                        catch: function(err) {
                            console.log(err);
                        }
                    });
                    ernurl = "{{ url('/statEarnings') }}";
                    $.ajax({
                        url: ernurl,
                        type: 'POST',
                        success: function(response) {
                            console.log(response);
                            let earningestimate = response.map(item => (
                                item['earningestimate']
                            ));
                            let formatdate = response.map(item => (
                                item['formatdate']
                            ))
                            console.log(earningestimate, "earningestimate");
                            console.log(formatdate, "formatdate");
                            const labels = formatdate;
                            const data = {
                                labels: labels,
                                datasets: [{
                                    label: 'Estimated Earnings',
                                    data: earningestimate,
                                    fill: false,
                                    borderColor: 'rgb(75, 192, 192)',
                                    tension: 0.1
                                }]
                            };
                            const config = {
                                type: 'line',
                                data: data,
                                options: {}
                            };
                            new Chart(document.getElementById('linechart'),
                                config);
                        },
                        catch: function(err) {
                            console.log(err);
                        }
                    });
                    locationurl = "{{ url('/salesLocation') }}";
                    $.ajax({
                        url: locationurl,
                        type: 'POST',
                        success: function(response) {
                            console.log(response);
                       	// Create map instance
                    var chart = am4core.create("location", am4maps.MapChart);

                    // Set map definition
                    chart.geodata = am4geodata_worldLow;

                    // Set projection
                    chart.projection = new am4maps.projections.Miller();

                    // Create map polygon series
                    var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());

                    // Exclude Antartica
                    polygonSeries.exclude = ["AQ"];

                    // Make map load polygon (like country names) data from GeoJSON
                    polygonSeries.useGeodata = true;

                    // Configure series
                    var polygonTemplate = polygonSeries.mapPolygons.template;
                    polygonTemplate.tooltipText = "{name}";
                    polygonTemplate.polygon.fillOpacity = 0.6;


                    // Create hover state and set alternative fill color
                    var hs = polygonTemplate.states.create("hover");
                    hs.properties.fill = chart.colors.getIndex(0);

                    // Add image series
                    var imageSeries = chart.series.push(new am4maps.MapImageSeries());
                    imageSeries.mapImages.template.propertyFields.longitude = "longitude";
                    imageSeries.mapImages.template.propertyFields.latitude = "latitude";
                    imageSeries.mapImages.template.tooltipText = "{city}, {region}, {country}";
                    imageSeries.mapImages.template.propertyFields.url = "url";

                    var circle = imageSeries.mapImages.template.createChild(am4core.Circle);
                    circle.radius = 2;
                    circle.propertyFields.fill = "color";

                    var circle2 = imageSeries.mapImages.template.createChild(am4core.Circle);
                    circle2.radius = 2;
                    circle2.propertyFields.fill = "color";


                    circle2.events.on("inited", function(event){
                      animateBullet(event.target);
                    })


                    function animateBullet(circle) {
                        var animation = circle.animate([{ property: "scale", from: 1, to: 3 }, { property: "opacity", from: 1, to: 0 }], 1000, am4core.ease.circleOut);
                        animation.events.on("animationended", function(event){
                          animateBullet(event.target.object);
                        })
                    }

                    var colorSet = new am4core.ColorSet();

                    imageSeries.data = response; 
                        },
                        catch: function(err) {
                            console.log(err);
                        }
                });
                   
                });
            </script>
        @endsection
