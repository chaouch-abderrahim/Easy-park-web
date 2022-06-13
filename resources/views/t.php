<?php
  


  $c = 0;
  
  
  $e=0;
       for ($j = 0; $j < count($data); $j++) {
         
          $c = -1;
         
          foreach ($data[$j] as $value) {
              $c++;
              if ($c == 8){
                             if   ( "2022-01-01"<substr($value,0,10) &&    substr($value,0,10)<"2022-02-01")  {
                                 $e++;
                             }}
                                  
              
          }
          
        }
      

$purchased= array($e, 15, 19, 0, 5, 7, 0, 0, 12, 13, 10, 1);
  
// Second array for sold product
$sold= array(7, 12, 14, 0, 3, 7, 0, 0, 10, 7, 5, 0);
   
// Data to draw graph for purchased products
$dataPoints = array(
    array("label"=> "Jan", "y"=> $purchased[0]),
    array("label"=> "Feb", "y"=> $purchased[1]),
    array("label"=> "March", "y"=> $purchased[2]),
    array("label"=> "April", "y"=> $purchased[3]),
    array("label"=> "May", "y"=> $purchased[4]),
    array("label"=> "Jun", "y"=> $purchased[5]),
    array("label"=> "July", "y"=> $purchased[6]),
    array("label"=> "Aug", "y"=> $purchased[7]),
    array("label"=> "Sep", "y"=> $purchased[8]),
    array("label"=> "Oct", "y"=> $purchased[9]),
    array("label"=> "Nov", "y"=> $purchased[10]),
    array("label"=> "Dec", "y"=> $purchased[11])
);
   
// Data to draw graph for sold products
$dataPoints2 = array(
    array("label"=> "Jan", "y"=> $sold[0]),
    array("label"=> "Feb", "y"=> $sold[1]),
    array("label"=> "March", "y"=> $sold[2]),
    array("label"=> "April", "y"=> $sold[3]),
    array("label"=> "May", "y"=> $sold[4]),
    array("label"=> "Jun", "y"=> $sold[5]),
    array("label"=> "July", "y"=> $sold[6]),
    array("label"=> "Aug", "y"=> $sold[7]),
    array("label"=> "Sep", "y"=> $sold[8]),
    array("label"=> "Oct", "y"=> $sold[9]),
    array("label"=> "Nov", "y"=> $sold[10]),
    array("label"=> "Dec", "y"=> $sold[11])
);
       
?>
   
<!DOCTYPE HTML>
<html>
<head>  
   <script src="https://canvasjs.com/assets/script/canvasjs.min.js">
    </script>
    <script>
        window.onload = function () {
           
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title:{
                    text: "Monthly Purchased and Sold Product"
                },    
               /* axisY: {
                    title: "Purchased",
                    titleFontColor: "#4F81BC",
                    lineColor: "#4F81BC",
                    labelFontColor: "#4F81BC",
                    tickColor: "#4F81BC"
                },*/
                axisY2: {
                    title: "Sold",
                    titleFontColor: "#C0504E",
                    lineColor: "#C0504E",
                    labelFontColor: "#C0504E",
                    tickColor: "#C0504E"
                },    
               
                
                data: [{
                    type: "column",
                    name: "Purchased",
                    legendText: "Purchased",
                    showInLegend: true, 
                    dataPoints:<?php echo json_encode($dataPoints,
                            JSON_NUMERIC_CHECK); ?>
                },
                {
                    type: "column",    
                    name: "Sold",
                    legendText: "Sold",
                    axisYType: "secondary",
                    showInLegend: true,
                    dataPoints:<?php echo json_encode($dataPoints2,
                            JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
               
            function toggleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined"
                            || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                }
                else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }
           
        }
    </script>
</head>
  
<body>
   <div id="chartContainer" style="height: 300px; width: 100%;"></div>
</body>
</html>
<?php
 
$dataPoints = array(
	array("label"=> "60", "y"=> 80),
	array("label"=> "180", "y"=> 65),
	array("label"=> "40", "y"=> 11),
	array("label"=> "1000", "y"=> 5),
	array("label"=> "70", "y"=> 48),
	array("label"=> "Core 6", "y"=> 8),

);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "CPU Usage in 8-Core Processor"
	},
	axisY: {
		minimum: 0,
		maximum: 100,
		suffix: "%"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{234y}",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
 
function updateChart() {
	var color,deltaY, yVal;
	var dps = chart.options.data[0].dataPoints;
	for (var i = 0; i < dps.length; i++) {
		deltaY = (2 + Math.random() * (-2 - 2));
		yVal =  Math.min(Math.max(deltaY + dps[i].y, 0), 90);
		color = yVal > 75 ? "#FF2500" : yVal >= 50 ? "#FF6000" : yVal < 50 ? "#41CF35" : null;
		dps[i] = {label: "Abonnement"+(i+1) , y: yVal, color: color};
	}
	chart.options.data[0].dataPoints = dps;
	chart.render();
};
updateChart();
 
setInterval(function () { updateChart() }, 1000);
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>



<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>










                        <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {
        'packages':['geochart'],
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country', 'Popularity'],
          ['Germany', 200],
          ['United States', 300],
          ['Rabat', 400],
          ['Canada', 500],
          ['MA', 600],
          ['RU', 700]
        ]);

        var options = {};

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="regions_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>







<html>
  <head>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
    <script type='text/javascript'>
     google.charts.load('current', {
       'packages': ['geochart'],
       // Note: Because markers require geocoding, you'll need a mapsApiKey.
       // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
       'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
     });
     google.charts.setOnLoadCallback(drawMarkersMap);

      function drawMarkersMap() {
      var data = google.visualization.arrayToDataTable([
        ['City',   'Population', 'Area'],
        ['Rabat',      2761477,    1285.31],
        ['MA',     1324110,    181.76],
        ['Naples',    959574,     117.27],
        ['Turin',     907563,     130.17],
        ['Palermo',   655875,     158.9],
        ['Genoa',     607906,     243.60],
        ['Bologna',   380181,     140.7],
        ['Florence',  371282,     102.41],
        ['Fiumicino', 67370,      213.44],
        ['Anzio',     52192,      43.43],
        ['Ciampino',  38262,      11]
      ]);

      var options = {
        region: 'IT',
        displayMode: 'markers',
        colorAxis: {colors: ['green', 'blue']}
      };

      var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    };
    </script>
  </head>

    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  
  </body>
</html>