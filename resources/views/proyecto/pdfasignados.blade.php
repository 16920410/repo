<!DOCTYPE html>
<html>

<body>


    <table style="width:100%; border-collapse: collapse;">
        <thead class="thead" style="width:100%; border: 1px solid black;border-collapse: collapse;">
            <tr>
                <th colspan="6" style=" background: black; color:white">Proyectos Asignados</th>
            </tr>
            <tr style="border: 1px solid black;">
                <th style=" border: 1px solid black;border-collapse: collapse;">No.</th>
                <th style=" border: 1px solid black;border-collapse: collapse;">Nombre</th>
                <th style=" border: 1px solid black;border-collapse: collapse;">Departamento</th>
                <th style=" border: 1px solid black;border-collapse: collapse;">Responsable</th>
                <th style=" border: 1px solid black;border-collapse: collapse;">carrera</th>
                <th style=" border: 1px solid black;border-collapse: collapse;">N residentes</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($proyectos as $key=>$proyecto)
            <tr>
                <td style=" border: 1px solid black;border-collapse: collapse;">{{ $key+1 }}</td>
                <td style=" border: 1px solid black;border-collapse: collapse;">{{ $proyecto->nombre }}</td>
                <td style=" border: 1px solid black;border-collapse: collapse;">{{ $proyecto->departamento }}</td>
                <td style=" border: 1px solid black;border-collapse: collapse;">{{ $proyecto->responsable }}</td>
                <td style=" border: 1px solid black;border-collapse: collapse;">{{ $proyecto->carrera->nombre }}</td>
                <td style=" border: 1px solid black;border-collapse: collapse;">{{ $proyecto->nresidente }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>