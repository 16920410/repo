<!DOCTYPE html>
<html>

<body>

<table>
            <tr style="border: hidden" margin: 200px align='center'>
                <td  WIDTH="100">


                        <img src="https://trello-attachments.s3.amazonaws.com/60d78c2fba08028e7ded9685/266x269/098876ab69c3cb3ac9d5da55ba47083e/itvo.jpg" width="100" height="100">

                </td>


                <td  WIDTH="750" >


                        <img src="https://trello-attachments.s3.amazonaws.com/60d78c2fba08028e7ded9685/143x144/b71e1ec458ba74cacd37f8cbadb4ab3d/infor.jpg" width="100" height="100">

                </td>

            </tr>


            </table>

            <br></br>
            <br></br>


    <table style="width:100%; border-collapse: collapse;">
        <thead class="thead" style="width:100%; border: 1px solid black;border-collapse: collapse;">



            <tr>
                <th colspan="3" style=" background: black; color:white">INTEGRANTES DE ACADEMIA</th>
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

                <td style=" border: 1px solid black;border-collapse: collapse;" align='center'>{{ $key+1 }}</td>

                <td style=" border: 1px solid black;border-collapse: collapse;" align='center'>{{ $docente->nombre }}</td>
                <td style=" border: 1px solid black;border-collapse: collapse;"> </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
