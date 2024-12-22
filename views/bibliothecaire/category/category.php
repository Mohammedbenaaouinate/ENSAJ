<?php 
$title="Catégorie | Liste Catégories";
ob_start();
?>



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
                <li class="submenu active">
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
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Catégorie</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php?action=category_list">Les Catégories</a></li>
                                <li class="breadcrumb-item active">Liste des catégories</li>
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
                                            <h3 class="page-title">Liste des catégories</h3>
                                        </div>
                                        <div class="col-auto text-end float-end ms-auto download-grp">
                                            <a href="index.php?action=show_add_category_book" class="btn btn-primary"><i
                                                    class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table
                                        class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                        <thead class="student-thread">
                                            <tr>
                                                <th>Name</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($categorie as $result){?>
                                            <tr>
                                                <td>
                                                    <h2>
                                                        <a><?= $result["name_category"]?></a>
                                                    </h2>
                                                </td>
                                                
                                                <td class="text-end">
                                                    <div class="actions">
                                                        <a href="index.php?action=show_edit_category_book&id=<?= $result["category_id"]?>" class="btn btn-sm bg-success-light me-2">
                                                            <i class="feather-edit"></i>
                                                        </a>
                                                        <a onclick="DeleteCategorie(<?= $result['category_id']?>)" href="#" class="btn btn-sm bg-danger-light">
                                                            <i class="feather-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php }?>

                                            
                                        </tbody>
                                    </table>
                                    <script>
                                        function DeleteCategorie($id){
                                            if(confirm("Etes vous sur de vouloir supprimer cette catégorie?")){
                                                window.location.href ="index.php?action=delete_category_book&id="+$id;
                                            }
                                        }
                                    </script>
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
