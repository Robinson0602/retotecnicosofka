<!--------- Se crea la conexion con la base de datos-->
<?php
    
    $servidor="localhost";
    $usuario="root";
    $clave="";
    $baseDeDatos="retosofka";

    $enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

    if (!$enlace){
        echo "Error en la conexion con el servidor";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naves</title>
    <link rel="stylesheet" href="./css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
</head>


<body>
    <h1 id="title">Estancion Espacial Sofka</h1>
    <!--------- Se crea el div en el que estara el formulario que estara conectado con la base de datos-->
    <div class="container">
        <form class="g-3" name="formulario" method="POST">

            <!--------- Se establece un 'name' en cada input para identificar cada dato introducido en los mismos-->
            <div>
                <label for="nombre" class="flex">Nombre de la nave</label>
                <input type="text" name="nombre" id="nombre" class="flex form-control input" required>
            </div>
            
            <div class="flex">
    
                <input class="form-check-input" id="lanzadera" type="radio" name="tipo" value="Lanzadera" required>
                <label class="form-check-label" for="lanzadera">Lanzadera</label>
                <input class="form-check-input" id="no-tripulado" type="radio" name="tipo" value="No tripulada" required>
                <label class="form-check-label" for="no-tripulado">No Tripulada</label>
                <input class="form-check-input" id="tripulado" type="radio" name="tipo" value="Tripulada" required>
                <label class="form-check-label" for="tripulado">Tripulada</label>
            
            </div>

            <div>
                <label for="pais" class="flex">Pais de la nave</label>
                <input id="pais" type="text" name="pais" class="flex form-control input" required onchange="">
            </div>

            <div>
                <label for="peso" class="flex">Peso de la nave en Kg</label>
                <input id="peso" type="number" name="peso" class="flex form-control input" required>
            </div>

            <div>
                <label for="combustible" class="flex">Combustible de la nave</label>
                <input id="combustible" name="combustible" type="text" class="flex form-control input" required>
            </div>
        
            <!---------Creacion del boton para añadir datos a la BD-->
            <button name="crear" value="Crear" class="btn-style" id="crear">
                <span class="btn-span">Crear</span>
            </button>
            <!---------Creacion del boton para actualizar la informacion de la BD-->
            <a class="btn btn-style-a" href="./index.php">
                <span class="btn-span-a">
                    Actualizar Datos
                </span>
            </a>

        </form>

    <br>
        <div>
            <form class="d-flex">
                <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" 
                placeholder="Buscar Nave">
                <hr>
            <form>
        </div>

    <br>

      <table class="table table-striped table_id ">

                    <thead>    
                        <tr>
                            <th>ID</th>
                            <th>Nombre de la Nave</th>
                            <th>Tipo de Nave</th>
                            <th>Pais</th>
                            <th>Peso</th>
                            <th>Combustible</th>
                        </tr>
                    </thead>

                    <tbody>

                <!---------Se invoca la funcion que creara la fila dentro de la base de 
                         datos con la informacion introducida por el usuario-->
                    <?php   
                        $consulta = "SELECT * FROM datos";
                        $ejecutarConsulta = mysqli_query($enlace, $consulta);
                        $verFilas = mysqli_num_rows($ejecutarConsulta);
                        $fila =mysqli_fetch_array($ejecutarConsulta);

                        if(!$ejecutarConsulta){
                            echo"Error en la consulta";
                        }else{
                            if($verFilas<1){
                                echo"<tr><td>Sin registros</td></tr>";
                            }else{
                                for($i=0; $i<=$fila; $i++ ) {
                                    echo'
                                        <tr>
                                            <td>'.$fila[0].'</td>
                                            <td>'.$fila[1].'</td>
                                            <td>'.$fila[2].'</td>
                                            <td>'.$fila[3].'</td>
                                            <td>'.$fila[4].'</td>
                                            <td>'.$fila[5].'</td>
                                        </tr>
                                    ';
                                    $fila =mysqli_fetch_array($ejecutarConsulta);
                                }
                            }
                        }
                    ?>

			</table>
    </div>
    <hr>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="./js/index.js"></script>
    <script src="./js/buscador.js"></script>

</body>
</html>

<!---------Se establece la funcion indicando que datos se van a tomar identificandolos 
            a partir del name establecido en los inputs anteriormente, de la misma manera 
            se crea un incremento dentro de la id para que esta sea secuencial-->
<?php
    if (isset($_POST['crear'])){
        $idNave = $i++;
        $nombre= $_POST["nombre"];
        $tipo= $_POST["tipo"];
        $pais= $_POST["pais"];
        $peso= $_POST["peso"];
        $combustible= $_POST["combustible"];

    #Se insertan los datos dentro de la base de datos y se invoca la conexion
        $insertarDatos = "INSERT INTO datos VALUES('$idNave','$nombre', '$tipo', '$pais', '$peso', '$combustible')";
        mysqli_query($enlace, $insertarDatos);
    }
?>