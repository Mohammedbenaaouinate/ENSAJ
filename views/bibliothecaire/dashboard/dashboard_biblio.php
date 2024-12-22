<?php 
$title="Bibliothécaire | Dashboard";
ob_start();

?>

<head>

    <style>
        .img_book_dashboard{
            height: 40px !important;
            width: 40px !important;
        }
        .image_transition{
        width:100% !important; 
        height: 400px !important;
        }
    </style>
</head>

<body>


<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li class="submenu active">
                    <a href="index.php?action=dashboard_bibliothecaire"><i class="feather-grid"></i> <span> Dashboard</span></a>
                </li>
                <li >
                    <a href="index.php?action=category_list"><i class="fa fa-list-alt"></i> <span>Catégorie</span></a>
                </li>
                <li >
                    <a href="#"><i class="fa fa-book"></i> <span>Bouquin</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=show_all_book">Tous les Bouquins</a></li>
                        <li><a href="index.php?action=book_available">Bouquin Disponible</a></li>
                    </ul>
                </li>

                <li >
                    <a href="index.php?action=list_request"><i class="fas fa-hand-holding"></i> <span> Demandes</span></a>

                </li>

                <li>
                    <a href="index.php?action=taken_book"><i class="fas fa-book-reader"></i> <span>Bouquin empruntés</span></a>

                </li>
                <li>
                    <a href="index.php?action=list_rejet"><i class="fas fa-times-circle"></i> <span>Demandes rejetès</span></a>
                </li>

                <li>
                    <a href="index.php?action=logout_users"><i class="fas fa-sign-out-alt"></i> <span>Déconnexion</span></a>
                </li>
    
            </ul>
        </div>
    </div>
</div>


        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">Bonjour <?= $_SESSION["firstname"]." ".$_SESSION["fname"]?> !</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?action=dashboard_bibliothecaire">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if (isset($_SESSION['message'])): 
                    if($_SESSION['message_type'] == 'success'){?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong><?php echo $_SESSION['message'];?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php }elseif($_SESSION['message_type'] == 'error'){?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?php echo $_SESSION['message'];?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php }?>
                    <?php unset($_SESSION['message']); ?>
                    <?php unset($_SESSION['message_type']); ?>
                <?php endif; ?>

                <?php foreach($verify_emprunted_book as $verf){
                    $year=date('Y');
                    $month=date('m');
                    $day=date('d');
                    $date=$year."-".$month."-".$day;
                ?>
                    <?php if($verf["date_retour"] <= $date){ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>l'étudiant "<?= $verf["firstname"]." ".$verf["lastname"];?>" doit retourné le bouquin : <?= $verf["book_title"];?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php }?>
                <?php }?>

                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Totale bouquin</h6>
                                        <h3><?= $total?></h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="assets/img/icons/teacher-icon-02.svg" alt="Dashboard Icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Bouqin Disponible</h6>
                                        <h3><?= $available_book?>/<?= $total?></h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="assets/bibliothecaires/img/book_green.png" alt="Dashboard Icon" class="img_book_dashboard">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Bouqin Emprunté</h6>
                                        <h3><?= $emprunted_book?>/<?= $total?></h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="assets/bibliothecaires/img/book_red.png" alt="Dashboard Icon" class="img_book_dashboard">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Demandes</h6>
                                        <h3><?= $request?></h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="assets/img/icons/student-icon-01.svg" alt="Dashboard Icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"> 
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid image_transition" src="assets/bibliothecaires/img/test.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid image_transition" src="assets/bibliothecaires/img/b.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid image_transition" src="assets/bibliothecaires/img/image3.jpg" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>

            </div>

            <footer>
                <p>COPYRIGHT © 2024 ECOLE NATIONALE DES SCIENCES APPLIQUÉES EL JADIDA</p>
            </footer>

        </div>

<?php $content=ob_get_clean();?>
<?php require_once("views/admin/components/layout_biblio.php")?>

   