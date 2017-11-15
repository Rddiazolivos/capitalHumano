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
                <a class="navbar-brand page-scroll" href="/"><i class="ion-arrow-graph-up-right"></i> SDV</a>
            </div>
            <div class="navbar-collapse collapse" id="bs-navbar">            
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
                <h1 class="cursive wow pulse">Sistema de evaluación de desempeño</h1>
                <h4 class="wow pulse">Para organizaciones modernas que cuidan el talento.</h4>
                <hr class="primary">
                @if (Route::has('login'))
                    @if (Auth::check())
                        <a href="{{ url('/home') }}" class="btn btn-info btn-xl">Inicio</a> &nbsp; <a href="#one" class="btn btn-primary btn-xl page-scroll">Conócenos</a>
                    @else
                        <!-- <a href="{{ url('/login') }}" data-toggle="collapse" class="btn btn-primary btn-xl">Ingresar</a>
                        <a href="{{ url('/register') }}">Registrarse</a>
                        <a href="{{ url('/login') }}" class="btn btn-primary btn-xl">Ingresar</a> &nbsp; <a href="#one" class="btn btn-primary btn-xl page-scroll">Conócenos</a>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Iniciar
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    ¿Olvidada?
                                </a>
                            </div>
                        </div> -->

            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 col-sm-8 col-sm-offset-2 text-center bounceInLeft animated">
                    <form class="contact-form row" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-4 col-md-offset-2">
                            <label for="email">Correo</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo" spellcheck="false" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-4">
                            <label for="password">Contraseña</label>
                            <input id="password" type="password" class="form-control" name="password" placeholder="*****" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-4 col-md-offset-4">
                            <label></label>
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Iniciar sesión <i class="ion-android-arrow-forward"></i></button>
                        </div>
                    </form>
                </div>
            </div>
                    @endif
                @endif                
            </div>
        </div>
    </header>
    
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
                <h2 class="text-center">Buen trabajo!</h2>
                <p class="text-center">Solo Demo.</p>
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