<html class="no-js">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sistema de obras publicas</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Favicon -->
        <link rel="shortcut icon" href="../Misc/img/favicon.ico" type="image/x-icon">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="../Misc/css/bootstrap.min.css">
        <!-- Fonts from Font Awsome -->
        <link rel="stylesheet" href="../Misc/css/font-awesome.min.css">
        <!-- CSS Animate -->
        <link rel="stylesheet" href="../Misc/css/animate.css">
        <!-- Custom styles for this theme -->
        <link rel="stylesheet" href="../Misc/css/main.css">
        <link href="../Misc/css/toastr.min.css" rel="stylesheet" type="text/css"/>
        <link href="../Misc/css/dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="../Misc/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href=../Misc/css/sweetalert.css" rel="stylesheet" type="text/css"/>
        
        <script src=../"Misc/js/modernizr-2.6.2.min.js"></script>
        <script src="../Misc/js/sweetalert.min.js"></script>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <section id="container">
            <header id="header">

                <div class="brand">
                   
                </div>

                <div class="toggle-navigation toggle-left">
                    <button type="button" class="btn btn-default" id="toggle-left" data-toggle="tooltip" data-placement="right" title="Toggle Navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="user-nav">
                    <ul>

                        <li class="profile-photo">
                            <i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>
                        </li>
                        <li class="dropdown settings">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <?php
                                if (isset($_SESSION['loggedIn'])) {
                                    echo $_SESSION['correo'] ;
                                }
                                ?> <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu animated fadeInDown">
                                <li>
                                    <a id="btnLogOut"><i class="fa fa-power-off"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </header>
            <aside class="sidebar">
                <div id="leftside-navigation" class="nano">
                    <ul class="nano-content">
                        <li class="sub-menu">
                            <a href="mapas.php"><i class="fa fa-globe"></i><span>Mapas</span></a>
                        </li>
                        <?php  if($_SESSION['type'] === "2" ){ ?>
                        <li class="sub-menu">
                            <a href="Users.php"><i class="fa fa-users"></i><span>Usuarios</span></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>

            </aside>
            <section class="main-content-wrapper">
                <section id="main-content">

                    <script type="text/javascript">
                        var id_User_Global = <?php echo $_SESSION['id_Usuario']; ?> ;
                        var permisos = <?php echo $_SESSION['type'] ?> ; 

                    </script>        
                    <script src="../Misc/js/jquery-3.2.1.min.js" type="text/javascript"></script>
                    <script src="../Misc/js/jquery-1.10.2.min.js"></script>
                    <script src="../Misc/js/bootstrap.min.js"></script>
                    <script src="../Misc/js/application.js"></script>
                    <script src="../Misc/js/toastr.min.js" type="text/javascript"></script>
                    <script src="../Misc/js/jquery.dataTables.js" type="text/javascript"></script>
                    <script src="../Misc/js/functions.js" type="text/javascript"></script>
                    <script src="../Misc/js/sweetalert.min.js" type="text/javascript"></script>