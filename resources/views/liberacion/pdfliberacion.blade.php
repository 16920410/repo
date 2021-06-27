<!DOCTYPE html>
<html>

<body>


    <br>
    <br>
    <style>
        .categoriesDiv {
            width: 50%;
        }
    </style>


    <div class="categoriesDiv" style="width:90%">
        <table style="border: hidden">
            <!--
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fc/SEP_Logo_2019.svg/1200px-SEP_Logo_2019.svg.png" width="200" height="100" HSPACE="130">
<img src="https://www.voaxaca.tecnm.mx/wp-content/themes/TecNM-ITVO/images/pleca-ITVO.png" width="200" height="100" align="right">
-->
        </table>
    </div>
    <br>
    <br>


    <table style="border: hidden">
        <th>ANEXO XXXVII. CARTA DE LIBERACIÓN DE ACTIVIDADES ACADÉMICAS</th>
    </table>

    <table style="border: hidden">
        <th>Departamento Académico de: Ciencias Económico – Administrativas</th>
    </table>

    <br>
    <div class="categoriesDiv" style="width:135%">
        <table style="border: hidden">
            <th>Ex Hacienda de Nazareno Xoxocotlán Oax., a</th>
        </table>
    </div>

    <br>
    <div class="categoriesDiv" style="width:148%">
        <table style="border: hidden">
            <th>Asunto: Constancia de liberación de actividades académicas.</th>
        </table>
    </div>

    <br>
    <div class="categoriesDiv" style="width:22%">
        <table style="border: hidden">
            <th>C.{{$liberacion->docente->nombre}}</th>
        </table>
    </div>

    <div class="categoriesDiv" style="width:26%">
        <table style="border: hidden">
            <th>PRESENTE</th>
        </table>
    </div>
    <br>


    <div>
        <table style="border: hidden">
            <th>Por medio de la presente, se hace de su conocimiento que durante el
                semestre
            </th>
            <th><u>__{{$liberacion->semestre}}__   </u>, se evaluó el cumplimiento de las siguientes
                actividades:
            </th>


        </table>
    </div>
    <br>



    <style>
        table {
            /* width: 200px; */
            margin: 0 auto;
        }

        td {
            border: 1px solid black;
        }
    </style>


    <br>


    <table style="width: 80% ;border-collapse: collapse;">
        <thead class="thead" style="border: 1px solid black">
            <tr>
                <th>Actividades</th>
                <th style="width: 7%">Si</th>
                <th style="width: 7%">No</th>
                <th style="width: 7%">NA</th>

            </tr>
        </thead>
        <tbody style="border: 1px solid black; border-top: none">

            @foreach ($lista_actividades as $actividad)
            <tr>
                <td>{{$actividad->actividade->descripcion}}</td>
                <td style="text-align: center;">{{$actividad->evaluacion == 2? 'X': ''}}</td>
                <td style="text-align: center;">{{$actividad->evaluacion == 1? 'X': ''}}</td>
                <td style="text-align: center;">{{$actividad->evaluacion == 0? 'X': ''}}</td>
            </tr>
            @endforeach
            <tr>

            <tr>
                <td>Otros (especificar):</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="font-weight: bold;">¿Cumplió con las actividades académicas encomendadas al 100%?</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

        </tbody>

    </table>

    <br>
    <br>

    <div>
        <table style="border: 1px solid black; width: 80%; height: 200px;  border-collapse: collapse; ">

            <tr>
                <th valign="top" WIDTH="500">Presidente de la Academia</th>
                <td WIDTH="50"></td>
                <th valign="top" WIDTH="500">Vo. Bo. Jefe del Departamento academico</th>

            </tr>


        </table>
    </div>
        <br>




        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>



</body>

</html>
