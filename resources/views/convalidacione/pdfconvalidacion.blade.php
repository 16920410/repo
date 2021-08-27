<html>



<style>
    @page {
        margin: 200px 25px 110px 25px;
    }

    body {
        width: 100%;
    }

    img {
        width: 100%;
    }

    .header {
        position: fixed;
        top: -150px;
        left: 0px;
        right: 0px;
        /* height: 150px; */
    }

    .footer {
        /* background: #000; */
        position: fixed;
        bottom: -50px;
        left: 0px;
        right: 0px;
        height: 60px;
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

    .container {
        width: 80%;
        margin: 0 auto;
    }

    .info {
        /* background: #000; */
        width: 100%;

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
        font-weight: bold;
        font-size: .8em;
        margin-top: 2em;
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

    .spacer {
        width: 25%;
    }

    .spacer2 {
        width: 50%;
        align: center;
        margin-left: 50;
        position: relative;
    }


    div.wrap {
        width: 100%;
        margin: 0 auto;
        /* border: 1px solid #f00; */
        /* height: 250px; */
        min-height: 4em;
        position: relative;
    }

    .wrap>* {
        /* border: 1px solid blue; */
        position: absolute;
        bottom: -20px;
    }

    .wrap>*:nth-of-type(1) {
        width: 250px;
        height: 50px;
        left: 0;
    }

    .wrap>*:nth-of-type(2) {
        width: 250px;
        height: 50px;
        right: 0;
    }

    div.wrap2 {
        width: 100%;
        margin: 0 auto;
        /* border: 1px solid #f00; */
        /* height: 250px; */
        min-height: 4em;
        position: relative;
    }

    .wrap2>div {
        /* border: 1px solid blue; */
        position: absolute;
        bottom: 15px;
    }

    .wrap2>div:nth-of-type(1) {
        width: 250px;
        height: 50px;
        left: 0;
    }

    .wrap2>div:nth-of-type(2) {
        width: 250px;
        height: 50px;
        right: 0;
    }

    .group {
        display: inline-block;
    }
</style>

<body>



    <div class="header">
        <div class="container">


            <div class="wrap">
                <img src="https://www.omeyocan.edu.mx/img/logosep.png" />
                <img src="http://itguaymas.edu.mx/img/logo_tecnm_2.png" />
            </div>
            <div class="info">
                <div class="escu">
                    <p>
                        Instituto Tecnológico del Valle de Oaxaca<BR>
                        Departamento de Ciencias Económico Administrativas
                    </p>
                    <p class="text-center">
                        “2020, Año de Leona Vicario, Benemérita Madre de la Patria”
                    </p>
                </div>


            </div>

        </div>

    </div>



    <div class="footer">


        <div style="font-size:10px; color:#7F8C8D; text-align: center">
            Ex-hacienda de Nazareno, Xoxocotlán,Oaxaca, C.P. 71230<br>
            Tel. y fax 01 (951) 5170444, 5170788, e-mail: itvalleoaxaca@hotmail.com<br>
            <u>www.tecnm.mx | www.voaxaca.tecnm.mx</u>
        </div>

        <div class="wrap2">
            <div>
                <img class="footer-logo-1" src="http://rf.voaxaca.tecnm.mx/assets/files/main/img/ITVO.png">
            </div>
            <div class="group">


                <img class="footer-logo-1" src="https://mcd.unison.mx/wp-content/uploads/2020/08/conacyt-300x256.png">
                <img class="footer-logo-1" src="http://www.fcb.uanl.mx/nw/images/caceb-log3.png">


                <img class="footer-logo-3" src="https://its-purhepecha.edu.mx/wp-content/uploads/2018/05/Logo3.png">
            </div>
        </div>


    </div>

    <!--

   base





    <div class="footer" align="center" style="color:#99A3A4;">
        <h6>
            Ex hacienda de Nazareno s/n, Santa Cruz Xoxocotlán, Oaxaca; C.P 71230<br>
            Tel: 5170444-5170788 y 5173385<br>
            Email:cead_voaxaca64tecnm.mx<br>
            www.voaxaca.tecnm-mx<br>
        </h6>
    </div>
-->
    <main>

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








    </main>

    <!-- </div> -->
</body>

</html>