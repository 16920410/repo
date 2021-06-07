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
            @foreach ($reuniones as $reunione)
                <tr>
                <td>{{ $reunione->fecha }}</td>

                <td align="center">{{ $reunione->lugar }}</td>


                </tr>
            @endforeach
        </tbody>
    </table>

    <br>


  <table style="border: 1px solid black">
        <thead class="thead">
            <tr>
                <th>Orden dia</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($reuniones as $reunione)
                <tr>
                <td>{{ $reunione->orden }}</td>

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
