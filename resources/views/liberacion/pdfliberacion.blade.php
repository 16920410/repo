<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
    table {
        /* width: 200px; */
        margin: 0 auto;
    }
    td {
        border: 1px solid black;
    }
</style>

<style>
    body {
        width: 100%;
    }

    .header {
        width: 80%;
        margin: 0 auto;
        margin-top: 2em;
    }

    .header>* {
        display: inline-block;
    }

    .header-logo-1 {
        width: 200px;
        height: 85px;
    }

    .header-logo-2 {
        width: 250px;
        height: 85px;
    }

    .contenedor {
        width: 85%;
        margin: 0 auto;
    }

    .text-center {
        text-align: center;
    }

    .text-right {
        text-align: right;
    }

    .text-left {
        text-align: left;
    }

    .indent {
        text-indent: 2em
    }

    .spacer {
        width: 25%;
    }
</style>

<body>

    <div class="header">

        <img class="header-logo-1" src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fc/SEP_Logo_2019.svg/1200px-SEP_Logo_2019.svg.png">
        <div class="spacer"></div>
        <img class="header-logo-2" src="https://www.voaxaca.tecnm.mx/wp-content/themes/TecNM-ITVO/images/pleca-ITVO.png">

    </div>

    <div class="contenedor">
        <div class="text-center">


            <h3>ANEXO XXXVII. CARTA DE LIBERACIÓN DE ACTIVIDADES ACADÉMICAS</h3>


            <p>Departamento Académico de: <u>Ciencias Económico – Administrativas</u></p>

        </div>
        <div class="text-right">


            <p>Ex Hacienda de Nazareno Xoxocotlán Oax., a <u>{{date('d-m-Y', strtotime($liberacion->created_at))}}</u></p>
            <p>Asunto: Constancia de liberación de actividades académicas.</p>
        </div>

        <div class="text-left" style="width:22%">
            <p><b>C. {{$liberacion->docente->nombre}}</b></p>
            <p>PRESENTE</p>
        </div>
        <div class="text-center">

        </div>


        <p class="indent">Por medio de la presente, se hace de su conocimiento que durante el
            semestre <u> {{$liberacion->semestre}} </u>, se evaluó el cumplimiento de las siguientes
            actividades:
        </p>

    </div>

    <table style="width: 100% ;border-collapse: collapse; margin:auto">
        <thead class="thead" style="border: 1px solid black">
            <tr>
                <th style="text-align: center">Actividades</th>
                <th style="width: 7%; text-align: center">Si</th>
                <th style="width: 7%; text-align: center">No</th>
                <th style="width: 7%; text-align: center">NA</th>

            </tr>
        </thead>
        <tbody style="border: 1px solid black; border-top: none; font-size:80%;">

            @foreach ($lista_actividades as $actividad)
            <tr>
                <td>{{$actividad->actividade->descripcion}}</td>
                <td style="text-align: center; font-size:70%;">{{$actividad->evaluacion == 2? 'X': ''}}</td>
                <td style="text-align: center; font-size:70%;">{{$actividad->evaluacion == 1? 'X': ''}}</td>
                <td style="text-align: center; font-size:70%;">{{$actividad->evaluacion == 0? 'X': ''}}</td>
            </tr>
            @endforeach
            <tr>
                <td>Otros (especificar):</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>




        </tbody>

    </table>
    <br><br>

    <table style="width: 80% ;border-collapse: collapse; margin:auto; border: 1px solid black ">
        <thead>
            <tr>
                <th valign="top">{{$liberacion->elaboro->puesto->cargo}}</th>
                <th style="border: 1px solid black;border-bottom: none; width: 70px"> </th>
                <th valign="top">{{$liberacion->valido->puesto->cargo}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @if ($liberacion->elaboro)
                <td valign="bottom">{{$liberacion->elaboro->nombre}}</td>
                @else
                <td valign="bottom">No se ha elegido</td>
                @endif

                <td style="border-top: none;"></td>

                @if ($liberacion->valido)
                <td valign="bottom">{{$liberacion->valido->nombre}}</td>
                @else
                <td valign="bottom">No se ha elegido</td>
                @endif
            </tr>
        </tbody>
    </table>

</body>

</html>