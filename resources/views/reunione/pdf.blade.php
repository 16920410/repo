<!DOCTYPE html>
<html>

<body>
    <table>
        <tr style="border: hidden" margin: 10px align='center'>
            <td WIDTH="10">
                <img src="https://trello-attachments.s3.amazonaws.com/60d78c2fba08028e7ded9685/266x269/098876ab69c3cb3ac9d5da55ba47083e/itvo.jpg" width="100" height="100">
            </td>
            <td WIDTH="10">
                <th>INSTITUTO TECNOLÓGICO DEL VALLE DE OAXACA
                    INGENIERÍA EN TECNOLOGÍAS DE LA INFORMACIÓN Y
                    COMUNICACIONES E INGENIERÍA INFORMÁTICA
                </th>
            </td>
            <td WIDTH="10">
                <img src="https://trello-attachments.s3.amazonaws.com/60d78c2fba08028e7ded9685/143x144/b71e1ec458ba74cacd37f8cbadb4ab3d/infor.jpg" width="100" height="100">
            </td>
        </tr>
    </table>

    <table style="width: 100%>
        <thead class="thead" style="border: 0px solid black">
            <tr>
                <th>ACTA DE REUNIÓN DE ACADEMIA</th>
            </tr>
        </thead>
    </table>
    <br>
    <br>

    <table style="border: hidden">
        <thead class="thead">
            <tr>
                <th>Fecha:</th>
                    <td align='center'>{{ $reunion->fecha }}</td>
                <th>Realiza en:</th>
                    <td align='center'>{{ $reunion->lugar }}</td>

            </tr>
        </thead>
        <!--
        <tbody>
            <tr>
                <td>{{ $reunion->fecha }}</td>
                <td align='center'>{{ $reunion->lugar }}</td>
            </tr>
        </tbody>
-->
    </table>

    <br>


    <table style="width: 100% ;border-collapse: collapse;">
        <thead class="thead" style="border: 1px solid black">
            <tr>
                <th>Orden del dia</th>

            </tr>
        </thead>
        <tbody style="border: 1px solid black; border-top: none">
            @foreach ($ordenes as $orden)
            <tr>
                <td>{{ "$orden[num_orden].- $orden[orden]"}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <br>



    <table style="width:100%; border-collapse: collapse;">
        <thead class="thead" style="width:100%; border: 1px solid black;border-collapse: collapse;">
            <tr>
                <th colspan="3" style=" background: black; color:white">Asistentes</th>
            </tr>
            <tr style="border: 1px solid black;">
                <th style=" border: 1px solid black;border-collapse: collapse;">No.</th>
                <th style=" border: 1px solid black;border-collapse: collapse;">Nombre</th>
                <th style=" border: 1px solid black;border-collapse: collapse;">Firma </th>

            </tr>
        </thead>
        <tbody>

            @foreach ($asistentes as $key=>$asistencia)
            <tr>
                <td style=" border: 1px solid black;border-collapse: collapse; text-align: center;">{{ $key+1 }}</td>
                <td style=" border: 1px solid black;border-collapse: collapse;">{{ $asistencia->docente->nombre }}</td>
                <td style=" border: 1px solid black;border-collapse: collapse;"> {{ $asistencia->asistencia? "": "No asistió"}} </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <table style="width: 100% ;border-collapse: collapse;">
        <thead class="thead" style="width:100%; border: 1px solid black;border-collapse: collapse;">
            <tr>
                <th colspan="2" style=" background: black; color:white">Acuerdos de la reunión</th>
            </tr>
            <tr style="border: 1px solid black;">
                <th style=" border: 1px solid black;border-collapse: collapse;">No. orden</th>
                <th style=" border: 1px solid black;border-collapse: collapse; text-align: left;padding-left: 1rem;">Acuerdos</th>


            </tr>
        </thead>
        <tbody style="border: 1px solid black; border-top: none">
            @foreach ($ordenes as $orden)
            <tr style="border: 1px solid black; border-top: none">
                <td style="text-align: center; border: 1px solid black;border-collapse: collapse;width:15%">{{ "$orden[num_orden]"}}</td>
                <td style="padding-left: 1.5rem;">{{ "$orden[acuerdo]"}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <table style="width: 100% ;border-collapse: collapse;">
        <tbody style="border: 1px solid black; border-right:1px solid black">
            <tr>
                <td style="border-right:1px solid black; padding-left:1em;"><b>Hora de inicio</b></td>
                <td style="border-right:1px solid black; padding-left:1em;">{{$reunion->hora_inicio}}</td>
                <td style="border-right:1px solid black; padding-left:1em;"><b>Hora de término</b></td>
                <td style="border-right:1px solid black; padding-left:1em;">{{$reunion->hora_fin}}</td>
            </tr>
        </tbody>
    </table>
</body>
<br>
<br>
<table style="width: 100% ;border-collapse: collapse;">
    <thead style="color: white; background: #000; font-weight: bold;">
        <tr>
            <th style="width: 50%;">ELABORÓ Y DA FÉ</th>
            <th>DA FÉ</th>
        </tr>
    </thead>
    <tbody style="border: 1px solid black; border-right:1px solid black">
        <tr style="height: 100px;">
            <td style="border-right:1px solid black; padding-left:1em;"><b></b></td>
            <td style="border-right:1px solid black; padding-left:1em;"></td>
        </tr>
        <tr>
            <td style="border-right:1px solid black; padding-left:1em; text-align: center;"><b>{{$reunion->elaboro?$reunion->elaboro->nombre: 'No asignado'}}</b></td>
            <td style="border-right:1px solid black; padding-left:1em; text-align: center;">{{$reunion->valido?$reunion->valido->nombre: 'No asignado'}}</td>
        </tr>
    </tbody>
    <tfoot style="color: white; background: #000; font-weight: bold;">
        <tr>
            <td style="border-right:1px solid black; padding-left:1em; text-align: center;">{{$reunion->elaboro?$reunion->elaboro->puesto->nombre: 'No asignado'}}</td>
            <td style="border-right:1px solid black; padding-left:1em; text-align: center;">{{$reunion->valido?$reunion->valido->puesto->nombre: 'No asignado'}}</td>
        </tr>
    </tfoot>
</table>

<script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(480, 780, "Página $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
	</script>


</body>

</html>
