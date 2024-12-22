<?php 
$title="Bibliothécaire | Bouquins Disponible";
ob_start();

?>
<head>
    <style>
        .image_book{
            height:480px !important;
        }
        .rechercher{
            background-color:blue;
            padding:11px;
            color:white;
            border-radius: 5px;
            border: none;
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

                <div class="row">
                    <div class="col-md-9">
                        <ul class="list-links mb-4">
                            <li><a href="index.php?action=show_all_book">Tous les bouquins</a></li>
                            <li class="active"><a href="index.php?action=book_available">Bouquin Disponibles</a></li>
                            <!-- <li><a href="not_availabale_book.html">bouquin Non Disponibles</a></li> -->
                        </ul>
                    </div>
                    <div class="col-md-3 text-md-end">
                        <a href="index.php?action=show_add_book" class="btn btn-primary btn-blog mb-3"><i
                                class="feather-plus-circle me-1"></i> Ajouter</a>
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
            <?php } else { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong><?php echo $_SESSION['message']; ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php } ?>
            <?php unset($_SESSION['message']); ?>
            <?php unset($_SESSION['message_type']); ?>
        <?php endif; ?>
    <form action="index.php?action=search_available_book" method="post">

        <div class="student-group-form">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            
                            <div class="form-group local-forms">
                                    <select class="form-control select" name="category">
                                        <option>Rechercher par la catégorie de bouquin</option>
                                            <?php foreach ($categories as $result) { ?>
                                                    <option value="<?= $result["category_id"]; ?>"><?= $result["name_category"]; ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                        </div>


                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Rechercher par ISBN" name="isbn">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Rechercher par Nom" name="name">
                            </div>
                        </div>
                    
                        <div class="col-lg-2">
                            <div class="search-student-btn">
                                <button type="submit" class="rechercher" name="search">Rechercher</button>
                            </div>
                        </div>
                    </div>
                </div>
    </form>        
                <div class="row">
                    <?php foreach($all_book as $book){?>
                    <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                        <div class="blog grid-blog flex-fill">
                            <div class="blog-image">
                                <a href=""><img class="img-fluid image_book" src="assets/bibliothecaires/book/<?= $book["book_image"]; ?>"
                                        alt="Post Image"></a>
                                        <div class="blog-views" style="height:25px;font-size:16px">
                                            <i class="feather-book me-1"></i> <?= $book["quantity_taken"]; ?>
                                        </div>
                                
                            </div>
                            <div class="blog-content">
                                <ul class="entry-meta meta-item">
                                    <li>
                                        <div class="post-author">
                                                
                                                <span>
                                                    <span class="post-title">ISBN:<?= $book["isbn"]; ?></span>
                                                    <span class="post-date"><i class="far fa-clock"></i> <?= $book["date_pub"]; ?></span>
                                                </span>
                                        </div>
                                    </li>
                                </ul>
                                <h3 class="blog-title"><a href="blog-details.html"><?= $book["book_title"]; ?></a></h3>
                                <span class="post-title">Auteur : <?= $book["author"]; ?></span>
                                <p style="width:350px;overflow-y: hidden;"><?= $book["description"]; ?></p>
                            </div>
                            <div class="row">
                                <div class="edit-options">
                                    <div class="edit-delete-btn">
                                        <a href="index.php?action=show_edit_book&id=<?= $book["book_id"]; ?>" class="text-success"><i
                                                class="feather-edit-3 me-1"></i> Editer</a>
                                        <a onclick="DeleteBook(<?= $book['book_id']; ?>)" href="#" class="text-danger" 
                                            ><i class="feather-trash-2 me-1"></i>Supprimer</a>
                                    </div>
                                    <?php if($book["status"]==1){?>
                                    <div class="text-end active-style">
                                        <a href="javascript:void(0);" class="text-success" data-bs-toggle="modal"
                                            data-bs-target="#deleteNotConfirmModal"><i class="feather-eye me-1"></i>
                                            Activer</a>
                                    </div>
                                    <?php }else{?>
                                        <div class="text-end active-style">
                                        <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteNotConfirmModal"><i class="feather-eye-off me-1"></i>
                                            Désactiver</a>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php }?>


                </div>
                        <script>
                            function DeleteBook($id){
                                if(confirm("Etes vous sur de vouloir supprimer ce bouquin")){
                                    window.location.href ="index.php?action=delete_book&id="+$id;
                                }
                            }
                        </script>
                


            </div>
        </div>
<?php $content=ob_get_clean();?>
<?php require_once("views/admin/components/layout_biblio.php")?>
