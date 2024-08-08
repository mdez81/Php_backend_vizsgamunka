<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Belépés</title>
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
        class="hold-transition login-page  ">
        <div
            class="login-box  ">
            <div class="login-logo ">
                <!--<a href="#">Bombay University</a>-->
            </div>
            <!-- /.login-logo -->

            <div class="card">
                <div class="card-body login-card-body">

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

                            require ('../classes/Felhasznalo.php');
                            $felhasznalo = new Felhasznalo();
                            $felhasznaloNev = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : '';
                            $jelszo = $_POST['password'];

                            $belepve = $felhasznalo->login($felhasznaloNev, $jelszo);
                            $_SESSION['uid'] = $belepve;
                            header('Location:../dashboard.php');
                            if (!$belepve) {
                                //$hibasAdat="hibás email cím és vagy jelszó";
                                $_SESSION['hiba'] = "hibás email cím és vagy jelszó";
                            }
                            $felhasznalo->abKapcsBezar();
                        }
                    }
                    ?>

                    <form method="POST" >
                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control " name="email"
                                   placeholder="email cím">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                                <span class="text-danger"><?php echo $hibaUzenetEmail; ?></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input id="password" name="password" type="password" class="form-control " name="password"
                                   placeholder="jelszó">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                                <span class="text-danger"><?php echo $hibaUzenetJelszo; ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">

                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-sm btn-dark btn-block mx-auto">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
            make_login = function (username, password) {
                $("#email").val(username);
                $("#password").val(password);
                $("#loginForm").submit();
            }
                    </script>
                    <!-- /.social-auth-links -->

                    <p class="mb-0">
                        <a href="regisztracio.php" class="text-center">Register</a>
                    </p>

                    <?php
                    if (isset($_SESSION['hiba'])) {
                        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['hiba'] . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>';
                    }
                    ?>
                </div>
                <!-- /.login-card-body -->
            </div>
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


