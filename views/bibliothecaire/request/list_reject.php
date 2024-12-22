<?php
$title = "Bibliothécaire | Demandes";
ob_start();

?>

<head>
    <style>
        .book_image {
            width: 60px !important;
            height: 80px !important;
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
                <li>
                    <a href="index.php?action=category_list"><i class="fa fa-list-alt"></i> <span>Catégorie</span></a>
                </li>
                <li>
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

                <li class="submenu active">
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
                    <h3 class="page-title">Listes des demandes Rejetés</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php?action=list_rejet">Les demandes</a></li>
                        <li class="breadcrumb-item active">Listes des demandes</li>
                    </ul>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Demandes des étudiants </h3>
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
                                        <th>Motif de rejet</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list as $result) { ?>
                                        <tr>
                                            <td>
                                                <h2>
                                                    <a><?= $result["massar_student"]; ?></a>
                                                </h2>
                                            </td>
                                            <td><?= $result["firstname"] . " " . $result["lastname"]; ?></td>
                                            <td><?= $result["class_name"]; ?></td>
                                            <td><img class="book_image" src="assets/bibliothecaires/book/<?= $result["book_image"]; ?>"><?= $result["book_title"]; ?></td>
                                            <td><?= $result["date_retour"]; ?></td>
                                            <td><a><span class="badge badge-danger retourne" style="font-size:12px"><?= $result["message"]; ?></span></a>
                                            </td>
                                        </tr>
                                    <?php } ?>

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

<?php $content = ob_get_clean(); ?>
<?php require_once("views/admin/components/layout_biblio.php") ?>