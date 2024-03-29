<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>HTML Education Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="assets/public/css/bootstrap.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="assets/public/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/public/css/style.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<!-- Header -->
<header id="header" class="transparent-nav">
    <div class="container">

        <div class="navbar-header">
            <!-- Logo -->
            <div class="navbar-brand">
                <a class="logo" href="#">
                    <img src="assets/public/img/logo.png" alt="logo">
                </a>
            </div>
            <!-- /Logo -->

            <!-- Mobile toggle -->
            <button class="navbar-toggle">
                <span></span>
            </button>
            <!-- /Mobile toggle -->
        </div>

        <!-- Navigation -->
        <nav id="nav">
            <ul class="main-menu nav navbar-nav navbar-right">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Courses</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <!-- /Navigation -->

    </div>
</header>
<!-- /Header -->

<!-- Home -->
<div id="home" class="hero-area">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url(assets/public/img/home-background.jpg)"></div>
    <!-- /Backgound Image -->

    <div class="home-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="white-text">Leo Learning Free Online Training Courses</h1>
                    <p class="lead white-text">Libris vivendo eloquentiam ex ius, nec id splendide abhorreant, eu pro alii error homero.</p>
                    <a class="main-button icon-button" href="#">Get Started!</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /Home -->

<!-- About -->
<div id="about" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <div class="col-md-6">
                <div class="section-header">
                    <h2>Welcome to Leo Learning</h2>
                    <p class="lead">Libris vivendo eloquentiam ex ius, nec id splendide abhorreant.</p>
                </div>

                <!-- feature -->
                <div class="feature">
                    <i class="feature-icon fa fa-flask"></i>
                    <div class="feature-content">
                        <h4>Online Courses </h4>
                        <p>Ceteros fuisset mei no, soleat epicurei adipiscing ne vis. Et his suas veniam nominati.</p>
                    </div>
                </div>
                <!-- /feature -->

                <!-- feature -->
                <div class="feature">
                    <i class="feature-icon fa fa-users"></i>
                    <div class="feature-content">
                        <h4>Expert Teachers</h4>
                        <p>Ceteros fuisset mei no, soleat epicurei adipiscing ne vis. Et his suas veniam nominati.</p>
                    </div>
                </div>
                <!-- /feature -->

                <!-- feature -->
                <div class="feature">
                    <i class="feature-icon fa fa-comments"></i>
                    <div class="feature-content">
                        <h4>Community</h4>
                        <p>Ceteros fuisset mei no, soleat epicurei adipiscing ne vis. Et his suas veniam nominati.</p>
                    </div>
                </div>
                <!-- /feature -->

            </div>

            <div class="col-md-6">
                <div class="about-img">
                    <img src="assets/public/img/about.png" alt="">
                </div>
            </div>

        </div>
        <!-- row -->

    </div>
    <!-- container -->
</div>
<!-- /About -->

