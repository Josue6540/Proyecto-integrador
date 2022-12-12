<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Título</th>
            <th>Carta Aceptación</th>
            <th>Carta Presentación</th>
            <th>Reportes</th>
            <th>Evaluaciones</th>
            <th>Carta Liberación</th>
        </tr>
    </thead>
    <tbody>
        <!--{{ $cont=1 }}-->
        @foreach($query as $alumno)
            <tr>
                <td>{{$cont++}}</td>
                <td>
                    @php
                        $student = DB::table('users')->where('id', $alumno->alumno)->first();
                    @endphp
                    {{$student->name}} {{$student->paterno}} {{$student->materno}}
                </td>
                <td>
                    @php
                        $stu = DB::table('alumnos')->where('user_id', $alumno->alumno)->first();
                        $titulo = DB::table('documents')->where([['alumno_id', $stu->id], ['type','titulo']])->latest()->first();
                        echo $titulo->nombre;
                    @endphp
                </td>
                <td>
                    @php
                        $stu = DB::table('alumnos')->where('user_id', $alumno->alumno)->first();
                        $ct_ac = DB::table('documents')->where([['alumno_id', $stu->id], ['type','carta aceptacion']])->count();
                        if($ct_ac > 0){
                            echo 'Entregado';
                        }else{
                            echo 'No Entregado';
                        }
                    @endphp
                </td>
                <td>
                    @php
                        $stu = DB::table('alumnos')->where('user_id', $alumno->alumno)->first();
                        $ct_pr = DB::table('documents')->where([['alumno_id', $stu->id], ['type','carta presentacion']])->count();
                        if($ct_pr > 0){
                            echo 'Entregado';
                        }else{
                            echo 'No Entregado';
                        }
                    @endphp
                </td>
                <td>
                    @php
                        $stu = DB::table('alumnos')->where('user_id', $alumno->alumno)->first();
                        $report = DB::table('documents')->where([['alumno_id', $stu->id], ['type','reportes']])->count();
                        if($report > 0){
                            echo 'Entregado ('.$report.')';
                        }else{
                            echo 'No Entregado';
                        }
                    @endphp
                </td>
                <td>
                    @php
                        $stu = DB::table('alumnos')->where('user_id', $alumno->alumno)->first();
                        $eval = DB::table('documents')->where([['alumno_id', $stu->id], ['type','evaluaciones']])->count();
                        if($eval > 0){
                            echo 'Entregado ('.$eval.')';
                        }else{
                            echo 'No Entregado';
                        }
                    @endphp
                </td>
                <td>
                    @php
                        $stu = DB::table('alumnos')->where('user_id', $alumno->alumno)->first();
                        $ct_li = DB::table('documents')->where([['alumno_id', $stu->id], ['type','carta liberacion']])->count();
                        if($ct_li > 0){
                            echo 'Entregado';
                        }else{
                            echo 'No Entregado';
                        }
                    @endphp
                </td>
            </tr>
        @endforeach
    </tbody>
</table>