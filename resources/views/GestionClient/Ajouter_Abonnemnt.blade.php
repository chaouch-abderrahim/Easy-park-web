<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="{{url('Styles/styledeTest.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Ajouter Abonnement</title>



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
            <div class="sidebar-heading">
                Parameter
            </div>

          <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Settings</span>
                </a>
                
        
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
    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search fa-fw"></i>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
        aria-labelledby="searchDropdown">
        <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small"
                    placeholder="Search for..." aria-label="Search"
                    aria-describedby="basic-addon2">
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


<div class="topbar-divider d-none d-sm-block"></div>

<!-- Nav Item - User Information -->
<li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-dark-600 larg">Admin</span>
        <img class="img-profile rounded-circle"
            src="{{url('images/images.png')}}">
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="userDropdown">
        
        <a class="dropdown-item" href="#">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Settings
        </a>
        <a class="dropdown-item" href="#">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
           Dark Mode
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
        </a>
    </div>
</li>

</ul>


                </nav>
                </di>
                </di>
                <div class="col-8 m-auto mt-4 mb-4" style="  color:blue;">
                    <H1>Ajouter un Abonnement</H1>
                </div>
                <div class="col-8 " style=" margin:auto;">

                    <form class="row g-3" action="{{route('addabonnement.add')}}" method="post">
                        @csrf
                        
                        <div class="col">
                            <label for="inputEmail4" class="form-label">Duration</label>
                            <input type="number" class="form-control" placeholder="Duration" name="Duration"  required>
                        </div>
                        <div class="col">
                            <label for="inputEmail4" class="form-label">Prix</label>
                            <input type="number" class="form-control" placeholder="Prix" name="Prix" pattern="[a-zA-Z]*" id="lastName"  required>
                        </div>
                        <div>
                            
                            <div class="col-12">
                                <label for="inputAddress2" class="form-label">Type</label>
                                <input type="text" class="form-control" id="inputAddress2" placeholder="Type" name="Type"  required>
                            </div>
                           
                            
                                <div class="col-6 mt-4 mb-4">
                                    <button type="submit" name="submit" value="Ajouter" class="btn btn-primary">Ajouter</button>
                                    <button type="rest" value="Annuler" name="Annuler" class="btn btn-primary">Annuler</button>
                                </div>
                               


                    </form>

                </div>
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
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

            </body>



</html>