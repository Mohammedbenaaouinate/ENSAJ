<?php 
$title="Bibliothécaire | Profile";
ob_start();

?>
<head>
    <style>
       
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
                                <h3 class="page-title">Page Profile </h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?action=dashboard_bibliothecaire">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Page Profile</li>
                                </ul>
                            </div>
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
                                <?php } else { ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong><?php echo $_SESSION['message']; ?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>

                                <?php } ?>
                                <?php unset($_SESSION['message']); ?>
                                <?php unset($_SESSION['message_type']); ?>
                            <?php endif; ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="about-info">
                                    <h4>Profile <span><a href="javascript:;"></a></span></h4>
                                </div>
                                <div class="student-profile-head">
                                    <div class="profile-bg-img">
                                        <img src="assets/img/profile-bg.jpg" alt="Profile">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="profile-user-box">
                                                <div class="profile-user-img">
                                                    <img style="height: 160px;" src="assets/bibliothecaires/<?= $profil_biblio["image_path"]?>" alt="Profile">
                                                    
                                                </div>
                                                <div class="names-profiles">
                                                    <h4><?= $profil_biblio["firstname"]." ".$profil_biblio["lastname"]?></h4>
                                                    <h5>Bibliothécaire</h5>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-4 col-md-4 d-flex align-items-center">
                                            <div class="follow-btn-group">
                                                <a class="btn btn-info follow-btns" href="index.php?action=dashboard_bibliothecaire">Allez à Dashboard</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="student-personals-grp">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="heading-detail">
                                                <h4>Informations personnelles :</h4>
                                            </div>
                                            <div class="personal-activity">
                                                <div class="personal-icons">
                                                    <i class="feather-user"></i>
                                                </div>
                                                <div class="views-personal">
                                                    <h4>Nom complet</h4>
                                                    <h5><?= $profil_biblio["firstname"]." ".$profil_biblio["lastname"]?></h5>
                                                </div>
                                            </div>
                                            
                                            <div class="personal-activity">
                                                <div class="personal-icons">
                                                    <i class="feather-phone-call"></i>
                                                </div>
                                                <div class="views-personal">
                                                    <h4>Télephone</h4>
                                                    <h5><?= $profil_biblio["phone_number"]?></h5>
                                                </div>
                                            </div>
                                            <div class="personal-activity">
                                                <div class="personal-icons">
                                                    <i class="feather-mail"></i>
                                                </div>
                                                <div class="views-personal">
                                                    <h4 >Email</h4>
                                                    <h5 style="color:blue"><?= $profil_biblio["email"]?></h5>
                                                </div>
                                            </div>
                                        
                                           
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-lg-8">
                                <div class="student-personals-grp">
                                    <div class="card mb-0">
                                        <div class="card-body">
                                            <div class="heading-detail">
                                                <h4 style="border-bottom: 2px solid rgb(27, 106, 244);padding-bottom: 5px;">Modifier profile</h4>
                                            </div>
                                            <form action="index.php?action=edit_profil_biblio" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="biblio_id" value="<?= $profil_biblio["employee_id"]?>">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-2">Prénom</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="firstname" value="<?= $profil_biblio["firstname"]?>">
                                                    </div>
                                                    <label class="col-form-label col-md-1">Nom</label>
                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control" name="lastname" value="<?= $profil_biblio["lastname"]?>">
                                                    </div>
                                                </div>
                                               

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-2">Email</label>
                                                    <div class="col-md-10">
                                                        <input type="email" class="form-control" name="email" value="<?= $profil_biblio["email"]?>">
                                                    </div>
                                                </div>
                                            
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-2">Téléphone</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="phone" value="<?= $profil_biblio["phone_number"]?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-2">Image</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" type="file" name="image_biblio" accept="image/*">
                                                    </div>
                                                </div>
                                                <button type="submit" name="edit" class="btn btn-primary mb-4">Modifier</button>

                                            </form>

                                                <div class="heading-detail">
                                                    <h4 style="border-bottom: 2px solid rgb(27, 106, 244);padding-bottom: 5px;padding-top: 5px;">Partie Confidentielles</h4>
                                                </div>
                                                <form action="index.php?action=edit_pass_biblio" method="post">
                                                    <input type="hidden" name="biblio_id" value="<?= $profil_biblio["employee_id"]?>">

                                                        <div class="form-group">
                                                            <label>Ancien Mot de passe</label>
                                                            <input type="password" class="form-control" name="old_password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nouveau Mot de passe</label>
                                                            <input type="password" class="form-control" name="new_password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Confirmation de Mot de passe</label>
                                                            <input type="password" class="form-control" name="confirm_password">
                                                        </div>
                                                    
                                                    
                                                        <button type="submit" name="edit_pass" class="btn btn-primary">Modifier</button>
                                                </form>
                                                <!-- <div class="form-group">
                                                    <label>Ancien Mot de passe</label>
                                                    <input type="password" class="form-control" name="old_password">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nouveau Mot de passe</label>
                                                    <input type="password" class="form-control" name="new_password">
                                                </div>
                                                <div class="form-group">
                                                    <label>Confirmation de Mot de passe</label>
                                                    <input type="password" class="form-control" name="confirm_password">
                                                </div>
                                            
                                            
                                                <button type="submit" name="edit" class="btn btn-primary">Modifier</button> -->
                                            </div>
                                        <!-- </form> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <?php $content=ob_get_clean();?>
        <?php require_once("views/admin/components/layout_biblio.php")?>
