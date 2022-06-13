<!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     
     <link rel="stylesheet" href="{{url('Styles/tableaustyle.css')}}">
     <link rel="stylesheet" href="{{url('Styles/styledeTest.css')}}">
     <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css" />
   
     
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">


     <title>Lister les abonnements</title>
     <style>
	/*add full-width input fields*/
	input[type=text],
	input[type=number] {
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 2px solid #ccc;
		box-sizing: border-box;
	}
	/* set a style for all buttons*/
	#a {
		background-color: green;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		cursor: pointer;
		width: 50%;
	}
	/*set styles for the cancel button*/
	.cancelbtn {
		padding: 14px 20px;
		background-color: #FF2E00;
	}
	/*float cancel and signup buttons and add an equal width*/
	.cancelbtn,
	.signupbtn {
		float: left;
		width: 13%
	}
	/*add padding to container elements*/
	.container {
		padding: 16px;
	}
	/*define the modal’s background*/
	
	.modal {
		display: none;
		position: fixed;
		z-index: 1;
		left: 0;
		top: 0;
		width: 70px;
		height: 60%;
		overflow: auto;
		background-color: rgb(0, 0, 0);
		background-color: rgba(0, 0, 0, 0.4);
		padding-top: 60px;
	}
	/*define the modal-content background*/
	
	.modal-content {
		background-color: #fefefe;
		margin: 5% auto 15% auto;
		border: 1px solid #888;
		width: 50%;
	}
	/*define the close button*/
	
	.close {
		position: absolute;
		right: 35px;
		top: 15px;
		color: #000;
		font-size: 40px;
		font-weight: bold;
	}
	/*define the close hover and focus effects*/
	
	.close:hover,
	.close:focus {
		color: red;
		cursor: pointer;
	}
	
	.clearfix::after {
		content: "";
		clear: both;
		display: table;
	}
	
	@media screen and (max-width: 300px) {
		.cancelbtn,
		.signupbtn {
			width: 50%;
		}
	}
</style>




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
                 </di>
                 </di>
                 <div class="col-6 m-auto mt-4 mb-4 " style="  color:blue;">
                     <H1>La liste des Abonnements
                     </H1>
                 </div>
                 <div class="col-12 " style=" margin:auto;"> <table id="Table" class="table table-bordered table-striped">
          
                     <?php

                        use function PHPUnit\Framework\isEmpty;

                       $c = 0;
                        if (!empty($data)) {

                            
                            echo '<thead><tr><th>Type</th><th>Prix</th><th>Duration</th><th>Action</th></thead><tbody>';
                            for ($j = 0; $j < count($data); $j++) {
                                echo "<tr >";
                                $c = -1;

                                foreach ($data[$j] as $value) {
                                  
                                        echo "<td> $value </td>";
                                 
                                } ?>
                                 <td> 
                                  
                                <form action="{{route('Listerabonnement.list')}}" method="get">
                           <input type="hidden" name="ref" value="<?php echo $value ;  ?>" > 
                           <button  type="submit" name="supprimer"   class="btn btn-sm btn-danger">Suprimer</button>
                         <input type="hidden" name="ref" value="<?php echo $value ;  ?>" >          
                                 
                               </form><button type="submit" name="submit"  data-bs-toggle="modal" class="btn btn-sm btn-success" data-bs-target="#modalForm">
            Modifier
        </button>
</td>
                                </tr>
                           <?php
                            }
                            echo '</tbody></table>';
                        }
                       


                        ?>
                          
        <!-- Click on Modal Button -->
        
        <!-- Modal -->
        <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modification de abonnements</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form class="modal-content animate" action="{{route('Listerabonnement.list')}}" method="get">
                        <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select class="form-select" aria-label="Default select example" name="select" required>
                        <option value=""></option>
                        <?php



$c = 0;
if (!empty($data)) {
for ($j = 0; $j < count($data); $j++) {
$c = -1;



$c++;

# code...
echo '<option  > '.$data[$j]['Type'].'</option>';





}

}


?>
                    </select>
               </div>
                            <div class="mb-3">
                                <label class="form-label">Prix</label>
                                <input type="number" class="form-control" id="Prix" name="Prix" placeholder="Prix d'abonnement" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Duration</label>
                                <input type="number" class="form-control" id="Duration" name="Duration" placeholder="La dureé d'abonnement" required />
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe" required />
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <div class="modal-footer d-block">
                               
                                <button type="submit" name="modifier" class="btn btn-warning float-end">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
                        

                    
                        
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

                <!-- Page level plugins
                <script src="{{url('vendor/chart.js/Chart.min.js')}}"></script>

                 Page level custom scripts 
                <script src="{{url('js/demo/chart-area-demo.js')}}"></script>
                <script src="{{url('js/demo/chart-pie-demo.js')}}"></script>
             
             -->

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
            $('#Table').DataTable({
                
            });
        });
    </script>
 
</body>

 </html>