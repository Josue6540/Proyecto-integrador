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
      <div style="margin-right: 25px;margin-left: 25px">

        <h2>Recuerda cargar tus documentos a tiempo!</h2>
      
      <table id="alumno" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
         <tbody> 
            <tr>
               <form action="/carta_aceptacion" enctype="multipart/form-data" method="POST">
                  @csrf
                  <td style="color:black">
                     Carta de Aceptacion
                     @php
                        $alumno = App\Models\Alumno::where('user_id', Auth::user()->id)->get();
                        $carta_aceptacion = DB::table('documents')->where([['type','carta aceptacion'],['alumno_id',$alumno[0]['id']]])->latest()->first();
                     @endphp
                  </td>
                  <td>
                     <input class="form-control" type="file" name='carta_aceptacion' required>
                  </td>
                  <td>
                     @if(isset($carta_aceptacion->document))
                     <a href="{{asset("images/".$carta_aceptacion->document."")}}" target="_blank" class="btn btn-danger">Ver</a>
                     @endif
                  </td>
                  <td>
                     <button type="submit" class="btn btn-primary" tabindex="4">Guardar Documento</button>
                  </td>
               </form>
                  <td>
                     @if(isset($carta_aceptacion->document))
                        <form action="/addcomment" method="post">
                           @csrf
                           <input name="type" required type="text" class="form-control" tabindex="1" autocomplete="off" value="{{$carta_aceptacion->type}}" hidden>
                           <input name="alumno" required type="text" class="form-control" tabindex="1" autocomplete="off" value="{{$carta_aceptacion->alumno_id}}" hidden>
                           <input name="comment" required type="text" class="form-control" tabindex="1" autocomplete="off">
                           <button type="submit" class="btn btn-primary" tabindex="4">Guardar Comentario</button>
                        </form>
                     @endif
                  </td>
                  <td style="color:black">
                     @if(isset($carta_aceptacion->document))
                        @php
                           $carta_aceptacion_comments = DB::table('comments_document')->where([['type', $carta_aceptacion->type],['alumno_id', $carta_aceptacion->alumno_id]])->orderBy('created_at','DESC')->get();
                        @endphp
                        @foreach ($carta_aceptacion_comments as $item)
                           > {{ $item->comment}} <br> ( {{ $item->created_at }} ) <br> 
                           <!--<form action="/deletecomment/{{$item->id}}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-danger">Borrar</button>
                           </form>-->
                        @endforeach
                     @endif
                  </td>
            </tr>
            <tr>
               <form action="/carta_presentacion" enctype="multipart/form-data" method="POST">
                  @csrf
                  <td style="color:black">
                     Carta de Precentacion
                     @php
                        $alumno = App\Models\Alumno::where('user_id', Auth::user()->id)->get();
                        $carta_presentacion = DB::table('documents')->where([['type','carta presentacion'],['alumno_id',$alumno[0]['id']]])->latest()->first();
                     @endphp
                  </td>
                  <td>
                     <input class="form-control" type="file" id="logo" name='carta_presentacion' required>
                  </td>
                  <td>
                     @if(isset($carta_presentacion->document))
                     <a href="{{asset("images/".$carta_presentacion->document."")}}" target="_blank" class="btn btn-danger">Ver</a>
                     @endif
                  </td>
                  <td>
                     @if(isset($carta_aceptacion->document))
                     <button type="submit" class="btn btn-primary" tabindex="4">Guardar Documento</button>
                     @endif
                  </td>
               </form>
                  <td>
                     @if(isset($carta_presentacion->document))
                        <form action="/addcomment" method="post">
                           @csrf
                           <input name="type" required type="text" class="form-control" tabindex="1" autocomplete="off" value="{{$carta_presentacion->type}}" hidden>
                           <input name="alumno" required type="text" class="form-control" tabindex="1" autocomplete="off" value="{{$carta_presentacion->alumno_id}}" hidden>
                           <input name="comment" required type="text" class="form-control" tabindex="1" autocomplete="off">
                           <button type="submit" class="btn btn-primary" tabindex="4">Guardar Comentario</button>
                        </form>
                     @endif
                  </td>
                  <td style="color:black">
                     @if(isset($carta_presentacion->document))
                        @php
                           $carta_presentacion_comments = DB::table('comments_document')->where([['type', $carta_presentacion->type],['alumno_id', $carta_presentacion->alumno_id]])->orderBy('created_at','DESC')->get();
                        @endphp
                        @foreach ($carta_presentacion_comments as $item)
                           > {{ $item->comment}} <br> ( {{ $item->created_at }} ) <br> 
                           <!--<form action="/deletecomment/{{$item->id}}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-danger">Borrar</button>
                           </form>-->
                        @endforeach
                     @endif
                  </td>
            </tr>
            <tr>
               <form action="/titulo" method="POST">
                  @csrf
                  <td style="color:black">
                     Titulo de proyecto
                     @php
                        $alumno = App\Models\Alumno::where('user_id', Auth::user()->id)->get();
                        $titulo = DB::table('documents')->where([['type','titulo'],['alumno_id',$alumno[0]['id']]])->latest()->first();
                     @endphp
                  </td>
                  <td>
                     <input name="titulo" required type="text" class="form-control" tabindex="1" autocomplete="off">
                  </td>
                  <td>
                     {{ (isset($titulo->nombre)) ? $titulo->nombre : '' }}
                  </td>
                  <td>
                     @if(isset($carta_presentacion->document))
                     <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
                     @endif
                  </td>
               </form>
               <td>
                  @if(isset($titulo->nombre))
                     <form action="/addcomment" method="post">
                        @csrf
                        <input name="type" required type="text" class="form-control" tabindex="1" autocomplete="off" value="{{$titulo->type}}" hidden>
                        <input name="alumno" required type="text" class="form-control" tabindex="1" autocomplete="off" value="{{$titulo->alumno_id}}" hidden>
                        <input name="comment" required type="text" class="form-control" tabindex="1" autocomplete="off">
                        <button type="submit" class="btn btn-primary" tabindex="4">Guardar Comentario</button>
                     </form>
                  @endif
               </td>
               <td style="color:black">
                  @if(isset($titulo->nombre))
                     @php
                        $titulo_comments = DB::table('comments_document')->where([['type', $titulo->type],['alumno_id', $titulo->alumno_id]])->orderBy('created_at','DESC')->get();
                     @endphp
                     @foreach ($titulo_comments as $item)
                        > {{ $item->comment}} <br> ( {{ $item->created_at }} ) <br> 
                        <!--<form action="/deletecomment/{{$item->id}}" method="POST">
                           @csrf
                           <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>-->
                     @endforeach
                  @endif
               </td>
            </tr>
            <tr>
               <form action="/reportes" enctype="multipart/form-data" method="POST">
                  @csrf
                  <td style="color:black">
                     Reportes
                     @php
                        $alumno = App\Models\Alumno::where('user_id', Auth::user()->id)->get();
                        $reportes = DB::table('documents')->where([['type','reportes'],['alumno_id',$alumno[0]['id']]])->latest()->first();
                     @endphp
                  </td>
                  <td>
                     <input class="form-control" type="file" id="logo" name='reportes' required>
                  </td>
                  <td>
                     @if(isset($carta_presentacion->document))
                     <button type="submit" class="btn btn-primary" tabindex="4">Guardar Documento</button>
                     @endif
                  </td>
               </form>
               <td>
                  @if(isset($reportes->document))
                  @php
                  $alumno = App\Models\Alumno::where('user_id', Auth::user()->id)->get();
                  $reportes2 = DB::table('documents')->where([['type','reportes'],['alumno_id',$alumno[0]['id']]])->get();
                  @endphp
                  <!--{{ $cont=1 }}-->
                  @if (isset($reportes2))
                     @foreach($reportes2 as $item)
                        <a href="{{asset("images/".$item->document."")}}" target="_blank" class="btn btn-danger mb-2">Ver R{{$cont++}}</a>
                        <br>
                        <form action="/deletedocument/{{$item->id}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">Borrar</button>
                        </form>
                        <br>
                        <br>
                     @endforeach
                  @endif
                  @endif
               </td>
               <td>
                  @if(isset($reportes->document))
                     <form action="/addcomment" method="post">
                        @csrf
                        <input name="type" required type="text" class="form-control" tabindex="1" autocomplete="off" value="{{$reportes->type}}" hidden>
                        <input name="alumno" required type="text" class="form-control" tabindex="1" autocomplete="off" value="{{$reportes->alumno_id}}" hidden>
                        <input name="comment" required type="text" class="form-control" tabindex="1" autocomplete="off">
                        <button type="submit" class="btn btn-primary" tabindex="4">Guardar Comentario</button>
                     </form>
                  @endif
               </td>
               <td style="color:black">
                  @if(isset($reportes->document))
                     @php
                        $reportes_comments = DB::table('comments_document')->where([['type', $reportes->type],['alumno_id', $reportes->alumno_id]])->orderBy('created_at','DESC')->get();
                     @endphp
                     @foreach ($reportes_comments as $item)
                        > {{ $item->comment}} <br> ( {{ $item->created_at }} ) <br> 
                        <!--<form action="/deletecomment/{{$item->id}}" method="POST">
                           @csrf
                           <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>-->
                     @endforeach
                  @endif
               </td>
            </tr>
            <tr>
               <form action="/evaluaciones" enctype="multipart/form-data" method="POST">
                  @csrf
                  <td style="color:black">
                     Evaluaciones
                     @php
                        $alumno = App\Models\Alumno::where('user_id', Auth::user()->id)->get();
                        $evaluaciones = DB::table('documents')->where([['type','evaluaciones'],['alumno_id',$alumno[0]['id']]])->latest()->first();
                     @endphp
                  </td>
                  <td>
                     <input class="form-control" type="file" id="logo" name='evaluaciones' required>
                  </td>
                  <td>
                     @if (isset($reportes2))
                     @if($reportes2->count() === 3)
                     <button type="submit" class="btn btn-primary" tabindex="4">Guardar Documento</button>
                     @endif
                     @endif
                  </td>
               </form>
               <td>
                  @if(isset($evaluaciones->document))
                  @php
                  $alumno = App\Models\Alumno::where('user_id', Auth::user()->id)->get();
                  $evaluaciones2 = DB::table('documents')->where([['type','evaluaciones'],['alumno_id',$alumno[0]['id']]])->get();
                  @endphp
                  <!--{{ $cont=1 }}-->
                  @if(isset($evaluaciones2))
                     @foreach($evaluaciones2 as $item)
                        <a href="{{asset("images/".$item->document."")}}" target="_blank" class="btn btn-danger mb-2">Ver EV{{$cont++}}</a>
                        <br>
                        <form action="/deletedocument/{{$item->id}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">Borrar</button>
                        </form>
                        <br>
                        <br>
                     @endforeach
                  @endif
                  @endif
               </td>
               <td>
                  @if(isset($evaluaciones->document))
                     <form action="/addcomment" method="post">
                        @csrf
                        <input name="type" required type="text" class="form-control" tabindex="1" autocomplete="off" value="{{$evaluaciones->type}}" hidden>
                        <input name="alumno" required type="text" class="form-control" tabindex="1" autocomplete="off" value="{{$evaluaciones->alumno_id}}" hidden>
                        <input name="comment" required type="text" class="form-control" tabindex="1" autocomplete="off">
                        <button type="submit" class="btn btn-primary" tabindex="4">Guardar Comentario</button>
                     </form>
                  @endif
               </td>
               <td style="color:black">
                  @if(isset($evaluaciones->document))
                     @php
                        $evaluaciones_comments = DB::table('comments_document')->where([['type', $evaluaciones->type],['alumno_id', $evaluaciones->alumno_id]])->orderBy('created_at','DESC')->get();
                     @endphp
                     @foreach ($evaluaciones_comments as $item)
                        > {{ $item->comment}} <br> ( {{ $item->created_at }} ) <br> 
                        <!--<form action="/deletecomment/{{$item->id}}" method="POST">
                           @csrf
                           <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>-->
                     @endforeach
                  @endif
               </td>
            </tr>
            <tr>
               <form action="/carta_liberacion" enctype="multipart/form-data" method="POST">
                  @csrf
                  <td style="color:black">
                     Carta de Liberacion
                     @php
                        $alumno = App\Models\Alumno::where('user_id', Auth::user()->id)->get();
                        $carta_liberacion = DB::table('documents')->where([['type','carta liberacion'],['alumno_id',$alumno[0]['id']]])->latest()->first();
                     @endphp
                  </td>
                  <td>
                     <input class="form-control" type="file" id="logo" name='carta_liberacion' required>
                  </td>
                  <td>
                     @if(isset($carta_liberacion->document))
                     <a href="{{asset("images/".$carta_liberacion->document."")}}" target="_blank" class="btn btn-danger">Ver</a>
                     @endif
                  </td>
                  <td>
                     @if(isset($evaluaciones2))
                     @if($evaluaciones2->count() === 3)
                     <button type="submit" class="btn btn-primary" tabindex="4">Guardar DOcumento</button>
                     @endif
                     @endif
                  </td>
               </form>
               <td>
                  @if(isset($carta_liberacion->document))
                     <form action="/addcomment" method="post">
                        @csrf
                        <input name="type" required type="text" class="form-control" tabindex="1" autocomplete="off" value="{{$carta_liberacion->type}}" hidden>
                        <input name="alumno" required type="text" class="form-control" tabindex="1" autocomplete="off" value="{{$carta_liberacion->alumno_id}}" hidden>
                        <input name="comment" required type="text" class="form-control" tabindex="1" autocomplete="off">
                        <button type="submit" class="btn btn-primary" tabindex="4">Guardar Comentario</button>
                     </form>
                  @endif
               </td>
               <td style="color:black">
                  @if(isset($carta_liberacion->document))
                     @php
                        $carta_liberacion_comments = DB::table('comments_document')->where([['type', $carta_liberacion->type],['alumno_id', $carta_liberacion->alumno_id]])->orderBy('created_at','DESC')->get();
                     @endphp
                     @foreach ($carta_liberacion_comments as $item)
                        > {{ $item->comment}} <br> ( {{ $item->created_at }} ) <br> 
                        <!--<form action="/deletecomment/{{$item->id}}" method="POST">
                           @csrf
                           <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>-->
                     @endforeach
                  @endif
               </td>
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
                        <i><img src="icon/3.png">Locations</i>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-12 width">
                     <div class="address">
                        <h3>Menus</h3>
                        <i><img src="icon/2.png">Locations</i>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-12 width">
                     <div class="address">
                        <h3>Useful Linkes</h3>
                        <i><img src="icon/1.png">Locations</i>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-12 width">
                     <div class="address">
                        <h3>Social Media </h3>
                        <ul class="contant_icon">
                           <li><img src="icon/fb.png" alt="icon"/></li>
                           <li><img src="icon/tw.png" alt="icon"/></li>
                           <li><img src="icon/lin(2).png" alt="icon"/></li>
                           <li><img src="icon/instagram.png" alt="icon"/></li>
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
