<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="images/icons/favicon.ico">
        <link href="../assets/vendor.9141013d9d5ef137660f.css" rel="stylesheet">
    </head>

    <body>
        <!--<div>-->
        <!--BEGIN TOPBAR-->
        <div id="header-topbar-option-demo" class="page-header-topbar">
            <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
                <div class="navbar-login">
                    <a id="logo" href="#" class="navbar-brand"><span class="logo-text">BookLibrary</span><span style="display: none" class="logo-text-icon">µ</span></a>
                </div>
            </nav>

        </div>
        <!--END TOPBAR-->

        <!--BEGIN CONTENT-->
        <div class="page-content">

            <div class="col-lg-4 col-lg-offset-4">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        Bejelentkezés</div>

                    <div class="panel-body pan">

                        <?php
                        $hibaUzenetEmail = "";
                        $hibaUzenetJelszo = "";
                        $hibasAdat = "";

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {

                            if (empty($_POST['email'])) {
                                $hibaUzenetEmail = "emailcim nem lehet üres!";
                            }
                            if (empty($_POST['password'])) {
                                $hibaUzenetJelszo = " jelszó nem lehet üres!";
                            } else {



                                require ('./classes/Rendszerfelhasznalo.php');
                                $renszerf = new Rendszerfelhasznalo();
                                $felhasznaloNev = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : '';
                                $jelszo = $_POST['password'];

                                /* if(!$belepve){
                                  $hibaUzenet = "Hibás emailcim és vagy jelszó!";
                                  } */

                                $belepve = $renszerf->login($felhasznaloNev, $jelszo);
                                $_SESSION['uid'] = $belepve;
                                header('Location:./view/dashboard.php');
                                if (!$belepve) {
                                    //$hibasAdat="hibás email cím és vagy jelszó";
                                    $_SESSION['hiba'] = "hibás email cím és vagy jelszó";
                                }
                            }
                        }
                        ?>

                        <form method="post" class="form-horizontal">
                            <div class="form-body pal">
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">
                                        Email cím</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-user"></i>
                                            <input id="email" name="email" type="email" placeholder="email cím" class="form-control" />
                                            <span class="text-danger"><?php echo $hibaUzenetEmail; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">
                                        Jelszó</label>
                                    <div class="col-md-9">
                                        <div class="input-icon right">
                                            <i class="fa fa-lock"></i>
                                            <input  type="password" id="password" name="password" placeholder="jelszó" class="form-control" /></div>
                                        <span class="text-danger"><?php echo $hibaUzenetJelszo; ?></span>
                                    </div>
                                </div>
                                <!--<div class="form-group mbn">
                                    <div class="col-md-offset-3 col-md-6">
                                        <div class="checkbox">
                                            <label>
                                                <input tabindex="5" type="checkbox" />&nbsp; Keep me logged in</label></div>
                                    </div>
                                </div>
                            </div>-->
                                <div class="form-actions pal">
                                    <div class="form-group mbn">
                                        <div class="col-md-offset-3 col-md-6">
                                            <a href="view/regisztracio.php" class="btn btn-primary">Register</a>&nbsp;&nbsp;
                                            <!--<a href="dashboard.html" class="btn btn-green">Login</a>-->
                                            <button  type="submit" name="belepes" class="btn btn-green">Belépés</button>
                                            <!--<button type="submit" class="btn btn-primary">
                                                                    Login</button>-->
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </form>




                    </div>


                    <?php
                    if (isset($_SESSION['hiba'])) {
                        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['hiba'] . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>';
                    }
                    ?>

                </div>

            </div>
            <!--END CONTENT-->
            <!--BEGIN FOOTER-->
            <div id="footer">
                <div class="copyright">
                    Copyright 2017</div>
            </div>
            <!--END FOOTER-->

        </div>
        <script type="text/javascript" src="../assets/vendor.b4b0165630c3cba86c74.js"></script><script type="text/javascript" src="./app.a5e8deedc708df27bfde.js"></script>
    </body>

</html>