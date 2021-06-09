<!DOCTYPE html>
<html>
  <body>


    <table style="border: 1px solid black">
        <thead class="thead">
            <tr>
                <th>Fecha</th>
                <th>Realiza en</th>

            </tr>
        </thead>
        <tbody>

                <tr>
                <td>{{ $reunion->fecha }}</td>

                <td align="center">{{ $reunion->lugar }}</td>


                </tr>

        </tbody>
    </table>

    <br>


  <table style="width: 100%">
        <thead class="thead" style="border: 1px solid black">
            <tr >
                <th>Orden del dia</th>

            </tr>
        </thead>
        <tbody style="border: 1px solid black; border-top: none">
        @foreach ($ordenes as $key=>$orden)
                <tr>
                <td>{{ ($key+1).".- ".$orden }}</td>

                </tr>
    @endforeach
        </tbody>
    </table>

    <br>


    <table style="border: 1px solid black">
        <thead class="thead">
            <tr>
                <th>asistentes</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($docentes as $docente)
                <tr>
                    <td>{{ $docente->nombre }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
  </body>
</html>
