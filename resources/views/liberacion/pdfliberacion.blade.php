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

    body {
        width: 100%;
    }

    @page {
        margin: 100px 25px;
    }

    .header {
        position: fixed;
        top: -60px;
        left: 0px;
        right: 0px;
        height: 60px;
        width: 80%;
        margin: 0 auto;
        margin-top: 0em;
    }

    .header>* {
        display: inline-block;
    }

    .footer {
        width: 100%;
        margin-right: 20;
        margin-top: 0em;
        position: fixed;
        bottom: -60px;
        left: 0px;
        right: 0px;
        height: 50px;
    }

    .footer>* {
        display: inline-block;
    }


    .header-logo-1 {
        width: 180px;
        height: 40px;
    }

    .header-logo-2 {
        width: 260px;
        height: 50px;
    }

    .footer-logo-1 {
        width: 60px;
        height: 60px;
    }

    .footer-logo-2 {
        width: 100px;
        height: 50px;
    }

    .footer-logo-3 {
        width: 90px;
        height: 50px;
    }

    .contenedor {
        width: 85%;
        margin: 0 auto;
    }

    .mar {

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

    .spacer2 {
        width: 50%;
        align: center;
        margin-left: 50;
        position: relative;
    }
</style>

<body>

    <div class="header">

        <img class="header-logo-1" src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fc/SEP_Logo_2019.svg/1200px-SEP_Logo_2019.svg.png">
        <div class="spacer"></div>
        <img class="header-logo-2" src="http://itguaymas.edu.mx/img/logo_tecnm_2.png">

    </div>
    <div class="footer">

        <img class="footer-logo-1" src="http://rf.voaxaca.tecnm.mx/assets/files/main/img/ITVO.png">

        <div class="spacer2" style="font-size:10px; color:#7F8C8D; text-align: center">
            Ex-hacienda de Nazareno, Xoxocotlán,Oaxaca, C.P. 71230<br>
            Tel. y fax 01 (951) 5170444, 5170788, e-mail: itvalleoaxaca@hotmail.com<br>
            <u>www.tecnm.mx | www.voaxaca.tecnm.mx</u>
        </div>

        <img class="footer-logo-1" src="https://mcd.unison.mx/wp-content/uploads/2020/08/conacyt-300x256.png">
        <img class="footer-logo-1" src="http://www.fcb.uanl.mx/nw/images/caceb-log3.png">


        <img class="footer-logo-3" src="https://its-purhepecha.edu.mx/wp-content/uploads/2018/05/Logo3.png">


    </div>
    <br>

    <div class="contenedor">
        <div class="text-center">


            <h6>ANEXO XXXVII. CARTA DE LIBERACIÓN DE ACTIVIDADES ACADÉMICAS</h6>


            <p>Departamento Académico de: <u>Ciencias Económico – Administrativas</u></p>

        </div>
        <div class="text-right">


            <p>Ex Hacienda de Nazareno Xoxocotlán Oax., a <u>{{date('d-m-Y', strtotime($liberacion->created_at))}}</u></p>
            <p>Asunto: Constancia de liberación de actividades académicas.</p>
        </div>
        <div>
            <p><b>C. {{$liberacion->docente->nombre}}</b></p>
            <div>
                <p>PRESENTE</p>
            </div>
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
    <br>

    <table style="width: 100% ;border-collapse: collapse; margin:auto; border: 1px solid black ">
        <thead>
            <!--
            <tr>
                <th valign="top">{{$liberacion->elaboro->puesto->cargo}}</th>
                <th style="border: 1px solid black;border-bottom: none; width: 70px"> </th>

                <th>Vo.Bo.<br>
                    {{$liberacion->valido->puesto->cargo}}</th>

            </tr>
-->

            <tr valign="top">
                <th style="text-align: center;">Presidente de la academia</th>

                <th style="border: 1px solid black;border-bottom: none; width: 70px"> </th>

                <th style="text-align: center;">Vo.Bo.<br>
                    Jefe(a) del departamento academico</th>


            </tr>

        </thead>

        <tr>
            <th style="border-right:  1px solid"><br></th>
            <th style="border-right:  1px solid"></th>
            <th></th>
        </tr>
        <tbody>
            <!--
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
-->


            <tr>
                @if ($liberacion->elaboro)
                <td valign="bottom" style="text-align: center; border: inset 0pt">{{$liberacion->elaboro->nombre}}</td>

                @else
                <td valign="bottom">No se ha elegido</td>

                @endif

                <td style="border-top: none;"></td>


                @if ($liberacion->valido)

                <td valign="bottom" style="text-align: center; border: inset 0pt">{{$liberacion->valido->nombre}}</td>

                @else
                <td valign="bottom">No se ha elegido</td>
                <td>
                </td>
                @endif
            </tr>




        </tbody>
    </table>
    <br>
    <br>
    <br>





</body>

</html>