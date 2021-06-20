<!DOCTYPE html>
<html>

<body>


    <table style="border: 1px solid black; border-collapse: collapse;">
        <thead class="thead">
            <tr>
                <th>Fecha</th>
                <th>Realiza en</th>

            </tr>
        </thead>
        <tbody>

            <tr>
                <td>{{ $reunion->fecha }}</td>

                <td>{{ $reunion->lugar }}</td>


            </tr>

        </tbody>
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

            @foreach ($docentes as $key=>$docente)
            <tr>
                <td style=" border: 1px solid black;border-collapse: collapse;">{{ $key+1 }}</td>
                <td style=" border: 1px solid black;border-collapse: collapse;">{{ $docente->nombre }}</td>
                <td style=" border: 1px solid black;border-collapse: collapse;"> </td>

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
</body>

</html>