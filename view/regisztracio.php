<?php
/*if (isset($_SESSION['hiba'])){
    unset($_SESSION['hiba']);
}*/
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Regisztráció</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://www.library-management.com/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="https://www.library-management.com/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="https://www.library-management.com/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .callout {
                border-radius: .5rem;
                /* box-shadow: 0 1px 3px rgb(0 0 0 / 12%), 0 1px 2px rgb(0 0 0 / 24%); */
                background-color: #fff;
                border-left: 5px solid #e9ecef;
                margin-bottom: 1rem;
                padding: 0.5rem;
            }

            .closeCallout {
                outline: 0 !important;
            }
            .b-lr-1{
                border-left: 1px solid lightgray;
                border-right: 1px solid lightgray;
            }
        </style>
        <script src="https://www.library-management.com/front/js/vendor/jquery-1.12.4.min.js"></script>
        <script>
            $(document).ready(function () {
                $('body').on('click', 'button.closeCallout', function () {
                    $(this).parent().parent().remove();
                });
            });

        </script>
    </head>
    <body
        class="hold-transition   register-page ">
        <div
            class="  register-box ">
            <!--<div class="login-logo  register-logo ">
                <a href="#">Bombay University</a>
            </div>-->
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Regisztráció</p>

                    <?php
                    require ('../classes/Felhasznalo.php');
                    $felhasznalo = new Felhasznalo();

                    $hibaUzenetFnev = "";
                    $hibaUzenetNev = "";
                    $hibaUzenetEmail = "";
                    $hibaUzenetTel = "";
                    $hibaUzenetJelszo = "";
                    $hibaUzenetJelszoUjra = "";
                    //$hibasAdat = "";

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        if (empty($_POST['fnev'])) {
                            $hibaUzenetFnev = "felhasználónév nem lehet üres!";
                        }
                         if (empty($_POST['nev'])) {
                            $hibaUzenetNev = "név nem lehet üres!";
                        }
                         if (empty($_POST['email'])) {
                            $hibaUzenetEmail = "emailcim nem lehet üres!";
                        }
                         if (empty($_POST['telefon'])) {
                            $hibaUzenetTel = "telefonszám nem lehet üres!";
                        }
                         if (empty($_POST['jelszo'])) {
                            $hibaUzenetJelszo = " jelszó nem lehet üres!";
                        }
                        if ($_POST['jelszo'] != $_POST['jelszo_ujra']) {
                            $hibaUzenetJelszoUjra = " jelszó és a jelszó újra nem egyezik!";
                        } else {    

                            $fnev = filter_var($_POST['fnev'], FILTER_SANITIZE_SPECIAL_CHARS);
                            $nev = filter_var($_POST['nev'], FILTER_SANITIZE_SPECIAL_CHARS);
                            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                            $telefonsz = filter_var($_POST['telefon'], FILTER_SANITIZE_SPECIAL_CHARS);
                            $jelszo = password_hash($_POST['jelszo'], PASSWORD_DEFAULT);
                            //$utolso_id = $felhasznalo->utolsoId();
                            //$uj_id = $utolso_id +=1;

                            $reg = $felhasznalo->register($uj_id, $fnev, $nev, $email, $telefonsz, $jelszo);

                            if ($reg) {
                                header("Location:login.php");
                            } else {
                                $_SESSION['hiba'] = "hibás email cím és vagy jelszó";
                            }
                            $felhasznalo->abKapcsBezar();
                        }
                    }
                    ?>

                    <form method="POST" >

                        <div class="input-group mb-3">
                            <input type="text" class="form-control " name="fnev" id="fnev"
                                   placeholder="felhasználónév">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                                <span class="text-danger"><?php echo $hibaUzenetFnev; ?></span>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control " name="nev" id="nev"
                                   placeholder="Név">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                                <span class="text-danger"><?php echo $hibaUzenetNev; ?></span>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="email" class="form-control " name="email" id="email"
                                   placeholder="email cím">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                                <span class="text-danger"><?php echo $hibaUzenetEmail; ?></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="tel" class="form-control " name="telefon" id="telefon"
                                   placeholder="telefonszám">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone-alt"></span>
                                </div>
                                <span class="text-danger"><?php echo $hibaUzenetTel; ?></span>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" class="form-control"
                                   class="form-control" name="jelszo" id="jelszo"
                                   placeholder="jelszó">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                                <span class="text-danger"><?php echo $hibaUzenetJelszo; ?></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control"
                                   name="jelszo_ujra" id="jelszo_ujra" 
                                   placeholder="jelszó ismétlés">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                                <span class="text-danger"><?php echo $hibaUzenetJelszoUjra; ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <!--<div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                    <label for="agreeTerms">
                                        I agree to the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div>-->
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-sm btn-dark btn-block">Regisztrál</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <?php
                    if (isset($_SESSION['hiba'])) {
                        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['hiba'] . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>';
                    }
                    ?>

                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->




























































































        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="https://www.library-management.com/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="https://www.library-management.com/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="https://www.library-management.com/js/adminlte.min.js"></script>

    </body>
</html>
