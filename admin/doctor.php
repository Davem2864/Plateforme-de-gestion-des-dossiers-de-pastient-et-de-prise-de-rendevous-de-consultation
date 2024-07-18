<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Docteur</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <!-- DataTables Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Bootstrap 4 JS -->
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
</head>
<body id="page-top">
<?php
//learn from w3schools.com
session_start();
if(isset($_SESSION["user"])){
    if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
        header("location: ../login.php");
    }

}else{
    header("location: ../login.php");
}
//import database
include("../connection.php");
?>  <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15"style="padding-left:30px;">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-4"> 
                    Administrator <sup>team</sup>
                </div>
                </a>
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-10" style="padding-left:30px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 9.671V4.697l-5.803 3.546.338.208A4.5 4.5 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671"/>
                <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791"/>
                </svg>
                <i class="bi bi-envelope-at-fill"></i>
                </div>
                <div class="sidebar-brand-text mx-4"> 
                    admin@edoc.com <sup>gmail</sup>
                </div>
                </a>
            

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
             </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg>
                      <i class="bi bi-person-check-fill"></i>
                    <span>Administration</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="doctor.php">Docteurs</a>
                        <a class="collapse-item" href="schedule.php">Sessions</a>
                        <a class="collapse-item" href="patient.php">Patients</a>
                        <a class="collapse-item" href="appointment.php">Rendez-vous</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                    <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z"/>
                    </svg>
                    <i class="bi bi-shop"></i>
                    <span>Stock</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gerer le Stock:</h6>
                        <a class="collapse-item" href="medoc.php">Medoc</a>
                        <a class="collapse-item" href="approvisionnement.php">Approvisionnement</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Information
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Dossier</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Patients:</h6>
                        <a class="collapse-item" href="docp.php">Dossier de patient</a>
                        <a class="collapse-item" href="traitement.php">Traitements</a>
                        <a class="collapse-item" href="prescription.php">Prescription</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Docteurs:</h6>
                        <a class="collapse-item" href="post.php">Faire un Post</a>
                        <a class="collapse-item" href="rapport.php">Rapport</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                                <?php
                                        echo '<datalist id="doctor">';
                                        $list11 = $database->query("select  docname,docemail from  doctor;");
        
                                        for ($y=0;$y<$list11->num_rows;$y++){
                                            $row00=$list11->fetch_assoc();
                                            $d=$row00["docname"];
                                            $c=$row00["docemail"];
                                            echo "<option value='$d'><br/>";
                                            echo "<option value='$c'><br/>";
                                        };
        
                                    echo ' </datalist>';
                                    ?>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

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
                                        <input type="text" name="search" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                            <?php
                                        echo '<datalist id="doctor">';
                                        $list11 = $database->query("select  docname,docemail from  doctor;");
                                        for ($y=0;$y<$list11->num_rows;$y++){
                                            $row00=$list11->fetch_assoc();
                                            $d=$row00["docname"];
                                            $c=$row00["docemail"];
                                            echo "<option value='$d'><br/>";
                                            echo "<option value='$c'><br/>";
                                        };
        
                                    echo ' </datalist>';
                                    ?>
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
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 2h-4v3h4zm0 4h-4v3h4zm0 4h-4v3h3a1 1 0 0 0 1-1zm-5 3v-3H6v3zm-5 0v-3H1v2a1 1 0 0 0 1 1zm-4-4h4V8H1zm0-4h4V4H1zm5-3v3h4V4zm4 4H6v3h4z"/>
                                        </svg>
                                        <i class="bi bi-table"></i>
                                        </div>
                                    </div>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">9+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Centre de reccent Rendez-vous
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Les rendez-vous à venir jusqu'à <?php
                                    // Définir la locale en français
                                    $formatter = new IntlDateFormatter(
                                        'fr_FR',
                                        IntlDateFormatter::FULL,
                                        IntlDateFormatter::FULL,
                                        'Europe/Paris',
                                        IntlDateFormatter::GREGORIAN
                                    );

                                    // Obtenir le jour de la semaine pour une date spécifique
                                    echo $formatter->format(new DateTime('+1 week'));
                                    ?>

                                    </h6>
                                </div>
                                <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="img/icone-notification-rappel-calendrier-rouge-site-web-ui-illustration-rendu-3d.jpg" alt="...">
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Numero de RDV</th>
                                                <th>Nom du Patient</th>
                                                <th>Docteur</th>
                                                <th>Session</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Numero de RDV</th>
                                                <th>Nom du Patient</th>
                                                <th>Docteur</th>
                                                <th>Session</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                    <?php
                                                $nextweek=date("Y-m-d",strtotime("+1 week"));
                                                $sqlmain = "SELECT appointment.appoid,
                                                schedule.scheduleid,
                                                schedule.title,
                                                doctor.docname,
                                                patient.pname,
                                                schedule.scheduledate,
                                                schedule.scheduletime,
                                                appointment.apponum,
                                                appointment.appodate
                                                FROM schedule
                                                INNER JOIN appointment ON schedule.scheduleid = appointment.scheduleid
                                                INNER JOIN patient ON patient.pid = appointment.pid
                                                INNER JOIN doctor ON schedule.docid = doctor.docid
                                                WHERE schedule.scheduledate >= CURDATE()
                                                AND schedule.scheduledate <= DATE_ADD(CURDATE(), INTERVAL 7 DAY)
                                                ORDER BY schedule.scheduledate DESC";
                                                $result= $database->query($sqlmain);
                                                if($result->num_rows==0){
                                                    echo '<p> Il n\'y a rien à voir pour l\'instant
                                                    <br> revenez plus tard</p>';
                                                    
                                                }
                                                else{
                                                for ( $x=0; $x<$result->num_rows;$x++){
                                                    $row=$result->fetch_assoc();
                                                    $appoid=$row["appoid"];
                                                    $scheduleid=$row["scheduleid"];
                                                    $title=$row["title"];
                                                    $docname=$row["docname"];
                                                    $scheduledate=$row["scheduledate"];
                                                    $scheduletime=$row["scheduletime"];
                                                    $pname=$row["pname"];
                                                    $apponum=$row["apponum"];
                                                    $appodate=$row["appodate"];
                                                    echo'
                                                    <tr>
                                                    <th>'.$apponum.'</th>
                                                    <th>'.substr($pname,0,25).'</th>
                                                    <th>'.substr($docname,0,25).'</th>
                                                    <th>'.substr($title,0,15).'</th>

                                                    </tr>
                                                    ';
                                                }
                                                }
                                            ?>
                                        </tbody>
                                        </table>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
                                        <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12 12 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A20 20 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a20 20 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
                                        </svg>
                                        <i class="bi bi-flag-fill"></i>
                                        </div>
                                </div>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">9+</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="setting.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Docteurs</h1>
                                <p class="heading-sub12" style="padding: 0;margin: 0;">
                                Date du jour
                                </p>
                                <p class="heading-sub12" style="padding: 0;margin: 0;">
                                    <?php 
                                date_default_timezone_set('Asia/Kolkata');
                                $today = date('Y-m-d');
                                echo $today;
                                $patientrow = $database->query("select  * from  patient;");
                                $doctorrow = $database->query("select  * from  doctor;");
                                $allappo=$database->query("select * from appointment");
                                $alluser=$database->query("select * from webuser");
                                $allspec=$database->query("select * from specialties");
                                $appointmentrow = $database->query("SELECT  * from  appointment where appodate>=CURDATE() AND appodate <= DATE_ADD(CURDATE(), INTERVAL 7 DAY);");
                                $schedulerow = $database->query("SELECT  * from  schedule where scheduledate=CURDATE() AND scheduledate <= DATE_ADD(CURDATE(), INTERVAL 7 DAY);");
                                ?>
                                </p>
                        <a href="#" data-toggle="modal" id="openFormBtn" data-target="#form_doctor" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-node-plus-fill" viewBox="0 0 16 16">
                        <path d="M11 13a5 5 0 1 0-4.975-5.5H4A1.5 1.5 0 0 0 2.5 6h-1A1.5 1.5 0 0 0 0 7.5v1A1.5 1.5 0 0 0 1.5 10h1A1.5 1.5 0 0 0 4 8.5h2.025A5 5 0 0 0 11 13m.5-7.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2a.5.5 0 0 1 1 0"/>
                        </svg>
                        <i class="bi bi-node-plus-fill"></i> Ajouter un docteur</a>
                    </div>
                    <!-- Content Row -->
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12"  width="100%">
                            <div class="card shadow mb-12"  width="100%">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"  width="100%">
                                    <h6 class="m-0 font-weight-bold text-primary">Docteurs (<?php echo $doctorrow->num_rows  ?>)</h6>
                                </div>
                                <?php
                                    if($_POST){
                                        $keyword=$_POST["search"];
                                        
                                        $sqlmain= "select * from doctor where docemail='$keyword' or docname='$keyword' or docname like '$keyword%' or docname like '%$keyword' or docname like '%$keyword%'";
                                    }else{
                                        $sqlmain= "select * from doctor order by docid desc";

                                    }



                                ?>
                                <div class="card-body" >
                                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                    <thead>
                                    <th>Docteur</th>
                                    <th>Email</th>
                                    <th>Spécialité</th>
                                    <th>NIC</th>
                                    <th>Numero</th>
                                    <th class="text-center">Actions</th>
                                    </thead>
                                    <tbody>
                                    <?php                               
                                        $result= $database->query($sqlmain);
                                        for ( $x=0; $x<$result->num_rows;$x++){
                                            $row=$result->fetch_assoc();
                                            $docid=$row["docid"];
                                            $name=$row["docname"];
                                            $email=$row["docemail"];
                                            $spe=$row["specialties"];
                                            $docnic=$row["docnic"];
                                            $doctel=$row["doctel"];
                                            $spcil_res= $database->query("select sname from specialties where id='$spe'");
                                            $spcil_array= $spcil_res->fetch_assoc();
                                            $spcil_name=$spcil_array["sname"];
                                            echo '<tr>
                                            <td> &nbsp;'.
                                            substr($name,0,30)
                                            .'</td>
                                            <td>
                                            '.substr($email,0,20).'
                                            </td>
                                            <td>
                                            '.substr($spcil_name,0,20).'
                                            </td>
                                            <td>
                                            '.substr($docnic,0,20).'
                                            </td>
                                            <td>
                                            '.substr($doctel,0,20).'
                                            </td>
                                            <td>
                                                <div style="display:flex;justify-content: center;">
                                                    <a href="#" class="non-style-link edit-doctor" data-id='.$docid.'>
                                                        <button class="btn btn-primary">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </button>
                                                    </a>
                                                       
                                                    <a href="#" class="view-doctor" data-id='.$docid.'>
                                                        <button  class="btn btn-success">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </a>
                                                       
                                                    <a href="#" class="non-style-link" onclick="confirmDeletion('.$docid.', \''.$name.'\')">
                                                        <button class="btn btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>

                                        </tr>';
                                        }
                                            
                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <script>
                                    $(document).ready(function() {
                                        $('#dataTable1').DataTable({
                                            dom: 'Bfrtip',
                                            buttons: [
                                                {
                                                    extend: 'copy',
                                                    exportOptions: {
                                                        columns: ':not(:last)' // Exclut la dernière colonne (Actions)
                                                    }
                                                },
                                                {
                                                    extend: 'print',
                                                    exportOptions: {
                                                        columns: ':not(:last)' // Exclut la dernière colonne (Actions)
                                                    }
                                                },
                                                'excel', // Ajoute un bouton pour exporter vers Excel
                                                'csv', // Ajoute un bouton pour exporter vers CSV
                                                'pdf' // Ajoute un bouton pour exporter vers PDF
                                            ]
                                        });
                                    });
                                </script>
                                </div>
                                        <script>
                                        function confirmDeletion(docid, name) {
                                            Swal.fire({
                                                title: 'Êtes-vous sûr ?',
                                                text: `Vous voulez supprimer ce docteur (${name}) ?`,
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Oui, supprimer',
                                                cancelButtonText: 'Non, annuler'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = `delete-doctor.php?id=${docid}`;
                                                }
                                            });
                                        }
                                        </script>

                            </div>
                        </div>
                    </div>
            </div>
            
        <script>
        document.querySelectorAll('.edit-doctor').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                var docId = this.getAttribute('data-id');
        // Use AJAX to get doctor details
        fetch('view_doctor.php?id=' + docId)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    var doctor = data.data;
                    Swal.fire({
                        title: 'Modifier les détails du docteur',
                        html: `
                            <form id="edit-doctor-form">
                            <div class="container mt-5" style="text-align: left;" >
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    Modifier Docteur
                                </div>
                                <div class="card-body">
                                    <form id="edit-doctor-form">
                                        <input type="hidden" name="id00" value="${doctor.docid}">
                                        <input type="hidden" name="oldemail" value="${doctor.email}">
                                        
                                        <div class="form-group">
                                            <label for="email" class="form-label form-label-inline" style="text-align: center;">Email: </label>
                                            <input type="email" name="email" class="form-control form-control-user" value="${doctor.email}" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="name" class="form-label form-label-inline" style="text-align: center;">Nom: </label>
                                            <input type="text" name="name" class="form-control form-control-user" value="${doctor.name}" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="nic" class="form-label form-label-inline" style="text-align: center;">NIC: </label>
                                            <input type="text" name="nic" class="form-control form-control-user" value="${doctor.nic}" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="Tele" class="form-label form-label-inline" style="text-align: center;">Téléphone: </label>
                                            <input type="tel" name="Tele" class="form-control form-control-user" value="${doctor.tele}" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="spec" class="form-label form-label-inline" style="text-align: center;">Spécialités: </label>
                                            <select name="spec" class="form-control form-control-user">
                                                ${data.specialties.map(spec => `<option value="${spec.id}" ${spec.id == doctor.specialty ? 'selected' : ''}>${spec.name}</option>`).join('')}
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="password" class="form-label form-label-inline" style="text-align: center;">Mot de passe: </label>
                                            <input type="password" name="password" class="form-control form-control-user" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="cpassword" class="form-label form-label-inline" style="text-align: center;">Confirmer le mot de passe: </label>
                                            <input type="password" name="cpassword" class="form-control form-control-user" required>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </form>
                        `,
                        showCancelButton: true,
                        confirmButtonText: 'Enregistrer',
                        preConfirm: () => {
                            const form = Swal.getPopup().querySelector('#edit-doctor-form');
                            const formData = new FormData(form);
                            return fetch('edit-doc.php', {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (!data.success) {
                                    throw new Error(data.message);
                                }
                                return data;
                            })
                            .catch(error => {
                                Swal.showValidationMessage(`Request failed: ${error}`);
                            });
                        }
                    }).then(result => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: 'Succès!',
                                text: 'Les détails du docteur ont été mis à jour.',
                                icon: 'success'
                            }).then(() => {
                                location.reload();
                            });
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Erreur',
                        text: data.message,
                        icon: 'error'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    title: 'Erreur',
                    text: 'Une erreur s\'est produite lors de la récupération des détails.',
                    icon: 'error'
                });
            });
    });
});
</script>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Projet 2024</span>
                    </div>
                </div>
            </footer>

        </div>

    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pret a quitter le site?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Appuyer "Se deconnecter" si vous etes pret a mettre fin a votre actuelle session</div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Anuller</button>
                    <a class="btn btn-primary" href="login.php">Se deconnecter</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>
<?php
	//doctor Form
	include_once("./templates/doctor.php");
	 ?>
     <?php
	//update doctor Form
	include_once("./templates/view_doctor.php");
	 ?>
</html>