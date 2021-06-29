<html>




<body>
    <style>
        body {
            width: 100%;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border: 1px solid black;
            border-collapse: collapse;
        }

        thead,
        tbody {
            width: 100%;
        }

        th,
        td {
            /* width: 100%; */
            border: 1px solid black;
            border-collapse: collapse;
        }
        .info{
            width: 80%;
            margin: 0 auto;
        }

        .estudiante {
            width: 100%;
            margin: 1em auto;
            padding-left: 1.25em;
        }
        .fecha{
            text-align: right;
            padding-right: 1.25em;
        }

    </style>
    <div class="info">
        <div class="fecha">Fecha: {{$convalidacion->fecha}}</div>
        <div class="estudiante">Nombre del estudiante: {{$convalidacion->nombre_alumno}}</div>
    </div>
    <table>
        <thead>
            <tr>
                <th>De</th>
                <th>A</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nombre del Plan de Estudios: {{$convalidacion->plan_externo}}</td>
                <td>Nombre del Plan de Estudios: {{$convalidacion->plan_interno}}</td>
            </tr>
            <tr>
                <td>Clave del Plan de Estudios: {{$convalidacion->plan_externo_clave}}</td>
                <td>Clave del Plan de Estudios: {{$convalidacion->plan_interno_clave}}</td>
            </tr>
            <tr>
                <td>Institución de procedencia: {{$convalidacion->tecnologico_procedente}}</td>
                <td>Institución receptora: {{$convalidacion->tecnologico_receptor}}</td>
            </tr>
        </tbody>
    </table>
    <!-- </div> -->
    <!-- </div> -->
    <br><br><br>
    <!-- <div class="tabla-conv"> -->
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Asignatura cursada</th>
                <th>Clave de asignatura</th>
                <th>Calificación</th>
                <th>Asignatura a convalidar</th>
                <th>Clave de asignatura a convalidar</th>
                <th> Porcentaje %</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materias_convalidadas as $key => $materia)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$materia->cursada}}</td>
                <td>{{$materia->cursada_clave}}</td>
                <td>{{$materia->calificacion}}</td>
                <td>{{$materia->convalidada}}</td>
                <td>{{$materia->convalidada_clave}}</td>
                <td>{{$materia->porcentaje}}</td>
            </tr>

            @endforeach


        </tbody>
    </table>
    <!-- </div> -->
</body>

</html>