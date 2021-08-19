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

        .info {
            width: 80%;
            margin: 0 auto;

        }

        .estudiante {
            width: 100%;
            margin: 1em auto;
            padding-left: 1.25em;
        }

        .fecha {
            text-align: right;
            padding-right: 1.25em;
        }

        .escu {
            text-align: right;
            padding-right: 1.25em;
            color: #ABB2B9;
        }

        .año {
            margin: 0 auto;
            text-align: center;
            color: #ABB2B9;
        }

        .añoo {
            width: 50%;
            margin: 0 auto;
            color: #ABB2B9;
        }
    </style>

    <header>


        <table style="border:none;">
            <tr style="logo" margin: 200px align='center'>
                <td WIDTH="200" style="border:none;">
                    <img src="https://www.omeyocan.edu.mx/img/logosep.png" width="170" height="55">
                </td>
                <td WIDTH="450" style="border:none;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/9d/TecNM_logo.png" width="150" height="55">
                </td>
            </tr>

        </table>

        <div class="info">
            <div class="escu">
                <h6>
                    Instituto Tecnológico del Valle de Oaxaca<BR>
                    Departamento de Ciencias Económico Administrativas
                </h6>
            </div>
        </div>
        <div class="añoo">
            <div class="año">
                <h6>
                    “2020, Año de Leona Vicario, Benemérita Madre de la Patria”
                </h6>
            </div>
        </div>

    </header>

    <div align=center;>
        <div>
            <b>
                ANEXO VI. ANÁLISIS ACADÉMICO DE CONVALIDACIÓN DE ESTUDIOS
            </b>
        </div>
    </div>
    <br>
    <div align=center;>
        <div>
            <b>
                Instituto Tecnológico del Valle de Oaxaca<BR>
                Análisis académico de convalidación de estudios
            </b>
        </div>
    </div>



    <br>
    <div class="info">
        <div class="fecha">Fecha: {{$convalidacion->fecha}}</div>
        <div class="estudiante">Nombre del estudiante: {{$convalidacion->nombre_alumno}}</div>
    </div>

    <br>
    <table>
        <thead>
            <tr>
                <th>De</th>
                <th>A</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nombre del Plan de Estudios: {{$convalidacion->planExterno->nombre}}</td>
                <td>Nombre del Plan de Estudios: {{$convalidacion->planInterno->nombre}}</td>
            </tr>
            <tr>
                <td>Clave del Plan de Estudios: {{$convalidacion->planExterno->clave}}</td>
                <td>Clave del Plan de Estudios: {{$convalidacion->planInterno->clave}}</td>
            </tr>
            <tr>
                <td>Institución de procedencia: {{$convalidacion->tecnologicoProcedente->nombre}}</td>
                <td>Institución receptora: {{$convalidacion->tecnologicoReceptor->nombre}}</td>
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

    <div align="center">
        <h5>
            Nota: Este formato contiene todas las asignaturas analizadas que ampara el certificado parcial o el kardex presentado.
        </h5>
    </div>
    <div>
        <table style="width: 100% ;border: hidden">
            <thead style="color: black; ">
                <tr>
                    <th style="width: 50%;">Documento analizado por:</th>
                    <th>Vo. Bo.</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <th> {{$convalidacion->elaboro?$convalidacion->elaboro->nombre:''}}</th>
                    <th> {{$convalidacion->valido?$convalidacion->valido->nombre:''}}</th>
                </tr>
                <tr>

                    <th> {{$convalidacion->elaboro?$convalidacion->elaboro->puesto->nombre:''}}</th>
                    <th> {{$convalidacion->valido?$convalidacion->valido->puesto->nombre:''}}</th>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <div align="center">
        <h5>
            c.c.p. Departamento de Servicios Escolares o su equivalente en los Institutos Tecnológicos
            Descentralizados.
        </h5>
    </div>

    <div align="left" style="color:#99A3A4;">
        <h5>
            1 Para el porcentaje se considera lo siguiente:<br>
            a) El contenido programado es menor al 60%.<br>
            b) Estas (dos o más) asignaturas cumplen, conjuntamente, con el contenido de la asignatura.
        </h5>
    </div>


    <footer>


        <div align="center" style="color:#99A3A4;">
            <h6>
                Ex hacienda de Nazareno s/n, Santa Cruz Xoxocotlán, Oaxaca; C.P 71230<br>
                Tel: 5170444-5170788 y 5173385<br>
                Email:cead_voaxaca64tecnm.mx<br>
                www.voaxaca.tecnm-mx<br>
            </h6>
        </div>

    </footer>

    <!-- </div> -->
</body>

</html>