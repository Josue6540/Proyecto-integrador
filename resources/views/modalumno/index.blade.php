<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>UTGZ</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <script src="https://kit.fontawesome.com/ea114b5d29.js" crossorigin="anonymous"></script>
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo"> <a href="/">UTGZ</a> </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                  <div class="menu-area">
                     <div class="limit-box">
                        <nav class="main-menu">
                            <ul class="menu-area-main">
                                @auth
                                @if(Auth::user()->rol === 'docente')
                                <li> <a href="/alumnosasignados">Alumnos Asignados</a> </li>
                                @elseif(Auth::user()->rol === 'alumno')
                                <li> <a href="/documents">Proyecto</a> </li>
                                @endif
                                <li>
                                   <form action="{{route('logout')}}" method="post">
                                      @csrf()
                                      <input type="submit"class='btn btn-success'value="Cerrar Sesion">
                                   </form>
                                </li>
                                @endauth

                                  @guest
                                   <li> <a href="{{ route('login') }}">Iniciar sesion</a> </li>
                                   <li> <a href="{{ route('register') }}">Registrar</a> </li>
                                  @endguest

                             </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
      </header>
      <!-- end header -->
      <div class="container">

        <h2>Recuerda cargar tus documentos a tiempo!</h2>

      <table id="alumno" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
         <tbody>
            <tr>
               <form action="/carta_aceptacion" enctype="multipart/form-data" method="POST">
                  @csrf
                  <td style="color:black">
                     Carta de Aceptacion
                  </td>
                  <td>
                     <input class="form-control" type="file" name='carta_aceptacion' required>
                  </td>
                  <td>
                     @php
                        $alumno = App\Models\Alumno::where('user_id', Auth::user()->id)->get();
                        $carta_aceptacion = DB::table('documents')->where([['type','carta aceptacion'],['alumno_id',$alumno[0]['id']]])->latest()->first();
                     @endphp
                     <input name="observacion" required type="text" class="form-control"
                     value="{{ (isset($carta_aceptacion->nombre)) ? $carta_aceptacion->nombre : '' }}" tabindex="1" autocomplete="off">
                  </td>
                  <td>
                     @if(isset($carta_aceptacion->document))
                     <a href="{{asset("images/".$carta_aceptacion->document."")}}" target="_blank" class="btn btn-danger">Ver</a>
                     @endif
                  </td>
                  <td>
                     <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
                  </td>
               </form>
            </tr>
            <tr>
               <form action="/carta_presentacion" enctype="multipart/form-data" method="POST">
                  @csrf
                  <td style="color:black">
                     Carta de Precentacion
                  </td>
                  <td>
                     <input class="form-control" type="file" id="logo" name='carta_presentacion' required>
                  </td>
                  <td>
                     @php
                        $alumno = App\Models\Alumno::where('user_id', Auth::user()->id)->get();
                        $carta_aceptacion = DB::table('documents')->where([['type','carta presentacion'],['alumno_id',$alumno[0]['id']]])->latest()->first();
                     @endphp
                     <input name="observacion" required type="text" class="form-control"
                     value="{{ (isset($carta_aceptacion->nombre)) ? $carta_aceptacion->nombre : '' }}" tabindex="1" autocomplete="off">
                  </td>
                  <td>
                     @if(isset($carta_aceptacion->document))
                     <a href="{{asset("images/".$carta_aceptacion->document."")}}" target="_blank" class="btn btn-danger">Ver</a>
                     @endif
                  </td>
                  <td>
                     <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
                  </td>
               </form>
            </tr>
            <tr>
               <form action="/titulo" method="POST">
                  @csrf
                  <td style="color:black">
                     Titulo de proyecto
                  </td>
                  <td>
                     <input name="titulo" required type="text" class="form-control" tabindex="1" autocomplete="off">
                  </td>
                  <td>

                  </td>
                  <td>
                     @php
                        $alumno = App\Models\Alumno::where('user_id', Auth::user()->id)->get();
                        $titulo = DB::table('documents')->where([['type','titulo'],['alumno_id',$alumno[0]['id']]])->latest()->first();
                     @endphp
                     {{ (isset($titulo->nombre)) ? $titulo->nombre : '' }}
                  </td>
                  <td>
                     <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
                  </td>
               </form>
            </tr>
            <tr>
               <form action="/reportes" enctype="multipart/form-data" method="POST">
                  @csrf
                  <td style="color:black">
                     Reportes
                  </td>
                  <td>
                     <input class="form-control" type="file" id="logo" name='reportes' required>
                  </td>
                  <td>
                     @php
                        $alumno = App\Models\Alumno::where('user_id', Auth::user()->id)->get();
                        $carta_aceptacion = DB::table('documents')->where([['type','reportes'],['alumno_id',$alumno[0]['id']]])->latest()->first();
                     @endphp
                     <input name="observacion" required type="text" class="form-control"
                     value="{{ (isset($carta_aceptacion->nombre)) ? $carta_aceptacion->nombre : '' }}" tabindex="1" autocomplete="off">
                  </td>
                  <td>
                     @if(isset($carta_aceptacion->document))
                     <a href="{{asset("images/".$carta_aceptacion->document."")}}" target="_blank" class="btn btn-danger">Ver</a>
                     @endif
                  </td>
                  <td>
                     <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
                  </td>
               </form>
            </tr>
            <tr>
               <form action="/evaluaciones" enctype="multipart/form-data" method="POST">
                  @csrf
                  <td style="color:black">
                     Evaluaciones
                  </td>
                  <td>
                     <input class="form-control" type="file" id="logo" name='evaluaciones' required>
                  </td>
                  <td>
                     @php
                        $alumno = App\Models\Alumno::where('user_id', Auth::user()->id)->get();
                        $carta_aceptacion = DB::table('documents')->where([['type','evaluaciones'],['alumno_id',$alumno[0]['id']]])->latest()->first();
                     @endphp
                     <input name="observacion" required type="text" class="form-control"
                     value="{{ (isset($carta_aceptacion->nombre)) ? $carta_aceptacion->nombre : '' }}" tabindex="1" autocomplete="off">
                  </td>
                  <td>
                     @if(isset($carta_aceptacion->document))
                     <a href="{{asset("images/".$carta_aceptacion->document."")}}" target="_blank" class="btn btn-danger">Ver</a>
                     @endif
                  </td>
                  <td>
                     <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
                  </td>
               </form>
            </tr>
            <tr>
               <form action="/carta_liberacion" enctype="multipart/form-data" method="POST">
                  @csrf
                  <td style="color:black">
                     Carta de Liberacion
                  </td>
                  <td>
                     <input class="form-control" type="file" id="logo" name='carta_liberacion' required>
                  </td>
                  <td>
                     @php
                        $alumno = App\Models\Alumno::where('user_id', Auth::user()->id)->get();
                        $carta_aceptacion = DB::table('documents')->where([['type','carta liberacion'],['alumno_id',$alumno[0]['id']]])->latest()->first();
                     @endphp
                     <input name="observacion" required type="text" class="form-control"
                     value="{{ (isset($carta_aceptacion->nombre)) ? $carta_aceptacion->nombre : '' }}" tabindex="1" autocomplete="off">
                  </td>
                  <td>
                     @if(isset($carta_aceptacion->document))
                     <a href="{{asset("images/".$carta_aceptacion->document."")}}" target="_blank" class="btn btn-danger">Ver</a>
                     @endif
                  </td>
                  <td>
                     <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
                  </td>
               </form>
            </tr>
         </tbody>
      </table>

        </div>


<!-- service -->


      <!-- end Testimonial -->
      <!--  footer -->


      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script src="js/custom.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });

         $(".zoom").hover(function(){

         $(this).addClass('transition');
         }, function(){

         $(this).removeClass('transition');
         });
         });

      </script>
   </body>
</html>
