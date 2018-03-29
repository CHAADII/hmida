<?php 
session_start();
if (($_SESSION)!=null) {
    header("location:insertion.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php 

if (isset($_POST['login'])) {
    $login=$_POST['login'];
    $password=$_POST['pwd'];
    require "../vendor/autoload.php";
    include("config.php");
    $f1=['username'=>$login];
    $f1+=['password'=>$password];
    $cursor=$c1->find($f1);
    $res=iterator_to_array($cursor);
    if ($res!=Null) {
        $_SESSION["user"]=$res[0]->username;
        $_SESSION["password"]=$res[0]->password;
        var_dump($_SESSION);
        header("location:insertion.php");
    }

    

}
if(isset($_GET["decon"]) && $_GET["decon"]=="decon")
        {
    unset($_SESSION["admin"]);
    unset($_SESSION["id_user"]);
    session_destroy();
    header("Refresh:0; url=login.php");
     }
 ?>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Login Page</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">
    <!-- Navbar -->
    <!--<nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
                            <i class="fa fa-facebook-square"></i>
                            <p class="d-lg-none d-xl-none">Facebook</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>-->
    <!-- End Navbar -->
    <div class="page-header" filter-color="orange">
        <div class="page-header-image" style="background-image:url(../assets/img/login.jpg)"></div>
        <div class="container">
            <div class="col-md-4 content-center">
                <div class="card card-login card-plain">
                    <form class="form" action="" method="POST" >
                        <div class="header header-primary text-center">
                            <div class="header">
                                    <span class=""><h3>Sciences<b>News</b></h3></span>
                            </div>
                        </div>
                        <div class="content">
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons users_circle-08"></i>
                                </span>
                                <input type="text" name="login" class="form-control" placeholder="User Name..." required/>
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="fa  fa-lock"></i>
                                </span>
                                <input type="password" name="pwd" placeholder="Password..." class="form-control" required />
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">LOGIN</button>
                        </div>
                    </form>
                    <div class="alert alert-danger " id='erreur' style="display: none;">
                      <strong>Erreur !</strong> Invalid UserName or Password.
                    </div>
                </div>

            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <nav>
                    <ul>
                        <li>
                            <a href="../">
                                Sciences<b>News</b>
                            </a>
                        </li>
                        <li>
                            <a href="about.php">
                                About Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/SciencesNews-1733989510150152/" target="_blank">
                            <i class="fa fa-facebook-square"></i>
                            <p class="d-lg-none d-xl-none">Facebook</p>
                        </a>
                    </li>
                    </ul>
                </nav>
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script> SADIQ Mohamed & IZIKI Achraf
                    
                </div>
            </div>
        </footer>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
<?php 
    if (isset($_POST["login"])) {
       
     if ($res==null) {
     
        echo '<script type="text/javascript">
           var element=document.getElementById("erreur");
           element.style.display="block";               
            </script>';
        }
    }
 ?>
</html>