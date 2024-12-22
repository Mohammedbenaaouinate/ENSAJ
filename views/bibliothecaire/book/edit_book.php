<?php 
$title="Bouquin | Ajouter Bouquin";
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
                <li >
                    <a href="index.php?action=category_list"><i class="fa fa-list-alt"></i> <span>Catégorie</span></a>
                </li>
                <li class="submenu active">
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
                            <h3 class="page-title">Modifier Bouquin</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php?action=show_all_book">Les Bouquins</a></li>
                                <li class="breadcrumb-item active">Modifier Bouquin</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="index.php?action=edit_book" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title"><span>Modifier bouquin</span></h5>
                                        </div>
                                        <input type="hidden" value="<?= $select_single_book["book_id"]; ?>" name="id">
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Nom de bouquin<span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" value="<?php echo $select_single_book["book_title"];?>" name="name_book">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>ISBN <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" value="<?php echo $select_single_book["isbn"];?>" name="isbn">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms" >
                                                <label for="image_livre">Image de livre <span class="login-danger">*</span></label>
                                                <input type="file" class="form-control" name="image_book" id="image_livre" style="padding-top: 15px;" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Quantité <span class="login-danger">*</span></label>
                                                <input type="number" class="form-control" id="image_livre" style="padding-top: 15px;" value="<?php echo $select_single_book["quantity"];?>" min="0" name="quantity">

                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Auteur <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Stendhal" value="<?php echo $select_single_book["author"];?>" name="author">
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Catégorie <span class="login-danger">*</span></label>
                                                <select class="form-control select" name="category">
                                                    <?php foreach ($categories as $result) { ?>
                                                        <?php if($result["category_id"]==$select_single_book["category_id"]){?>
                                                            <option value="<?= $result["category_id"]; ?>" selected><?= $result["name_category"]; ?></option>
                                                        <?php }else{ ?>
                                                            <option value="<?= $result["category_id"]; ?>"><?= $result["name_category"]; ?></option>

                                                        <?php } ?>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-12">
                                            <div class="form-group local-forms">
                                                <label>Description <span class="login-danger">*</span></label>
                                                <textarea rows="5" cols="5" class="form-control"
                                                 name="description"><?php echo $select_single_book["description"];?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="student-submit">
                                                <button type="submit" class="btn btn-primary">Modifier</button>
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
