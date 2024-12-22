<div class="header">

    <div class="header-left">
        <a href="#" class="logo">
            <img src="assets/img/new_logo.png" alt="Logo">
        </a>
        <a href="index.html" class="logo logo-small">
            <img src="assets/img/part.png" alt="Logo" width="30" height="30">
        </a>
    </div>
    <div class="menu-toggle">
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-bars"></i>
        </a>
    </div>

    
    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>

    <ul class="nav user-menu">


        <li class="nav-item zoom-screen me-2">
            <a href="#" class="nav-link header-nav-list win-maximize">
                <img src="assets/img/icons/header-icon-04.svg" alt="">
            </a>
        </li>

        <li class="nav-item dropdown has-arrow new-user-menus">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                    <img class="rounded-circle" src="assets/students/<?= $_SESSION['student']['image_path']; ?>" width="31" alt="Soeng Souy">
                    <div class="user-text">
                        <h6><?= $_SESSION['student']['firstname'] . "  " . $_SESSION['student']['lastname']; ?></h6>
                        <p class="text-muted mb-0">Elève Ingénieur</p>
                    </div>
                </span>
            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <img src="assets/students/<?= $_SESSION['student']['image_path']; ?>" alt="User Image" class="avatar-img rounded-circle">
                    </div>
                    <div class="user-text">
                        <h6><?= $_SESSION['student']['firstname'] . "  " . $_SESSION['student']['lastname']; ?></h6>
                        <p class="text-muted mb-0">Eleve Ingénieur</p>
                    </div>
                </div>
                <a class="dropdown-item" href="index.php?action=view_student_profile">Mon Profile</a>
                <a class="dropdown-item" href="index.php?action=logout_users">Déconnexion</a>
            </div>
        </li>

    </ul>

</div>