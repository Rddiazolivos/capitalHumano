<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{config('app.name')}}</title>
    <meta name="description" content="This is a free Bootstrap landing page theme created for BootstrapZero. Feature video background and one page design." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/animate.min.css" />
    <link rel="stylesheet" href="./css/ionicons.min.css" />
    <link rel="stylesheet" href="./css/styles.css" />
  </head>
  <body>
    <nav id="topNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#first"><i class="ion-arrow-graph-up-right"></i> SDV</a>
            </div>
            <div class="navbar-collapse collapse" id="bs-navbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="page-scroll" href="#one">Nosotros</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#two">Características</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#three">Galeria</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#four">Servicio</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#last">Contacto</a>
                    </li>                                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Route::has('login'))
                        @if (Auth::check())
                            <li>
                                <a href="{{ url('/home') }}" class="page-scroll">Inicio</a>
                            </li>                            
                        @else
                            <li>
                                <a class="page-scroll" href="{{ url('/login') }}">Ingresar</a>
                            </li>
                        @endif
                    @endif
                    <li>
                        <a class="page-scroll" data-toggle="modal" title="A free Bootstrap video landing theme" href="#aboutModal">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header id="first">
        <div class="header-content">
            <div class="inner">
                <h1 class="cursive">Sistema de evaluación de desempeño</h1>
                <h4>Para organizaciones modernas que cuidan el talento.</h4>
                <hr>
                @if (Route::has('login'))
                    @if (Auth::check())
                        <a href="{{ url('/home') }}" class="btn btn-info btn-xl">Inicio</a> &nbsp; <a href="#one" class="btn btn-primary btn-xl page-scroll">Conócenos</a>
                    @else
                        <!-- <a href="{{ url('/login') }}" data-toggle="collapse" class="btn btn-primary btn-xl">Ingresar</a>
                        <a href="{{ url('/register') }}">Registrarse</a> -->
                        <a href="{{ url('/login') }}" class="btn btn-primary btn-xl">Ingresar</a> &nbsp; <a href="#one" class="btn btn-primary btn-xl page-scroll">Conócenos</a>
                    @endif
                @endif                
            </div>
        </div>
    </header>
    <section class="bg-primary" id="one">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 text-center">
                    <h2 class="margin-top-0 text-primary">SDV</h2>
                    <br>
                    <p class="text-faded">
                        El sistema SED, por sus siglas Sistema de Evaluación de Desempeño, tiene por principal finalidad automatizar, normalizar y agilizar las entrevistas de evaluación de desempeño realizadas a los trabajadores dentro de una organización.

                        Para lograr estos objetivos el sistema cuenta con tecnología de punta para crear una interfaz amigable y adaptable, fácil de usar.
                        Finalmente, el sistema genera reportes y documentos formales.
                    </p>
                    <a href="#three" class="btn btn-default btn-xl page-scroll">Leer más</a>
                </div>
            </div>
        </div>
    </section>
    <section id="two">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="margin-top-0 text-primary">Características</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 text-center">
                    <div class="feature">
                        <i class="icon-lg ion-android-phone-landscape wow fadeIn" data-wow-delay=".3s"></i>
                        <h3>Responsive</h3>
                        <p class="text-muted">Tu sitio se ve bien en todos lados</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 text-center">
                    <div class="feature">
                        <i class="icon-lg ion-ios-pie-outline wow fadeInUp" data-wow-delay=".2s"></i>
                        <h3>Especializada</h3>
                        <p class="text-muted">Especializada en la gestión del talento con el propósito de ser la mejor solución en evaluaciones de desempeño profesional.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 text-center">
                    <div class="feature">
                        <i class="icon-lg ion-android-globe wow fadeIn" data-wow-delay=".3s"></i>
                        <h3>Accesible</h3>
                        <p class="text-muted">Sistema accesible desde caulquier navegador moderno.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="three" class="no-padding">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6">
                    <a href="#galleryModal" class="gallery-box" data-toggle="modal" data-src="./img/deer.jpg">
                        <img src="./img/deer.jpg" class="img-responsive" alt="Image 1">
                        <div class="gallery-box-caption">
                            <div class="gallery-box-content">
                                <div>
                                    <i class="icon-lg ion-ios-search"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#galleryModal" class="gallery-box" data-toggle="modal" data-src="./img/beach.jpg">
                        <img src="./img/beach.jpg" class="img-responsive" alt="Image 2">
                        <div class="gallery-box-caption">
                            <div class="gallery-box-content">
                                <div>
                                    <i class="icon-lg ion-ios-search"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="clearfix hidden-lg"> </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#galleryModal" class="gallery-box" data-toggle="modal" data-src="./img/lake.jpg">
                        <img src="./img/lake.jpg" class="img-responsive" alt="Image 3">
                        <div class="gallery-box-caption">
                            <div class="gallery-box-content">
                                <div>
                                    <i class="icon-lg ion-ios-search"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#galleryModal" class="gallery-box" data-toggle="modal" data-src="./img/bike.jpg">
                        <img src="./img/bike.jpg" class="img-responsive" alt="Image 4">
                        <div class="gallery-box-caption">
                            <div class="gallery-box-content">
                                <div>
                                    <i class="icon-lg ion-ios-search"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="clearfix hidden-lg"> </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#galleryModal" class="gallery-box" data-toggle="modal" data-src="./img/city.jpg">
                        <img src="./img/city.jpg" class="img-responsive" alt="Image 5">
                        <div class="gallery-box-caption">
                            <div class="gallery-box-content">
                                <div>
                                    <i class="icon-lg ion-ios-search"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#galleryModal" class="gallery-box" data-toggle="modal" data-src="./img/colors.jpg">
                        <img src="./img/colors.jpg" class="img-responsive" alt="Image 6">
                        <div class="gallery-box-caption">
                            <div class="gallery-box-content">
                                <div>
                                    <i class="icon-lg ion-ios-search"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid" id="four">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <h2 class="text-center text-primary">Servicio</h2>
                <hr>
                <div class="media wow fadeInRight">
                    <h3>Simple</h3>
                    <div class="media-body media-middle">
                        <p>LLeva el control de tu organización en un solo lugar.</p>
                    </div>
                    <div class="media-right">
                        <i class="icon-lg ion-ios-bolt-outline"></i>
                    </div>
                </div>
                <hr>
                <div class="media wow fadeIn">
                    <h3>Conectado</h3>
                    <div class="media-left">
                        <a href="#alertModal" data-toggle="modal" data-target="#alertModal"><i class="icon-lg ion-ios-cloud-download-outline"></i></a>
                    </div>
                    <div class="media-body media-middle">
                        <p>Ingresa desde donde te encuentres.</p>
                    </div>
                </div>
                <hr>
                <div class="media wow fadeInRight">
                    <h3>Probado</h3>
                    <div class="media-body media-middle">
                        <p>El sistema cumple con altos estabdares de calidad.</p>
                    </div>
                    <div class="media-right">
                        <i class="icon-lg ion-ios-flask-outline"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2 class="text-primary">Comenzar</h2>
            </div>
            <br>
            <hr/>
            <br>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="row">
                        <h6 class="wide-space text-center">SDV</h6>
                        <div class="col-sm-3 col-xs-6 text-center">
                            <i class="icon-lg ion-social-html5-outline" title="html 5"></i>
                        </div>
                        <div class="col-sm-3 col-xs-6 text-center">
                            <i class="icon-lg ion-android-globe" title="PHP"></i>
                        </div>
                        <div class="col-sm-3 col-xs-6 text-center">
                            <i class="icon-lg ion-social-javascript-outline" title="javascript"></i>
                        </div>
                        <div class="col-sm-3 col-xs-6 text-center">
                            <i class="icon-lg ion-social-css3-outline" title="css 3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <section id="last">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="margin-top-0 wow fadeIn">Escribenos</h2>
                    <hr class="primary">
                    <p>Complete el siguiente formulario y nos pondremos en contacto con usted lo antes posible.</p>
                </div>
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <form class="contact-form row">
                        <div class="col-md-4">
                            <label></label>
                            <input type="text" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="col-md-4">
                            <label></label>
                            <input type="text" class="form-control" placeholder="Correo">
                        </div>
                        <div class="col-md-4">
                            <label></label>
                            <input type="text" class="form-control" placeholder="Teléfono">
                        </div>
                        <div class="col-md-12">
                            <label></label>
                            <textarea class="form-control" rows="9" placeholder="Tu mensaje aquí.."></textarea>
                        </div>
                        <div class="col-md-4 col-md-offset-4">
                            <label></label>
                            <button type="button" data-toggle="modal" data-target="#alertModal" class="btn btn-primary btn-block btn-lg">Enviar <i class="ion-android-arrow-forward"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-6 col-sm-3 column">
                    <h4>Información</h4>
                    <ul class="list-unstyled">
                        <li><a href="">Productos</a></li>
                        <li><a href="">Servicios</a></li>
                        <li><a href="">Beneficios</a></li>
                        <li><a href="">Desarrolladores</a></li>
                    </ul>
                </div>
                <div class="col-xs-6 col-sm-3 column">
                    <h4>Acerca</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">Contactenos</a></li>
                        <li><a href="#">Terminos &amp; Condiciones</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-3 column">
                    <h4>Mantente al dia.</h4>
                    <form>
                        <div class="form-group">
                          <input type="text" class="form-control" title="No spam, te lo prometemos!" placeholder="Tu Correo">
                        </div>
                        <div class="form-group">
                          <button class="btn btn-primary" data-toggle="modal" data-target="#alertModal" type="button">Subscribete</button>
                        </div>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-3 text-right">
                    <h4>Síguenos</h4>
                    <ul class="list-inline">
                      <li><a rel="nofollow" href="" title="Twitter"><i class="icon-lg ion-social-twitter-outline"></i></a>&nbsp;</li>
                      <li><a rel="nofollow" href="" title="Facebook"><i class="icon-lg ion-social-facebook-outline"></i></a>&nbsp;</li>
                    </ul>
                </div>
            </div>
            <br/>
            <span class="pull-right text-muted small"><a href="http://www.bootstrapzero.com">SDV</a> ©2017</span>
        </div>
    </footer>
    <div id="galleryModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <img src="" id="galleryImage" class="img-responsive" />
                <p>
                    <br/>
                    <button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true">Cerrar <i class="ion-android-close"></i></button>
                </p>
            </div>
        </div>
        </div>
    </div>
    <div id="aboutModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="text-center">SDV</h2>
                <h5 class="text-center">
                    Para organizaciones modernas que cuidan el talento
                </h5>
                <p class="text-justify">
                    El sistema SED, por sus siglas Sistema de Evaluación de Desempeño, tiene por principal finalidad automatizar, normalizar y agilizar las entrevistas de evaluación de desempeño realizadas a los trabajadores dentro de una organización. Para lograr estos objetivos el sistema cuenta con tecnología de punta para crear una interfaz amigable y adaptable, fácil de usar. Finalmente, el sistema genera reportes y documentos formales.
                </p>
                <br/>
                <button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true"> OK </button>
            </div>
        </div>
        </div>
    </div>
    <div id="alertModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="text-center">Nice Job!</h2>
                <p class="text-center">You clicked the button, but it doesn't actually go anywhere because this is only a demo.</p>
                <p class="text-center"><a href="http://www.bootstrapzero.com">Learn more at BootstrapZero</a></p>
                <br/>
                <button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true">OK <i class="ion-android-close"></i></button>
            </div>
        </div>
        </div>
    </div>
    <!--scripts loaded here -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery.easing.min.js"></script>
    <script src="./js/wow.js"></script>
    <script src="./js/scripts.js"></script>
  </body>
</html>