<?php
    include "GestionEmployes.php";
    $gestionEmployes = new GestionEmployes();

    if(!empty($_POST)){      
        $cherchInput = $_POST["cherchInput"] ;
        $data = $gestionEmployes->RechercheParInput($cherchInput);
    }
        else{$data = $gestionEmployes->afficher();}



?>
   
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Forms</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link rel="stylesheet" href="css/costumer.css">
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>
<!-- 
<body class="animsition">
    <div class="page-wrapper">
         HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images//PME-logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div>
            <div class="menu-sidebar__content  js-scrollbar1 ">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                           
                        <li>
                            <a href="table.php">
                                <i class="fas fa-table"></i>Tableau</a>
                        </li>
                        <li class="active">
                            <a class="aIN" href="Ajoute.php">
                                <i class="far fa-check-square"></i>Insérer</a>
                        </li>
                        <li>
                            <a href="Recherche.php">
                                <i class="fas fa-search"></i>Recherche</a>
                                
                        </li>
                        </li>
                     
                    </ul>     
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                           
                        <form class="form-header" action="" method="POST">
                               
                            </form>
                            <div>
                                <a href="index.php" class=""> déconnecter</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </header> -->
        <!-- PAGE CONTAINER-->
       

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                 <div>
                    <div class="row">
                        <p class="titre text-left ">
                            <strong>Entrez le nom ou la Matricule ou le département de l'employé:</strong>
                        </p >
                     <div>
                         <form class="form-header recherchinput row" action="" method="POST">
                             <input class="au-input au-input--xl " type="text" name="cherchInput" placeholder="Recherche  " />
                            <button class="au-btn--submit " type="submit">
                            <i class="zmdi zmdi-search"></i>
                             </button>
                            <a href="recherche.php">
                           
                            <svg lass="svgX" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                 <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                          </a>
                         </form>
                       </div>

                     </div>     
                    <div class="container-fluid">
                   

                        <div class="row rowTable">
                            <div class="col-lg-12">
                                
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped ">
                                        <thead>
                                            <tr>
                                                <th>Matricule</th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>naissance</th>
                                                <th>Département</th>
                                                <th>Salaire</th>
                                                <th>Fontion</th>
                                                <th>Photo</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php
                                                 foreach($data as $value){
                                             ?>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                
                                                      <td  ><?= $value->getmatricule() ?></td>
                                                      <td><?= $value->getNom() ?></td>
                                                      <td><?= $value->getPrenom() ?></td>
                                                      <td><?= $value->getdate_de_naissance() ?></td>
                                                      <td><?= $value->getdepartement() ?></td>
                                                      <td><?= $value->getsalaire() ?></td>
                                                      <td><?= $value->getfonction() ?></td>
                                                      <td><?= $value->getphoto() ?></td>
                                                
                                                
                                                <td> 
                                                    <a href="editer.php?id=<?php echo $value->getId() ?>">Éditer</a>
                                                    <a href="suprimmer.php?id=<?php echo $value->getId() ?>">Supprime</a>
                                                </td>
                                            </tr>
                                           
                                               <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                                        
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