<!-- Courses -->
<div id="courses" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">
            <div class="section-header text-center">
                <h2>Explore Courses</h2>
                <p class="lead">Libris vivendo eloquentiam ex ius, nec id splendide abhorreant.</p>
            </div>
        </div>
        <!-- /row -->

        <!-- courses -->
        <div id="courses-wrapper">

            <!-- row -->
            <div class="row">
                <?php foreach ($GLOBALS['courses'] as $course) { ?>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="course">
                        <div class="course-img">
                            <img class="img-responsive" src="<?= $course['image'] ?>" alt="" style="width: 100%; height: 150px;">
                        </div>
                        <h5 class="title"><?= $course['title'] ?></h5>
                        <a class="course-title" href="#"><?= $course['description'] ?></a>
                        <div class="course-details">
                            <button type="button" class="btn btn-block btn-success rounded edit-course" data-id="<?= $course['id'] ?>">Ver Curso</button>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="course cursor-pointer" data-toggle="modal" data-target="#modalCreateCourse">
                        <div class="course-img">
                            <img src="assets/public/img/add-curso.png" alt="">
                        </div>
                    </div>
                </div>

            </div>
            <!-- /row -->

        </div>
        <!-- /courses -->

        <div class="row">
            <div class="center-btn">
                <a class="main-button icon-button" href="#">More Courses</a>
            </div>
        </div>

    </div>
    <!-- container -->

</div>
<!-- /Courses -->

<!-- Call To Action -->
<div id="cta" class="section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url(assets/public/img/cta1-background.jpg)"></div>
    <!-- /Backgound Image -->

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <div class="col-md-6">
                <h2 class="white-text">Ceteros fuisset mei no, soleat epicurei adipiscing ne vis.</h2>
                <p class="lead white-text">Ceteros fuisset mei no, soleat epicurei adipiscing ne vis. Et his suas veniam nominati.</p>
                <a class="main-button icon-button" href="#">Get Started!</a>
            </div>

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
<!-- /Call To Action -->

<!-- Why us -->
<div id="why-us" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">
            <div class="section-header text-center">
                <h2>Why Leo Learning</h2>
                <p class="lead">Libris vivendo eloquentiam ex ius, nec id splendide abhorreant.</p>
            </div>

            <!-- feature -->
            <div class="col-md-4">
                <div class="feature">
                    <i class="feature-icon fa fa-flask"></i>
                    <div class="feature-content">
                        <h4>Online Courses</h4>
                        <p>Ceteros fuisset mei no, soleat epicurei adipiscing ne vis. Et his suas veniam nominati.</p>
                    </div>
                </div>
            </div>
            <!-- /feature -->

            <!-- feature -->
            <div class="col-md-4">
                <div class="feature">
                    <i class="feature-icon fa fa-users"></i>
                    <div class="feature-content">
                        <h4>Expert Teachers</h4>
                        <p>Ceteros fuisset mei no, soleat epicurei adipiscing ne vis. Et his suas veniam nominati.</p>
                    </div>
                </div>
            </div>
            <!-- /feature -->

            <!-- feature -->
            <div class="col-md-4">
                <div class="feature">
                    <i class="feature-icon fa fa-comments"></i>
                    <div class="feature-content">
                        <h4>Community</h4>
                        <p>Ceteros fuisset mei no, soleat epicurei adipiscing ne vis. Et his suas veniam nominati.</p>
                    </div>
                </div>
            </div>
            <!-- /feature -->

        </div>
        <!-- /row -->

        <hr class="section-hr">

        <!-- row -->
        <div class="row">

            <div class="col-md-6">
                <h3>Persius imperdiet incorrupte et qui, munere nusquam et nec.</h3>
                <p class="lead">Libris vivendo eloquentiam ex ius, nec id splendide abhorreant.</p>
                <p>No vel facete sententiae, quodsi dolores no quo, pri ex tamquam interesset necessitatibus. Te denique cotidieque delicatissimi sed. Eu doming epicurei duo. Sit ea perfecto deseruisse theophrastus. At sed malis hendrerit, elitr deseruisse in sit, sit ei facilisi mediocrem.</p>
            </div>

            <div class="col-md-5 col-md-offset-1">
                <a class="about-video" href="#">
                    <img src="assets/public/img/about-video.jpg" alt="">
                    <i class="play-icon fa fa-play"></i>
                </a>
            </div>

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
<!-- /Why us -->

<!-- Contact CTA -->
<div id="contact-cta" class="section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url(assets/public/img/cta2-background.jpg)"></div>
    <!-- Backgound Image -->

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <div class="col-md-8 col-md-offset-2 text-center">
                <h2 class="white-text">Contact Us</h2>
                <p class="lead white-text">Libris vivendo eloquentiam ex ius, nec id splendide abhorreant.</p>
                <a class="main-button icon-button" href="#">Contact Us Now</a>
            </div>

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
<!-- /Contact CTA -->

<!-- Footer -->
<footer id="footer" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <!-- footer logo -->
            <div class="col-md-6">
                <div class="footer-logo">
                    <a class="logo" href="">
                        <img src="assets/public/img/logo.png" alt="logo">
                    </a>
                </div>
            </div>
            <!-- footer logo -->

            <!-- footer nav -->
            <div class="col-md-6">
                <ul class="footer-nav">
                    <li><a href="/">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Courses</a></li>
                    <li><a href="">Blog</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </div>
            <!-- /footer nav -->

        </div>
        <!-- /row -->

        <!-- row -->
        <div id="bottom-footer" class="row">

            <!-- social -->
            <div class="col-md-4 col-md-push-8">
                <ul class="footer-social">
                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
            <!-- /social -->

            <!-- copyright -->
            <div class="col-md-8 col-md-pull-4">
                <div class="footer-copyright">
                    <span>&copy; Copyright 2018. All Rights Reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com">Colorlib</a></span>
                </div>
            </div>
            <!-- /copyright -->

        </div>
        <!-- row -->

    </div>
    <!-- /container -->

</footer>
<!-- /Footer -->

<!-- preloader -->
<div id='preloader'><div class='preloader'></div></div>
<!-- /preloader -->

<!-- Market Place -->
<div id="maket-place">
    <input type="hidden" id="baseUrlPath" value="<?= $GLOBALS['baseUrlPath'] ?>">
</div>

<!-- jQuery Plugins -->
<script type="text/javascript" src="assets/public/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/public/js/main.js"></script>
<script type="text/javascript" src="assets/public/js/views/home/home.js"></script>

<!-- Modal - Primeiro Acesso -->
<div id="modal-first-access" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-5">
                    <a href="#" class="">
                        <img class="img-responsive" src="assets/public/img/home-background.jpg" alt="">
                    </a>
                </div>
                <div class="mt-5 mb-3 text-center">
                    Beginner to Pro in Excel: Financial Modeling and Valuation
                    <div class="course-details">
                        <a href="#" class="btn btn-block btn-primary rounded">Inscreva-se</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal Create Course -->
<div class="modal fade" id="modalCreateCourse" tabindex="-1" role="dialog" aria-labelledby="modalCreateCourse" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateCourseLabel">Cadastrar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form enctype="multipart/form-data" method="post" action="<?php echo $GLOBALS['baseUrlPath'] ?>courses">

                <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Título*</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Título do curso"  required>
                        </div>
                        <div class="form-group">
                            <label for="description">Descrição*</label>
                            <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="link">Link*</label>
                            <input type="text" name="link" class="form-control" id="link" placeholder="Link do curso"  required>
                        </div>
                        <div class="custom-file w-50">
                            <label class="custom-file-label" for="image">Imagem do Curso*</label>
                            <input type="file" name="image" class="custom-file-input w-50" id="image" required>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>

            </form>

        </div>
    </div>
</div>

<!-- Modal Update/Delete Course -->
<div class="modal fade" id="modalEditCourse" tabindex="-1" role="dialog" aria-labelledby="modalEditCourse" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditCourseLabel">Atualizar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

                <div class="modal-body">

                    <form enctype="multipart/form-data" method="post" action="<?php echo $GLOBALS['baseUrlPath'] ?>courses/update">

                        <input type="hidden" name="id" id="update-id" value="">

                        <div class="form-group">
                            <label for="update-title">Título*</label>
                            <input type="text" name="title" class="form-control" id="update-title" placeholder="Título do curso"  required>
                        </div>
                        <div class="form-group">
                            <label for="update-description">Descrição*</label>
                            <textarea name="description" class="form-control" id="update-description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="update-link">Link*</label>
                            <input type="text" name="link" class="form-control" id="update-link" placeholder="Link do curso"  required>
                        </div>
                        <div class="custom-file w-50">
                            <label class="custom-file-label" for="update-image">Imagem do Curso</label>
                            <input type="file" name="image" class="custom-file-input w-50" id="update-image">
                        </div>
                        <div class="form-group col text-center">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>

                    </form>

                    <hr class="divider">

                    <form class="float-left mt-8" id="form-delete" method="get" action="<?php echo $GLOBALS['baseUrlPath'] ?>courses/delete/">
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>

        </div>
    </div>
</div>


</body>
</html>
