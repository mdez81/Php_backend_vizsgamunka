<?php
session_start();
/*ob_start();
ob_flush();*/
if (!isset($_SESSION['f_id'])) {
    header('Location:../index.php');
}
 /*if (isset($_SESSION['hiba'])) {
    unset($_SESSION['hiba']);
}*/
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>könyv módosítása</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../images/icons/favicon.ico">
        <link href="../assets/vendor.9141013d9d5ef137660f.css" rel="stylesheet"></head>

    <body>
        <div>
            <!--BEGIN BACK TO TOP-->
            <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
            <!--END BACK TO TOP-->
            <!--BEGIN TOPBAR-->
            <div id="header-topbar-option-demo" class="page-header-topbar">
                <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
                    <div class="navbar-header">
                        <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a id="logo" href="dashboard.html" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text">BookLibrary</span><span style="display: none" class="logo-text-icon">µ</span></a></div>
                    <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>

                        <form id="topbar-search" action="" method="" class="hidden-sm hidden-xs">
                            <div class="input-icon right text-white"><a href="#"><i class="fa fa-search"></i></a><input type="text" placeholder="Search here..." class="form-control text-white"
                                                                                                                            /></div>
                        </form>

                        <ul class="nav navbar navbar-top-links navbar-right mbn">

                            <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="../images/avatar/48.jpg" alt="" class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs">John Doe</span>&nbsp;<span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-user pull-right">
                                    <li><a href="profile.html"><i class="fa fa-user"></i>My Profile</a></li>
                                    <li><a href="#"><i class="fa fa-tasks"></i>My Books</a></li>
                                    <li class="divider"></li>
                                    <li><a href="../logout.php"><i class="fa fa-sign-out"></i>Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>

            </div>
            <!--END TOPBAR-->
            <div id="wrapper">
                <!--BEGIN SIDEBAR MENU-->
                <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;" data-position="right"
                     class="navbar-default navbar-static-side">
                    <div class="sidebar-collapse menu-scroll">
                        <ul id="side-menu" class="nav">

                             <div class="clearfix"></div>
                            <li class="active"><a href="dashboard.php"><i class="fa fa-tachometer fa-fw">
                                        <div class="icon-bg bg-orange"></div>
                                    </i><span class="menu-title">Dashboard</span></a></li>

                            <li><a href="konyvek.php"><i class="fa fa-book fa-fw">
                                        <div class="icon-bg bg-yellow"></div>
                                    </i><span class="menu-title">Books</span></a>
                            </li>

                            </li>
                            <li><a href="szerzok.php"><i class="fa fa-edit fa-fw">
                                        <div class="icon-bg bg-violet"></div>
                                    </i><span class="menu-title">Authors</span></a>
                            </li>
                            
                              <li><a href="kategoria.php"><i class="fa fa-cog fa-fw">
                        <div class="icon-bg bg-blue"></div>
                    </i><span class="menu-title">kategória</span></a>
                        </li>

                            <li><a href="#"><i class="fa fa-cog fa-fw">
                                        <div class="icon-bg bg-blue"></div>
                                    </i><span class="menu-title">Profile</span></a>
                            </li>
                            
                            <li><a href="../view/kolcsonzes.php"><i class="fa fa-cog fa-fw">
                                        <div class="icon-bg bg-blue"></div>
                                    </i><span class="menu-title"> new Issue</span></a>
                            </li>

                            <li><a href="../view/kolcsonzesek.php"><i class="fa fa-cog fa-fw">
                                        <div class="icon-bg bg-blue"></div>
                                    </i><span class="menu-title">all Issue</span></a>
                            </li>

                        </ul>
                    </div>
                </nav>
                <div id="page-wrapper">
                    <!--BEGIN TITLE & BREADCRUMB PAGE-->
                    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                        <div class="page-header pull-left">
                            <div class="page-title">
                                Könyv módosítása</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                            <li class="hidden"><a href="#">Forms</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                            <li class="active">Books</li>
                        </ol>
                        <div class="clearfix">
                        </div>
                    </div>
                    <!--END TITLE & BREADCRUMB PAGE-->
                    <!--BEGIN CONTENT-->
                    <div class="page-content">
                        <div id="tab-general">
                            <div class="row mbl">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="panel panel-green">
                                                <div class="panel-heading">
                                                    könyv adat módosítás</div>
                                                <div class="panel-body pan">
                                                    <?php
                                                    require '../classes/Konyv.php';

                                                    $konyv = new Konyv();

                                                    $k_id = (int) $_GET['id'];
                                                    $adatok = $konyv->osszesKonyvId($k_id);
                                                    ?>
                                                    <form action="../model/konyv_modositasa.php?id=<?php echo $k_id; ?>"  method="post" >
                                                        <div class="form-body pal">

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <div class="text-center mbl"><img src="../konyvek/<?php echo $adatok['fenykep']?>" alt="kony fényképe"  style="width:100px;"></div>
                                                                        <div class="text-center mbl"><!--<a href="../view/kepfeltolts.php" class="btn btn-green"
                                                                                                        title="Upload"><i class="fa fa-upload"></i>&nbsp; kép feltöltése</a>-->
                                                                            
                                                                             
                                                                           
                                                                        </div>
                                                                    </div>
                                                                    <hr/>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <label for="cim" class="control-label">
                                                                            Title</label>
                                                                        <div class="input-icon right">
                                                                            <input type="text" id="cim" name="cim"  placeholder="könyv címe" value="<?php echo $adatok['cim']; ?>" class="form-control">
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="isbn" class="control-label">
                                                                                    ISBN</label>
                                                                                <div class="input-icon right">
                                                                                    <input type="text" id="isbn" name="isbn"  placeholder="ISBN" maxlength="13" value="<?php echo $adatok['isbn']; ?>" class="form-control">
                                                                                </div>
                                                                             
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="kategoriaLista" class="control-label">
                                                                                    Kategória</label>
                                                                                <select id = "kategoriaLista" name = "kategoriaLista" class = "form-control">
                                                                                    <option>válasszon kategóriát</option>

                                                                                    <?php
                                                                                    require_once '../config/Adatbazis.php';
                                                                                    $ab_1 = new Adatbazis();
                                                                                    $kapcs_1 = $ab_1->ABKapcsoat();
                                                                                    $sql = "SELECT id, kategoria_neve FROM kategoria";

                                                                                    $result = $kapcs_1->query($sql);
                                                                                    if ($result->num_rows > 0) {
                                                                                        while ($row = $result->fetch_assoc()) {
                                                                                            echo '<option value="' . $row['id'] . '">' . $row['kategoria_neve'] . '</option>';
                                                                                        }
                                                                                        //$this->kapcs->close();
                                                                                    }
                                                                                    ?>

                                                                                </select>
                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="row">

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="szerzoLista" class="control-label">
                                                                                    Publisher</label>
                                                                                <select id = "szerzoLista" name = "szerzoLista" class = "form-control">
                                                                                    <option>Válasszon szerzőt</option>

                                                                                    <?php
                                                                                    //require_once '../config/Adatbazis.php';
                                                                                    $ab = new Adatbazis();
                                                                                    $kapcs = $ab->ABKapcsoat();
                                                                                    $sql_2 = "SELECT id, szerzo_neve FROM szerzok";

                                                                                    $result_2 = $kapcs->query($sql_2);
                                                                                    if ($result_2->num_rows > 0) {
                                                                                        while ($row = $result_2->fetch_assoc()) {
                                                                                            echo '<option value="' . $row['id'] . '">' . $row['szerzo_neve'] . '</option>';
                                                                                        }
                                                                                        //$this->kapcs->close();
                                                                                    }
                                                                                    //$this->kapcs->close();
                                                                                    ?>
                                                                                    
                                                                                </select>
                                                                            </div>
                                                                         
                                                                        </div>

                                                                    </div>


                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="form-actions text-right pal">
                                                            <button type="submit" class="btn btn-green"  title="Save">Save</button>&nbsp;
                                                            <a  class="btn btn-danger" href="konyvek.php" title="Cancel">Cancel</a>
                                                        </div>
                                                    </form>
                                                    
                                                    <a href="kep_modositas_form.php?id=<?php echo $k_id;?>" class="btn btn-primary">Kép módosítása</a> 
                                                    
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
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
                <!--END PAGE WRAPPER-->
            </div>
        </div>
        <script type="text/javascript" src="../assets/vendor.b4b0165630c3cba86c74.js"></script><script type="text/javascript" src="./app.a5e8deedc708df27bfde.js"></script></body>
</html>