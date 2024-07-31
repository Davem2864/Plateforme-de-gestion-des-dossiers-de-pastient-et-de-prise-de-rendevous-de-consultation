<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Docteur</title>
    <style>
        .profile-img {
            max-width: 150px;
            border-radius: 50%;
        }
        .tab-content {
            margin-top: 20px;
        }
        .profile-img {
        width: 150px; /* Ajustez la largeur selon vos besoins */
        height: 150px; /* Ajustez la hauteur selon vos besoins */
        object-fit: cover; /* Pour s'assurer que l'image couvre entièrement le conteneur sans déformation */
        border-radius: 50%; /* Pour rendre l'image circulaire */
    }

    </style>
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
if (isset($_SESSION["user"])) {
    if ($_SESSION["user"] == "" || $_SESSION['usertype'] != 'p') {
        header("location: ../login.php");
    } else {
        $useremail = $_SESSION["user"];
    }
} else {
    header("location: ../login.php");
}

//import database
include("../connection.php");

$sqlmain = "SELECT * FROM patient WHERE pemail=?";
$stmt = $database->prepare($sqlmain);
$stmt->bind_param("s", $useremail);
$stmt->execute();
$userrow = $stmt->get_result();
$userfetch = $userrow->fetch_assoc();

if ($userfetch) {
    $userid = $userfetch["pid"];
    $username = $userfetch["pname"];
    $profile = $userfetch["profile"];
} else {
    // Handle the case where no user was found
    // Redirect to an error page or display an error message
    header("location: ../login.php");
    exit();
}

