<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="{{url('Styles/styledeTest.css')}}">
	<link rel="stylesheet" href="{{url('Styles/tableaustyle.css')}}">
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     
     <link rel="stylesheet" href="{{url('Styles/tableaustyle.css')}}">
     <link rel="stylesheet" href="{{url('Styles/styledeTest.css')}}">
     <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
     
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dashboard</title>

    <style>
#chart {
  width: 100%;
  height: 500px;
}

</style>

<!-- Resources -->

<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<?php
$c=0;
 $e=0;
 $a=0;
 $b=0;
 
 $d=0;
 $f=0;
 $g=0;
 $h=0;
 $i=0;
 $k=0;
 $l=0;
 $z=0;
 $m=0;
 $data1=$data[1];

       for ($j = 0; $j < count($data1); $j++) {
         
          $c = -1;
         
          foreach ($data1[$j] as $value) {
              $c++;
              if ($c == 8){
                             if   ( "2022-01-01"<substr($value,0,10) &&    substr($value,0,10)<"2022-02-01")  {
                                 $a++;
                             }
                             if   ( "2022-02-01"<substr($value,0,10) &&    substr($value,0,10)<"2022-03-01")  {
                                $b++;
                            }
                            if   ( "2022-03-01"<substr($value,0,10) &&    substr($value,0,10)<"2022-04-01")  {
                                 $z++;
                             }
                             if   ( "2022-04-01"<substr($value,0,10) &&    substr($value,0,10)<"2022-05-01")  {
                                 $d++;
                             }
                             if   ( "2022-05-01"<substr($value,0,10) &&    substr($value,0,10)<"2022-06-01")  {
                                $e++;
                            }
                            if   ( "2022-06-01"<substr($value,0,10) &&    substr($value,0,10)<"2022-07-01")  {
                                $f++;
                            }
                            if   ( "2022-07-01"<substr($value,0,10) &&    substr($value,0,10)<"2022-08-01")  {
                                 $g++;
                             }
                             if   ( "2022-08-01"<substr($value,0,10) &&    substr($value,0,10)<"2022-09-01")  {
                                 $h++;
                             }
                             if   ( "2022-09-01"<substr($value,0,10) &&    substr($value,0,10)<"2022-10-01")  {
                                $i++;
                            }
                            if   ( "2022-10-01"<substr($value,0,10) &&    substr($value,0,10)<"2022-11-01")  {
                                $m++;
                            }
                            if   ( "2022-11-01"<substr($value,0,10) &&    substr($value,0,10)<"2022-12-01")  {
                                $k++;
                            }
                            if   ( "2022-12-01"<substr($value,0,10) &&    substr($value,0,10)<"2023-01-01")  {
                                $l++;
                            }}
                                  
              
          }
          
        }
        ?>
      
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chart", am4charts.XYChart);

// Add data
chart.data = [{
  "country": "Janvier",
  "visits": <?php echo $a ;  ?>
}, {
  "country": "Feverier",
  "visits": <?php echo $b ;  ?>
}, {
  "country": "Mars",
  "visits":<?php echo $z ;  ?>
}, {
  "country": "April",
  "visits": <?php echo $d ;  ?>
}, {
  "country": "Mai",
  "visits": <?php echo $e ;  ?>
}, {
  "country": "Juin",
  "visits": <?php echo $f ;  ?>
}, {
  "country": "Juillet",
  "visits": <?php echo $g ;  ?>
}, {
  "country": "Aout",
  "visits": <?php echo $h ;  ?>
}, {
  "country": "september",
  "visits": <?php echo $i ;  ?>
}, {
  "country": "Octobre",
  "visits": <?php echo $m ;  ?>
}, {
  "country": "Novembre",
  "visits": <?php echo $k ;  ?>
}, {
  "country": "Decembre",
  "visits": <?php echo $l ;  ?>
}];

// Create axes

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;

categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
  if (target.dataItem && target.dataItem.index & 2 == 2) {
    return dy + 25;
  }
  return dy;
});

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "visits";
series.dataFields.categoryX = "country";
series.name = "Visits";
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;

var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;

}); // end am4core.ready()
</script>

<style>
#chartdiv {
  width: 100%;
  height: 500px;
}

