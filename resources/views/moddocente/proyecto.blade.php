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
      <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" href="{{asset('css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
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
         <div class="loader"><img src="{{asset('images/loading.gif')}}" alt="#" /></div>
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
        <table id="alumno" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
            <tbody> 
               <tr>
                  <form action="/carta_aceptacion" enctype="multipart/form-data" method="POST">
                     @csrf
                     <td style="color:black">
                        Carta de Aceptacion
                     </td>
                     <td>
                        @php
                           $alumno = App\Models\Alumno::where('id', $alumnoshow)->get();
                           $carta_aceptacion = DB::table('documents')->where([['type','carta aceptacion'],['alumno_id',$alumno[0]['id']]])->latest()->first();
                        @endphp
                        @if(isset($carta_aceptacion->id))
                        <input class="form-control" type="text" name='record' value="{{$carta_aceptacion->id}}" hidden>
                        <input class="form-control" type="text" name='alumno' value="{{$alumnoshow}}" hidden>
                        @endif
                        <input name="observacion" required type="text" class="form-control" 
                        value="{{ (isset($carta_aceptacion->nombre)) ? $carta_aceptacion->nombre : '' }}" tabindex="1" autocomplete="off">
                     </td>
                     <td>
                        @if(isset($carta_aceptacion->document))
                        <a href="{{asset("images/".$carta_aceptacion->document."")}}" target="_blank" class="btn btn-danger">Ver</a>
                        @endif
                     </td>
                     <td>
                        @if(isset($carta_aceptacion->id))
                        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
                        @endif
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
                        @php
                           $alumno = App\Models\Alumno::where('id', $alumnoshow)->get();
                           $carta_aceptacion = DB::table('documents')->where([['type','carta presentacion'],['alumno_id',$alumno[0]['id']]])->latest()->first();
                        @endphp
                        @if(isset($carta_aceptacion->id))
                        <input class="form-control" type="text" name='record' value="{{$carta_aceptacion->id}}" hidden>
                        <input class="form-control" type="text" name='alumno' value="{{$alumnoshow}}" hidden>
                        @endif
                        <input name="observacion" required type="text" class="form-control" 
                        value="{{ (isset($carta_aceptacion->nombre)) ? $carta_aceptacion->nombre : '' }}" tabindex="1" autocomplete="off">
                     </td>
                     <td>
                        @if(isset($carta_aceptacion->document))
                        <a href="{{asset("images/".$carta_aceptacion->document."")}}" target="_blank" class="btn btn-danger">Ver</a>
                        @endif
                     </td>
                     <td>
                        @if(isset($carta_aceptacion->id))
                        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
                        @endif
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
                        @php
                           $alumno = App\Models\Alumno::where('id', $alumnoshow)->get();
                           $titulo = DB::table('documents')->where([['type','titulo'],['alumno_id',$alumno[0]['id']]])->latest()->first();
                        @endphp
                        @if(isset($titulo->id))
                        <input class="form-control" type="text" name='record' value="{{$titulo->id}}" hidden>
                        <input class="form-control" type="text" name='alumno' value="{{$alumnoshow}}" hidden>
                        @endif
                        {{ (isset($titulo->nombre)) ? $titulo->nombre : '' }}
                     </td>
                     <td>
                        @if(isset($titulo->id))
                        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
                        @endif
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
                        @php
                           $alumno = App\Models\Alumno::where('id', $alumnoshow)->get();
                           $carta_aceptacion = DB::table('documents')->where([['type','reportes'],['alumno_id',$alumno[0]['id']]])->latest()->first();
                        @endphp
                        @if(isset($carta_aceptacion->id))
                        <input class="form-control" type="text" name='record' value="{{$carta_aceptacion->id}}" hidden>
                        <input class="form-control" type="text" name='alumno' value="{{$alumnoshow}}" hidden>
                        @endif
                        <input name="observacion" required type="text" class="form-control" 
                        value="{{ (isset($carta_aceptacion->nombre)) ? $carta_aceptacion->nombre : '' }}" tabindex="1" autocomplete="off">
                     </td>
                     <td>
                        @if(isset($carta_aceptacion->document))
                        <a href="{{asset("images/".$carta_aceptacion->document."")}}" target="_blank" class="btn btn-danger">Ver</a>
                        @endif
                     </td>
                     <td>
                        @if(isset($carta_aceptacion->id))
                        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
                        @endif
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
                        @php
                           $alumno = App\Models\Alumno::where('id', $alumnoshow)->get();
                           $carta_aceptacion = DB::table('documents')->where([['type','evaluaciones'],['alumno_id',$alumno[0]['id']]])->latest()->first();
                        @endphp
                        @if(isset($carta_aceptacion->id))
                        <input class="form-control" type="text" name='record' value="{{$carta_aceptacion->id}}" hidden>
                        <input class="form-control" type="text" name='alumno' value="{{$alumnoshow}}" hidden>
                        @endif
                        <input name="observacion" required type="text" class="form-control" 
                        value="{{ (isset($carta_aceptacion->nombre)) ? $carta_aceptacion->nombre : '' }}" tabindex="1" autocomplete="off">
                     </td>
                     <td>
                        @if(isset($carta_aceptacion->document))
                        <a href="{{asset("images/".$carta_aceptacion->document."")}}" target="_blank" class="btn btn-danger">Ver</a>
                        @endif
                     </td>
                     <td>
                        @if(isset($carta_aceptacion->id))
                        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
                        @endif
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
                        @php
                           $alumno = App\Models\Alumno::where('id', $alumnoshow)->get();
                           $carta_aceptacion = DB::table('documents')->where([['type','carta liberacion'],['alumno_id',$alumno[0]['id']]])->latest()->first();
                        @endphp
                        @if(isset($carta_aceptacion->id))
                        <input class="form-control" type="text" name='record' value="{{$carta_aceptacion->id}}" hidden>
                        <input class="form-control" type="text" name='alumno' value="{{$alumnoshow}}" hidden>
                        @endif
                        <input name="observacion" required type="text" class="form-control" 
                        value="{{ (isset($carta_aceptacion->nombre)) ? $carta_aceptacion->nombre : '' }}" tabindex="1" autocomplete="off">
                     </td>
                     <td>
                        @if(isset($carta_aceptacion->document))
                        <a href="{{asset("images/".$carta_aceptacion->document."")}}" target="_blank" class="btn btn-danger">Ver</a>
                        @endif
                     </td>
                     <td>
                        @if(isset($carta_aceptacion->id))
                        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
                        @endif
                     </td>
                  </form>
               </tr>
            </tbody>
         </table>
      </div>
<!-- service -->


      <!-- end Testimonial -->
      <!--  footer -->
      <footr>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-lg-2 col-md-6 col-sm-12 width">
                     <div class="address">
                        <h3>Address</h3>
                        <i><img src="{{asset('icon/3.png')}}">Locations</i>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-12 width">
                     <div class="address">
                        <h3>Menus</h3>
                        <i><img src="{{asset('icon/2.png')}}">Locations</i>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-12 width">
                     <div class="address">
                        <h3>Useful Linkes</h3>
                        <i><img src="{{asset('icon/1.png')}}">Locations</i>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-12 width">
                     <div class="address">
                        <h3>Social Media </h3>
                        <ul class="contant_icon">
                           <li><img src="{{asset('icon/fb.png')}}" alt="icon"/></li>
                           <li><img src="{{asset('icon/tw.png')}}" alt="icon"/></li>
                           <li><img src="{{asset('icon/lin(2).png')}}" alt="icon"/></li>
                           <li><img src="{{asset('icon/instagram.png')}}" alt="icon"/></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 width">
                     <div class="address">
                        <h3>Newsletter </h3>
                        <input class="form-control" placeholder="Enter your email" type="type" name="Enter your email">
                        <button class="submit-btn">Subscribe</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <p>Echo por Josue Gallosso Cruz</a></p>
            </div>
         </div>
      </footr>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="{{asset('js/jquery.min.js')}}"></script>
      <script src="{{asset('js/popper.min.js')}}"></script>
      <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{asset('js/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script src="{{asset('js/custom.js')}}"></script>
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
