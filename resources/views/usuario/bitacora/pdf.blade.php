<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <h3 class="h3 text-center">
        Reporte de Actividades 
    </h3>
    <h2 class="h3 text-center"> Autocreditos Elite </h2>
    <div class="container">
        <div class="row justify-content-center">
            <br>
            <br>
            <table class="table mt-5 table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="border">Apartado</th>
                        <th scope="border">Accion</th>
                        <th scope="border">Implicado </th>
                        <th scope="border">fecha</th>
                        <th scope="border">Id_user</th>
                        <th scope="border">Nombre_usuario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bitacoras as $bitacora)
                    <tr>                     
                        <td>{{$bitacora->apartado}}</td>
                        <td>{{$bitacora->accion}}</td>
                        <td>{{$bitacora->implicado}}</td>
                        <td>{{$bitacora->fecha}}</td>
                        <td>{{$bitacora->id_user}}</td>    
                        <td>{{$bitacora->nombre_usuario}}</td>          
                    </tr> 
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
    
    <footer class="float-right">
        <small class="text-muted">
            {{Carbon\Carbon::parse(Carbon\Carbon::now('America/La_Paz'))->locale('es_ES')->isoFormat('LLLL')}}
        </small>
    </footer>
</body>

</html>