</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart
var chart = am4core.create("chartdiv", am4charts.PieChart);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.data = [
    <?php 
       $data2=$data[2];
    for ($j = 0; $j < count($data2); $j++) {
        
    
    ?>
  {
    country: " <?php echo $data2[$j]['Type'] ; ?> ",
    value: <?php
      $add=0;
      for ($s = 0; $s < count($data1); $s++) {
         
        $c = -1;
        
       
        foreach ($data1[$s] as $value) {
            $c++;
            if ($c == 6){
                 $fa=rtrim($value,"DH"); 
                 $T = floatval( $fa );
                if ($T==$data2[$j]['Prix']) {
                    $add++;
                }
            }
                }
            }echo $add ;
    
     ?>
  },
  <?php
}
    ?>
  
];

var series = chart.series.push(new am4charts.PieSeries());
series.dataFields.value = "value";
series.dataFields.radiusValue = "value";
series.dataFields.category = "country";
series.slices.template.cornerRadius = 6;
series.colors.step = 3;

series.hiddenState.properties.endAngle = -90;

chart.legend = new am4charts.Legend();

}); // end am4core.ready()
</script>




       

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {
        'packages':['geochart'],
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country', 'Popularity'],
          ['Germany', 0],
          ['United States', 0],
          ['Rabat', ],
          ['Canada', 0],
          ['MA', 5],
          ['RU', 0]
        ]);

        var options = {};

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
    </script>























    

    <!-- Custom fonts for this template-->
    <link href="{{url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <link href="{{url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{url('css/sb-admin-2.min.css')}}" rel="stylesheet">



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul id="slider" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon ">
                    <img src="{{url('images/logo.png')}}" alt="" srcset="">
                </div>
                <div class="sidebar-brand-text mx-3">Easy <sup>Park</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('index.index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Gestion Clients
            </div>

            <!-- Nav Item - Gestion -->
            <li class="nav-item">
                <a class="nav-link " href="{{route('addclient.add')}}" >
                    <i class="fas fa-fw fa-plus-circle"></i>
                    <span>Ajouter un client</span>
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('Deleteclient.delete')}}" >
                    <i class="fas fa-fw fa-trash-restore-alt"></i>
                    <span>Supprimer un client</span>
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('Modifierclient.Modifier')}}"  >
                    <i class="fas fa-fw fa-pen-nib"></i>
                    <span>Modifier un client</span>
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('Listerclient.Lister')}}">
                    <i class="fas fa-fw fa-th-list"></i>
                    <span>Lister Les client</span>
                </a>
                
            </li>
            
            <li class="nav-item">
                <a class="nav-link " href="{{route('addabonnement.add')}}">
                <i class="fas fa-fw fa-plus-circle"></i>
                    <span>Ajouter abonnement</span>
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('Listerabonnement.Lister')}}">
                    <i class="fas fa-fw fa-th-list"></i>
                    <span>Lister abonnement</span>
                </a>
                
            </li>
			  <li class="nav-item">
                <a class="nav-link " href="{{route('GestionController.Lister')}}">
                    <i class="fas fa-fw fa-th-list"></i>
                    <span>Gestion controller</span>
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('addcontroller.add')}}">
                    <i class="fas fa-fw fa-th-list"></i>
                    <span>ajouter controller</span>
                </a>
                
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            


                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

                <!-- Sidebar Message -->
                <!--  <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="{{url('https://startbootstrap.com/theme/sb-admin-pro')}}">Upgrade to Pro!</a>
            </div>-->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav style="background-color: white;" class="navbar navbar-expand  topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">
                                
                                <?php  $a=0;
                                   $debut=date_create('now');
                                  for ($j = 0; $j < count($data1); $j++) {
         
                                    $c = -1;
                                    foreach ($data1[$j] as $value) {
                                        $c++;
                                       
                                        if ($c == 7){
                                                       if   ( substr($value,0,10) < "2022-06-14"    )  {
                                                           $a++;
                                                       }
                                                       }
                                                    }
                                                   
                                                }
                                                echo $a ;



                                                

                                
                                ?>
                                 
                                
                                
                                
                                
                                
                                
                                
                                
                                +</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"> <?php echo  $debut->format('Y-m-d H:i:s') ; ?> </div>
                                        <span class="font-weight-bold"><?php 
                                   $debut=date_create('now');
                                  for ($j = 0; $j < count($data1); $j++) {
         
                                    $c = -1;
                                    foreach ($data1[$j] as $value) {
                                        $c++;
                                       
                                        if ($c == 7){
                                                       if   ( substr($value,0,10) < "2022-04-19"    )  {
                                                          echo  '<br>abonnement de'.$data1[$j]['Nom'].'à expirer';
														   $setRuf = app('firebase.firestore')->database()->collection('notifications')->newDocument();
                                                           $setRuf->set([
                                                             'Matricule' => $data1[$j]['Matricule'], 'body' =>'Votre abonnement a éxpirer ', 'Time' => '10:10'
                                                             ]);
                                                       }
                                                       }
                                                    }
                                                   
                                                }
                                               



                                                

                                
                                ?>  </span>
                                    </div>
                                </a>

                                <a class="dropdown-item text-center small text-gray-500" href="{{route('Chercherclient.Chercher')}}">Show All Alerts</a>
                            </div>
                        </li>
						 <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="{{route('Modifierabonnement.Modifier')}}" >
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Alerts -->
                                
								</a>
								</li>

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-dark-600 larg">Admin</span>
                                <img class="img-profile rounded-circle" src="{{url('images/images.png')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                            
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>


                </nav>
                
			
                <!-- End of Topbar {{route('login.login')}} -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                  
                        

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">

                                       
                                        <div class="col mr-2">
                                            <div  class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               Nombre des clients</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php

                        use function PHPUnit\Framework\isEmpty;

                             for ($j = 0; $j < count($data1); $j++) {
                               }  echo $j;
                               ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php


