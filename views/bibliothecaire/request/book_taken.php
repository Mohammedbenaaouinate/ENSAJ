<?php 
$title="Bibliothécaire | Empruntés";
ob_start();

?>
<head>
    <style>
        .img_cercle{
            
            width:30px !important;
            height:30px !important;
        }
        .retourne{
            cursor: pointer;
        }
        .retourne:hover{
            background-color: rgb(9, 139, 61) !important;
        }
        .book_image{
            width:60px !important;
            height:80px !important;
        }
    </style>
</head>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li>
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

                <li class="submenu active">
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
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Les bouquins empruntés</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php?action=taken_book">Listes des bouquins empruntés</a></li>
                                <li class="breadcrumb-item active">Les bouquins empruntés</li>
                            </ul>
                        </div>
                    </div>
                </div>


                <?php if (isset($_SESSION['message'])) :
                    if ($_SESSION['message_type'] == 'success') { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong><?php echo $_SESSION['message']; ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } elseif ($_SESSION['message_type'] == 'error') { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?php echo $_SESSION['message']; ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>
                    <?php unset($_SESSION['message']); ?>
                    <?php unset($_SESSION['message_type']); ?>
                <?php endif; ?>

                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body">

                                <div class="page-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h3 class="page-title">Liste des bouquins empruntés </h3>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table
                                        class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                        <thead class="student-thread">
                                            <tr>
                                                <th>CNE</th>
                                                <th>Etudiant</th>
                                                <th>Classe</th>
                                                <th>Nom de Bouquin</th>
                                                <th>Date de retour</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($accept as $result){?>
                                            <tr>
                                                <td>
                                                    <h2>
                                                        <a><?= $result["massar_student"];?></a>
                                                    </h2>
                                                </td>
                                                <td><?= $result["firstname"]." ".$result["lastname"];?></td>
                                                <td><?= $result["class_name"];?></td>
                                                <td><img class="book_image" src="assets/bibliothecaires/book/<?= $result["book_image"]; ?>" alt=""><?= $result["book_title"];?></td>
                                                <td><?= $result["date_retour"];?></td>
                                                <td>
                                                    <img src="assets/bibliothecaires/circle_red.png" class="img_cercle" alt="" style="width:30px;height:30px">
                                                </td>
                                                <td>
                                                    <a href="index.php?action=returned&book_id=<?= $result["book_id"]; ?>&&etudiant=<?= $result["etudiant"]?>&&date=<?= $result["date_retour"];?>"><span class="badge badge-success retourne"><i class="feather-check" style="margin-right:5px"></i>Retourné</span></a>
                                                </td> 
                                            </tr>
                                            <?php }?>
                                              
                                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer>
                <p>COPYRIGHT © 2024 ECOLE NATIONALE DES SCIENCES APPLIQUÉES EL JADIDA</p>
            </footer>

        </div>

<?php $content=ob_get_clean();?>
<?php require_once("views/admin/components/layout_biblio.php")?>
