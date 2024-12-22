<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style_login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login | ENSAJ</title>
</head>
<body>


  <div class="wrapper">
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
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">                
                <img src="assets/img/Logo_Ensaj.png" alt="">
                
            </div>
            <div class="col-md-6 right">
                
                <div class="input-box">
                    <header class="header_text"><h2>Bonjour à nouveau !</h2></header>

                   <header><h4>Se connecter</h4></header>
                   <form action="index.php?action=verify_login" method="post">
                        <div class="input-field">
                                <input type="text" class="input" id="email" name="email">
                                <label for="email">Email</label> 
                            </div> 
                        <div class="input-field">
                                <input type="password" class="input" id="pass" name="password">
                                <label for="pass">Password</label>
                            </div> 
                        <div class="input-field">
                                <input type="submit" class="submit" name="connect" value="Connexion">
                        </div> 
                </form>
                   <div class="signin">
                    <span>Nous sommes ravis de vous accueillir de nouveau. <a href="index.php?action=login">Log in here</a></span>
                   </div>
                </div>  
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>