// The rest of your code goes here
?> 
<!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15"style="padding-left:30px;">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-4"> 
                <?php echo $username  ?> <sup>pt</sup>
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
                <?php echo substr($useremail ,0,10); ?> <sup>gmail</sup>
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
                    <span>Mes Apartenances</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header text-primary">Les objets:</h6>
                        <a class="collapse-item" href="doctor.php">Les Docteurs</a>
                        <a class="collapse-item" href="schedule.php">Les Séances</a>
                        <a class="collapse-item" href="appointment.php">Mes Rendez-vous</a>
                        <a class="collapse-item" href="prescription.php">Mes prescriptions</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse-fill" viewBox="0 0 16 16">
                    <path d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9z"/>
                    <path d="M.88 8C-2.427 1.68 4.41-2 7.823 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8z"/>
                    </svg>
                    <i class="bi bi-heart-pulse-fill"></i>
                    <span>mes cas Traités</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header text-primary">Mes traitements & infos:</h6>
                        <a class="collapse-item" href="traitement.php">Mes Traitements</a>
                        <a class="collapse-item" href="post.php">Les Posts d'admin</a>
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
                        <h6 class="collapse-header text-primary">Patient : <?php echo $username ?></h6>
                        <a class="collapse-item" href="docp.php">Mon Dossier</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header text-primary">Parler a L'hopital </h6>
                        <a class="collapse-item" href="post_pt.php">Ecrire a un Docteur</a>
                        <a class="collapse-item" href="rapport.php">Deposer une plainte</a>
                        <a class="collapse-item" href="reponse.php">Reponses des plaintes</a>
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
                                        echo '<datalist id="doctors">';
                                        $list11 = $database->query("select  pname,pemail from  patient;");
        
                                        for ($y=0;$y<$list11->num_rows;$y++){
                                            $row00=$list11->fetch_assoc();
                                            $d=$row00["pname"];
                                            $c=$row00["pemail"];
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
                                        echo '<datalist id="doctors">';
                                        $list11 = $database->query("select  pname,pemail from  patient;");
        
                                        for ($y=0;$y<$list11->num_rows;$y++){
                                            $row00=$list11->fetch_assoc();
                                            $d=$row00["pname"];
                                            $c=$row00["pemail"];
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
                                <span class="badge badge-danger badge-counter">
                                <?php 
                                $today = date('Y-m-d');
                                $schedulerow = $database->query("select * from schedule inner join appointment on schedule.scheduleid=appointment.scheduleid inner join patient on patient.pid=appointment.pid inner join doctor on schedule.docid=doctor.docid  where  patient.pid=$userid  and schedule.scheduledate>='$today' order by schedule.scheduledate asc");
                                ?><?php echo $schedulerow ->num_rows  ?></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in w-100" aria-labelledby="alertsDropdown" style="overflow-y: scroll;">
                                <h6 class="dropdown-header">
                                    Mes Rendez-vous
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Mes Rendez-vous qui prennent fin la semaine allant jusqu'à <?php
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
                                <a class="dropdown-item d-flex align-items-center" href="#" style="overflow-y: scroll;">
                                <div class="table-responsive">
                                            <table class="table table-bordered table-sm" style="overflow-y: scroll;" id="dataTable"cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Numero de Rendez-vous</th>
                                                <th>Titre de la session</th>
                                                <th>Docteur en charge</th>
                                                <th>Date & heure</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Numero de Rendez-vous</th>
                                                <th>Titre de la session</th>
                                                <th>Docteur en charge</th>
                                                <th>Date & heure</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                                $nextweek=date("Y-m-d",strtotime("+1 week"));
                                                $today = date('Y-m-d');
                                                $sqlmain = "select * from schedule inner join appointment on schedule.scheduleid=appointment.scheduleid inner join patient on patient.pid=appointment.pid inner join doctor on schedule.docid=doctor.docid  where  patient.pid=$userid  and schedule.scheduledate>='$today' order by schedule.scheduledate asc";
                                                $result= $database->query($sqlmain);
                                                for ( $x=0; $x<$result->num_rows;$x++){
                                                    $row=$result->fetch_assoc();
                                                    $scheduleid=$row["scheduleid"];
                                                    $title=$row["title"];
                                                    $apponum=$row["apponum"];
                                                    $docname=$row["docname"];
                                                    $scheduledate=$row["scheduledate"];
                                                    $scheduletime=$row["scheduletime"];
                                                    echo '<tr>
                                                        <td style="padding:30px;font-size:25px;font-weight:700;"> &nbsp;'.
                                                        $apponum
                                                        .'</td>
                                                        <td style="padding:20px;"> &nbsp;'.
                                                        substr($title,0,30)
                                                        .'</td>
                                                        <td>
                                                        '.substr($docname,0,20).'
                                                        </td>
                                                        <td style="text-align:center;">
                                                            '.substr($scheduledate,0,10).' '.substr($scheduletime,0,5).'
                                                        </td>
                                                    </tr>';
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
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username; ?></span>
                            <img class="img-profile rounded-circle" src="<?php echo $profile; ?>">
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
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                                <p class="heading-sub12" style="padding: 0;margin: 0;">
                                Date du jour
                                </p>
                                <p class="heading-sub12" style="padding: 0;margin: 0;">
                                    <?php 
                                date_default_timezone_set('Asia/Kolkata');
                                $today = date('Y-m-d');
                                echo $today;
                                ?>
                                </p>
                    </div>
                    <!-- Content Row -->
                        <!-- Area Chart -->
                        <div class="card-body d-flex flex-column">
                    <!-- Nav Tabs -->
                    <ul class="nav nav-tabs" id="profileTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="view-tab" data-toggle="tab" href="#viewProfile" role="tab" aria-controls="viewProfile" aria-selected="true">View Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="edit-tab" data-toggle="tab" href="#editProfile" role="tab" aria-controls="editProfile" aria-selected="false">Edit Profile</a>
                        </li>
                    </ul>
                    <div class="container mt-5" style="max-height: 500px; overflow-y: auto; border: 1px solid #ccc; padding: 10px; background-color: #f8f9fa; border-radius: 8px;">
                        <!-- Tab Content -->
                        <div class="tab-content" id="profileTabContent">
                            <!-- View Profile Tab -->
                            <div class="tab-pane fade show active" id="viewProfile" role="tabpanel" aria-labelledby="view-tab">
                                <div class="card mt-3">
                                    <div class="card-body d-flex flex-column align-items-center">
                                        <img src="" alt="Profile Picture" class="profile-img" id="profileImg">
                                        <h5 class="card-title mt-3" id="patientName"></h5>
                                        <p class="card-text" id="patientEmail"></p>
                                        <p class="card-text" id="patientAddress"></p>
                                        <p class="card-text" id="patientNic"></p>
                                        <p class="card-text" id="patientDob"></p>
                                        <p class="card-text" id="patientTel"></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Edit Profile Tab -->
                            <div class="tab-pane fade" id="editProfile" role="tabpanel" aria-labelledby="edit-tab">
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <form id="editProfileForm">
                                            <div class="form-group">
                                                <label for="editProfileImg">Profile Picture</label>
                                                <input type="file" class="form-control-file" id="editProfileImg">
                                            </div>
                                            <div class="form-group">
                                                <label for="editName">Name</label>
                                                <input type="text" class="form-control" id="editName" placeholder="Enter name">
                                            </div>
                                            <div class="form-group">
                                                <label for="editEmail">Email</label>
                                                <input type="email" class="form-control" id="editEmail" placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <label for="editAddress">Address</label>
                                                <input type="text" class="form-control" id="editAddress" placeholder="Enter address">
                                            </div>
                                            <div class="form-group">
                                                <label for="editNic">NIC</label>
                                                <input type="text" class="form-control" id="editNic" placeholder="Enter NIC">
                                            </div>
                                            <div class="form-group">
                                                <label for="editDob">Date of Birth</label>
                                                <input type="date" class="form-control" id="editDob">
                                            </div>
                                            <div class="form-group">
                                                <label for="editTel">Telephone</label>
                                                <input type="text" class="form-control" id="editTel" placeholder="Enter telephone">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- jQuery and Bootstrap Bundle (including Popper.js) -->
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                    <!-- Custom JavaScript -->
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var userId = <?php echo $userid;?>; // Replace with actual user ID from session or context

                            // Fetch patient data
                            fetch(`get_patient_profile.php?id=${userId}`)
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        var patient = data.patient;
                                        document.getElementById('profileImg').src = patient.profile;
                                        document.getElementById('patientName').innerText = patient.pname;
                                        document.getElementById('patientEmail').innerText = `Email: ${patient.pemail}`;
                                        document.getElementById('patientAddress').innerText = `Address: ${patient.paddress}`;
                                        document.getElementById('patientNic').innerText = `NIC: ${patient.pnic}`;
                                        document.getElementById('patientDob').innerText = `Date of Birth: ${patient.pdob}`;
                                        document.getElementById('patientTel').innerText = `Telephone: ${patient.ptel}`;
                                        
                                        // Fill the edit form
                                        document.getElementById('editName').value = patient.pname;
                                        document.getElementById('editEmail').value = patient.pemail;
                                        document.getElementById('editAddress').value = patient.paddress;
                                        document.getElementById('editNic').value = patient.pnic;
                                        document.getElementById('editDob').value = patient.pdob;
                                        document.getElementById('editTel').value = patient.ptel;
                                    } else {
                                        console.error('Error:', data.error);
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                });

                                        // Handle form submission
                                        document.getElementById('editProfileForm').addEventListener('submit', function(event) {
                                event.preventDefault();
                                
                                var formData = new FormData();
                                var profileImgFile = document.getElementById('editProfileImg').files[0];

                                // Check if an image is selected
                                if (profileImgFile) {
                                    formData.append('profileImg', profileImgFile);
                                } else {
                                    // If no file is selected, continue with the existing image URL
                                    formData.append('profileImg', document.getElementById('editProfileImg').value);
                                }

                                // Append the other form data
                                formData.append('id', userId);
                                formData.append('name', document.getElementById('editName').value);
                                formData.append('email', document.getElementById('editEmail').value);
                                formData.append('address', document.getElementById('editAddress').value);
                                formData.append('nic', document.getElementById('editNic').value);
                                formData.append('dob', document.getElementById('editDob').value);
                                formData.append('tel', document.getElementById('editTel').value);

                                 // Make an API call to update the profile
                                fetch('update_patient_profile.php', {
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Profile updated successfully',
                                            text: 'Your profile has been updated successfully!'
                                        }).then(() => {
                                            // Fetch updated profile data
                                            fetch(`get_patient_profile.php?id=<?php echo $userId; ?>`)
                                                .then(response => response.json())
                                                .then(data => {
                                                    if (data.success) {
                                                        var patient = data.patient;
                                                        document.getElementById('profileImg').src = patient.profile;
                                                        document.getElementById('patientName').innerText = patient.pname;
                                                        document.getElementById('patientEmail').innerText = `Email: ${patient.pemail}`;
                                                        document.getElementById('patientAddress').innerText = `Address: ${patient.paddress}`;
                                                        document.getElementById('patientNic').innerText = `NIC: ${patient.pnic}`;
                                                        document.getElementById('patientDob').innerText = `Date of Birth: ${patient.pdob}`;
                                                        document.getElementById('patientTel').innerText = `Telephone: ${patient.ptel}`;
                                                    } else {
                                                        console.error('Error:', data.error);
                                                    }
                                                })
                                                .catch(error => {
                                                    console.error('Error:', error);
                                                });
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error updating profile',
                                            text: data.error
                                        });
                                    }
                                })
                                .catch(error => {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'An unexpected error occurred',
                                        text: 'Please try again later.'
                                    });
                                    console.error('Error:', error);
                                });
                            });
                        });
                    </script>
                </div>
                    </div>
            </div>
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
                    <a class="btn btn-primary" href="../logout.php">Se deconnecter</a>
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
</html>