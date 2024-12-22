<?php 
$title="Catégorie | Ajouter Catégories";
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
                            <h3 class="page-title">Modifier une catégorie</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php?action=category_list">Liste Catégories</a></li>
                                <li class="breadcrumb-item active">Modifier Catégorie</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="index.php?action=edit_category_book" method="post">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title"><span>Modifier une Catégorie</span></h5>
                                        </div>
                                        <input type="hidden" name="category_id" value="<?= $categorie["category_id"]?>">
                                        <div class="col-12 col-sm-12">
                                            <div class="form-group local-forms">
                                                <label>Nom de la category <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" name="name_category" value="<?= $categorie["name_category"]?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="student-submit">
                                                <button type="submit" class="btn btn-primary" name="modifier">Modifier</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

  
<?php $content=ob_get_clean();?>
<?php require_once("views/admin/components/layout_biblio.php")?>
