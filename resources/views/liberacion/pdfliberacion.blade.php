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

    .categoriesDiv {
        width: 80%;
        margin: auto;
    }
    .categoriesiz {
        width: 80%;
        margin: auto;

    }
</style>

<body>



    <div class="categoriesDiv" style="width:100%">
        <table style="border: hidden">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fc/SEP_Logo_2019.svg/1200px-SEP_Logo_2019.svg.png" width="100" height="50" HSPACE="10">
            <img src="https://www.voaxaca.tecnm.mx/wp-content/themes/TecNM-ITVO/images/pleca-TecNM.png" width="120" height="50" align="right" >
        </table>
    </div>
    <br>
    <br>


    <table style="border: hidden ;height: 30px;">
        <thead>
            <th>ANEXO XXXVII. CARTA DE LIBERACIÓN DE ACTIVIDADES ACADÉMICAS</th>
        </thead>
    </table>

    <table style="border: hidden">
        <thead>
            <th>Departamento Académico de: Ciencias Económico – Administrativas</th>
        </thead>
    </table>

    <br>
    <div class="categoriesDiv">
        <table style="border: hidden">
            <thead>
                <th>Ex Hacienda de Nazareno Xoxocotlán Oax., a {{date('d-m-Y', strtotime($liberacion->created_at))}}</th>
            </thead>
        </table>
    </div>

    <br>
    <div align="right">
                Asunto: Constancia de liberación de actividades académicas.
    </div>

    <br>
    <div align="left">

          C.{{$liberacion->docente->nombre}}</th>

    </div>

    <div align="left" >
            PRESENTE
    </div>
    <br>


    <div align="center">

            Por medio de la presente, se hace de su conocimiento que durante el
                semestre<br>

            <u>{{$liberacion->semestre}}</u> , se evaluó el cumplimiento de las siguientes
                actividades academicas:



        </table>
    </div>
    <br>
    <br>


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

    <br>
    <br>


        <table style="border: 1px solid black; width: 100%; height: 90px;  border-collapse: collapse; ">
            <thead>
                <tr>
                    <th valign="top" WIDTH="200" style="text-align: center">Presidente de la Academia</th>
                    <th WIDTH="50" style="border solid 1px; text-align: center; "></th>
                    <th valign="top" WIDTH="200" style="text-align: center">Vo. Bo.<br> Jefe del Departamento academico</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    @if ($presidente)

                    <th valign="bottom" style="text-align: center">{{$presidente->nombre}}</th>
                    @else

                    <th valign="bottom">No hay presidente elegido</th>
                    @endif


                    <td WIDTH="50" style="border-top: none;"></td>

                    @if ($secretario)

                    <th valign="bottom" style="text-align: center">{{$secretario->nombre}}</th>
                    @else

                    <th valign="bottom" style="text-align: center">No hay secretario elegido</th>
                    @endif

                </tr>
            </tbody>



        </table>

        <br>
        <br>
        <div align="center" style="color:#AAB7B8; font-size:13px;">
        Ex-hacienda de Nazareno, Xoxocotlán,Oaxaca, C.P. 71230<br>
Tel. y fax 01 (951) 5170444, 5170788, e-mail: itvalleoaxaca@hotmail.com<br>
www.tecnm.mx | www.voaxaca.tecnm.mx

</div>




</body>

</html>