$c = 0;


$e=0;
     for ($j = 0; $j < count($data1); $j++) {
       
        $c = -1;
       
        foreach ($data1[$j] as $value) {
            $c++;
            
            if ($c == 6){
                 $f=rtrim($value,"DH"); 
                 $L = intval( $f );
                 $e=$e-(-$L);
                  
                 
           }
        }
    
    }
     echo $e ;
    



?> 
                                            
                                            DH</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Earnings (Annuel)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php


$c = 0;


$e=0;
     for ($j = 0; $j < count($data1); $j++) {
       
        $c = -1;
       
        foreach ($data1[$j] as $value) {
            $c++;
            if ($c == 8){
                           if   ( substr($value,0,10)=="2022-05-27")  {
                               
                           }}
                                
            if ($c == 6){
                 $f=rtrim($value,"DH"); 
                 $L = intval( $f );
                 $e=$e-(-$L);
                  
                 
           }
        }
    
    }
     echo $e ;
    



?> 
                                            
                                            DH
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Nombre d'abonnement</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php


     for ($j = 0; $j < count($data2); $j++) {
       }  echo $j;
       ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div id="regions_div" style="width: 1200px; height: 400px;"></div>
                    <br><!-- HTML -->
<div id="chart"></div>
<br><br><br>

<div id="chartdiv"></div>
                    

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            

                           

                        <div class="col-lg-6 mb-4">

                           
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
				<h2>Les Activités Récent des controleurs:</h2>
				 <div class="col-12 " style=" margin:auto;"> <table id="myTable" class="table table-bordered table-striped">
				<?php
                $data3=$data[3];
                       
                       $c = 0;
                        if (!empty($data3)) {

                            
                            echo '<thead><tr><th>Nom</th><th>CNI</th><th>Fonction</th></thead><tbody>';
                            for ($j = 0; $j < count($data3); $j++) {
                                echo "<tr >";
                                $c = -1;

                                foreach ($data3[$j] as $value) {
                                    $c++;
                                    if ($c  <2) {
                                        echo "<td> $value </td>";
                                    }
                                    
                                    if ($c == 2)
                                    echo "<td> Matricule  :".$value;
                                    if ($c == 3)
                                    echo "<br> Date ET Heur : ".$value." </td>";

                                }
							echo "	</tr>";
                           
                            }
                            echo '</tbody></table>';
                        }
								
                                ?>
								

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Easy Park 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('login.login')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{url('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{url('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{url('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{url('js/demo/chart-pie-demo.js')}}"></script>
	
	
	
	
	
<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
            
















             <script src="{{url('js/jquery.js')}}"></script>
              
                <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

                 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                 
<script>
    $(document).ready( function () {
            $('#myTable').DataTable({
                
                
            });
        });
    </script>

</body>

</html>