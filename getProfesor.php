<?php 

require ("profesores.php");
$profesor = new profesor();


   if(isset($_GET["id"])){
    $idprofesor = $_GET["id"];
    
   }

   $resultado = $profesor->obtener_profesor_por_id($idprofesor);

   $html = "";
   foreach($resultado as $datosProfesor){
      
        $html .= 
        "<table class='table table-striped table-inverse table-responsive'>
            <thead class='thead-inverse'>
                <tr>
                    <th>ID</th>
                    <th>DNI</th>
                    <th>NOMBRE</th>
                    <th>TELEFONO</th>
                    <th>ASIGNATURA</th>
                    <th>FIRMA</th>
                </tr>
                </thead>
                <tbody >
                    <tr>
                        <td scope='row'>
                        ".$datosProfesor['nombre']."
                        </td>
                        <td>
                        ".$datosProfesor['apellidos']."
                        </td>
                        <td>
                        ".$datosProfesor['edad']."
                        </td>
                        <td>
                        ".$datosProfesor['direccion']."
                        </td>
                        <td>
                        ".$datosProfesor['telefono']."
                        </td>
                        <td>
                        ".$datosProfesor['asignatura']."
                        </td>
                        <td>
                        ".$datosProfesor['fecha']."
                        </td>
                    </tr>
            </tbody>
    </table>";
   }

   //echo "EXISTE EL profesor CON id:".$idprofesor;
   echo $html;

?>