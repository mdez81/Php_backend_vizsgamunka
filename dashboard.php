<?php
session_start();
if (!isset($_SESSION['f_id'])) {
    header('Location:./view/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Dashboard</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="images/icons/favicon.ico">
        <link href="./assets/vendor.9141013d9d5ef137660f.css" rel="stylesheet">
    </head>

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
                        <a id="logo" href="dashboard.html" class="navbar-brand"><span class="logo-text">BookLibrary</span><span style="display: none" class="logo-text-icon">µ</span></a></div>
                    <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>

                        <form id="topbar-search" action="#" method="#" class="hidden-sm hidden-xs">
                            <div class="input-icon right text-white"><a href="#"><i class="fa fa-search"></i></a><input type="text" placeholder="Search here..." class="form-control text-white"
                                                                                                                            /></div>
                        </form>

                        <ul class="nav navbar navbar-top-links navbar-right mbn">

                            <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="images/avatar/48.jpg" alt="" class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs"><?= "Üdv ". $_SESSION['f_fnev']?></span>&nbsp;<span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-user pull-right">
                                    <li><a href="profile.html"><i class="fa fa-user"></i>Profil</a></li>
                                    <li><a href="#"><i class="fa fa-tasks"></i>My Books</a></li>
                                    <li class="divider"></li>
                                    <li><a href="logout.php"><i class="fa fa-sign-out"></i>Kilépés</a></li>
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
                            <li class="active"><a href="dashboard.html"><i class="fa fa-tachometer fa-fw">
                                        <div class="icon-bg bg-orange"></div>
                                    </i><span class="menu-title">Dashboard</span></a></li>

                            <li><a href="books.html"><i class="fa fa-book fa-fw">
                                        <div class="icon-bg bg-yellow"></div>
                                    </i><span class="menu-title">Books</span></a>
                            </li>

                            </li>
                            <li><a href="authors.html"><i class="fa fa-edit fa-fw">
                                        <div class="icon-bg bg-violet"></div>
                                    </i><span class="menu-title">Authors</span></a>
                            </li>

                            <li><a href="profile.html"><i class="fa fa-cog fa-fw">
                                        <div class="icon-bg bg-blue"></div>
                                    </i><span class="menu-title">Profile</span></a>
                            </li>

                        </ul>
                    </div>
                </nav>
                <div id="page-wrapper">
                    <!--BEGIN TITLE & BREADCRUMB PAGE-->
                    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                        <div class="page-header pull-left">
                            <div class="page-title">
                                Dashboard</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                            <li class="hidden"><a href="#">Forms</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                            <li class="active">Dashboard</li>
                        </ol>
                        <div class="clearfix">
                        </div>
                    </div>
                    <!--END TITLE & BREADCRUMB PAGE-->
                    <!--BEGIN CONTENT-->
                    <div class="page-content">

                        <div class="panel">
                            <div class="panel-body">
                                <h4>Dashboard BookLibrary</h4>
                            </div>
                        </div>

                        <div id="sum_box" class="row mbl">
                            <div class="col-sm-6 col-md-3">
                                <div class="panel profit db mbm">
                                    <div class="panel-body">
                                        <p class="icon">
                                            <i class="icon fa fa-book"></i>
                                        </p>
                                        <h4 class="value">
                                            <span data-counter="" data-start="10" data-end="50" data-step="1" data-duration="0">
                                            </span><span>11</span></h4>
                                        <p class="description">
                                            Books</p>
                                        <div class="progress progress-sm mbn">
                                            <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;" class="progress-bar progress-bar-success">
                                                <span class="sr-only">80% Complete (success)</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="panel income db mbm">
                                    <div class="panel-body">
                                        <p class="icon">
                                            <i class="icon fa fa-user"></i>
                                        </p>
                                        <h4 class="value">
                                            <span>12</span></h4>
                                        <p class="description">
                                            Authors</p>
                                        <div class="progress progress-sm mbn">
                                            <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;" class="progress-bar progress-bar-info">
                                                <span class="sr-only">60% Complete (success)</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="panel task db mbm">
                                    <div class="panel-body">
                                        <p class="icon">
                                            <i class="icon fa fa-building"></i>
                                        </p>
                                        <h4 class="value">
                                            <span>21</span></h4>
                                        <p class="description">
                                            Publishers</p>
                                        <div class="progress progress-sm mbn">
                                            <div role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;" class="progress-bar progress-bar-danger">
                                                <span class="sr-only">50% Complete (success)</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="panel visit db mbm">
                                    <div class="panel-body">
                                        <p class="icon">
                                            <i class="icon fa fa-group"></i>
                                        </p>
                                        <h4 class="value">
                                            <span>12</span></h4>
                                        <p class="description">
                                            Users</p>
                                        <div class="progress progress-sm mbn">
                                            <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;" class="progress-bar progress-bar-warning">
                                                <span class="sr-only">70% Complete (success)</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div id="grid-layout-table-1" class="box jplist">
                                            <div class="box text-shadow">
                                                <table class="demo-tbl">
                                                    <!--<item>1</item>-->
                                                    <tr class="tbl-item">
                                                        <!--<img/>-->
                                                        <td class="img"><img src="images/books/book1.jpg" alt="" title="" /></td>
                                                        <!--<data></data>-->
                                                        <td class="td-block">
                                                            <p class="date">03/15/2012</p>

                                                            <p class="title">Book 1</p>

                                                            <p class="desc">Sample text Sample text Sample text Sample text Sample text 
                                                                Sample text Sample text Sample text Sample text Sample text Sample text 
                                                                Sample text Sample text Sample text Sample text Sample text Sample text 
                                                                Sample text Sample text Sample text Sample text Sample text Sample text 
                                                                Sample text Sample text Sample text Sample text Sample text Sample text 
                                                                Sample text Sample text Sample text Sample text Sample text Sample text</p>

                                                            <p class="like">
                                                                <i class="fa fa-star text-yellow fa-fw"></i><i class="fa fa-star text-yellow fa-fw"></i>
                                                                <i class="fa fa-star text-yellow fa-fw"></i><i class="fa fa-star text-yellow fa-fw"></i>
                                                            </p>                                                    </td>
                                                    </tr>
                                                    <!--<item>2</item>-->
                                                    <tr class="tbl-item">
                                                        <!--<img/>-->
                                                        <td class="img"><img src="images/books/book2.jpg" alt="" title="" /></td>
                                                        <!--<data></data>-->
                                                        <td class="td-block">
                                                            <p class="date">03/18/2011</p>

                                                            <p class="title">Book 2</p>

                                                            <p class="desc">Sample text Sample text Sample text Sample text Sample text 
                                                                Sample text Sample text Sample text Sample text Sample text Sample text 
                                                                Sample text Sample text Sample text Sample text Sample text Sample text 
                                                                Sample text Sample text Sample text Sample text Sample text Sample text 
                                                                Sample text Sample text Sample text Sample text Sample text Sample text 
                                                                Sample text Sample text Sample text Sample text Sample text Sample text</p>

                                                            <p class="like">
                                                                <i class="fa fa-star text-yellow fa-fw"></i><i class="fa fa-star text-yellow fa-fw"></i><i class="fa fa-star text-yellow fa-fw"></i>
                                                            </p>                                                    </td>
                                                    </tr>
                                                    <!--<item>3</item>-->
                                                    <tr class="tbl-item">
                                                        <!--<img/>-->
                                                        <td class="img"><img src="images/books/book3.jpg" alt="" title="" /></td>
                                                        <!--<data></data>-->
                                                        <td class="td-block">
                                                            <p class="date">02/24/2000</p>

                                                            <p class="title">Book 3</p>

                                                            <p class="desc">Sample text Sample text Sample text Sample text Sample text 
                                                                Sample text Sample text Sample text Sample text Sample text Sample text 
                                                                Sample text Sample text Sample text Sample text Sample text Sample text 
                                                                Sample text Sample text Sample text Sample text Sample text Sample text 
                                                                Sample text Sample text Sample text Sample text Sample text Sample text 
                                                                Sample text Sample text Sample text Sample text Sample text Sample text</p>

                                                            <p class="like">
                                                                <i class="fa fa-star text-yellow fa-fw"></i><i class="fa fa-star text-yellow fa-fw"></i>
                                                                <i class="fa fa-star text-yellow fa-fw"></i><i class="fa fa-star text-yellow fa-fw"></i><i class="fa fa-star text-yellow fa-fw"></i>
                                                            </p>
                                                        </td>
                                                    </tr>

                                                </table>
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
        <script type="text/javascript" src="./assets/vendor.b4b0165630c3cba86c74.js"></script><script type="text/javascript" src="./app.a5e8deedc708df27bfde.js"></script></body>

</html>