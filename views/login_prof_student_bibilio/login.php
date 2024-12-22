<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | ENSAJ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style_login_user.css" />
  </head>
  <body>
  <?php if (isset($_SESSION['message'])): 
                    if($_SESSION['message_type'] == 'success'){?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong><?php echo $_SESSION['message'];?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php    header("location:index.php?action=dashboard");?>
                    <?php }elseif($_SESSION['message_type'] == 'error'){?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?php echo $_SESSION['message'];?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php }?>
                    <?php unset($_SESSION['message']); ?>
                    <?php unset($_SESSION['message_type']); ?>
                <?php endif; ?>
    <main>
    
      <div class="box">
      
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="index.php?action=verify_login_user" autocomplete="off" class="sign-in-form" method="post">
              <div class="logo">
                <img src="assets/img/Logo_Ensaj.png" alt="ensaj" style="width:60px;height:60px"/>
              </div>

              <div class="heading">
                <h2>Bienvenue !</h2>
                <h6>Espace étudiant?</h6>
                <a href="#" class="toggle">Connexion</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input type="email" minlength="4" class="input-field" name="email_users" required/>
                  <label>E-mail</label>
                </div>

                <div class="input-wrap">
                  <input type="password" class="input-field" name="password_users" autocomplete="off" required />
                  <label>Mot de passe</label>
                </div>

                <input type="submit" value="Connexion" name="connect_user" class="sign-btn" />

                <p class="text">
                  Nous sommes ravis de vous accueillir de nouveau.
                </p>
              </div>
            </form>

            <form action="index.php?action=check_student_login" autocomplete="off" class="sign-up-form" method="post">
              <div class="logo">
                <img src="assets/img/Logo_Ensaj.png" alt="easyclass" />
              </div>

              <div class="heading">
                <h2>Bienvenue !</h2>
                <h6>Espace personnel académique?</h6>
                <a href="#" class="toggle">Connexion</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input type="email" name="email" minlength="4" class="input-field" autocomplete="off" required/>
                  <label>E-mail</label>
                </div>

                <div class="input-wrap">
                  <input type="password" name="password" class="input-field" autocomplete="off" required />
                  <label>Mot de passe</label>
                </div>

                <input type="submit" value="Connexion" class="sign-btn" />

                <p class="text">
                  Nous sommes ravis de vous accueillir de nouveau.
                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="assets/img/image.jpeg" class="image img-1 show" alt="" style="height:600px"/>
            </div>

            
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
