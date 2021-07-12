<!DOCTYPE html>
<html>

<body>

<div class="categoriesDiv" style="width:90%">
        <table style="border: hidden">

<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fc/SEP_Logo_2019.svg/1200px-SEP_Logo_2019.svg.png" width="200" height="100" HSPACE="130">
<img src="https://www.voaxaca.tecnm.mx/wp-content/themes/TecNM-ITVO/images/pleca-ITVO.png" width="200" height="100" align="right">

        </table>
    </div>
    <br>
    <br>


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
