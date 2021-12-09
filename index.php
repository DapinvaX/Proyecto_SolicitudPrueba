<!DOCTYPE html>

<html lang="en">

<head>

 <title>Listado de Profesores</title>

 <meta charset="utf-8">

 <meta name="viewport" content="width=device-width, initial-scale=1">

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 <script src="profesores.js"></script>

 <script>
//Modificar codigo ajax (mostrar test positivos y negativos)
function mostrarInfoProfesor(id) {


  if (id== "") {

    document.getElementById("informacion").innerHTML = "";

    return;

  } else {

    var xmlhttp = new XMLHttpRequest();

	   xmlhttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {
    	document.getElementById("informacion").innerHTML = this.responseText;

      }

    };

    xmlhttp.open("GET","getProfesor.php?id="+id,true);

    xmlhttp.send();

  }

}

</script>

<style>

  #ifecha{

    margin-left: 0.35cm;

  }

  #btnGuardar{

    margin-top: 0.25cm;

  }

  #divFecha{

    margin-top: 0.3cm;

  }

</style>

</head>

<body>



<?php

   require ("profesores.php");

   $profesor = new profesor();



   if(isset($_REQUEST["operacion"])){

       if($_REQUEST["operacion"]=="editar"){

         mostrarListado($profesor->listar_profesores(),$_REQUEST["nume"]);

       }

       

       else if($_REQUEST["operacion"]=="modificar"){

         $profesor->modificar_profesor($_POST["nume"],$_POST["dni"],$_POST["nombre"],$_POST["telefono"],$_POST["asignatura"],$_POST["firma"]);
         mostrarListado($profesor->listar_profesores(),-1);

       }

       else if ($_REQUEST["operacion"]=="borrar") {

       $profesor->borrar_profesor($_REQUEST["nume"]);

       echo "<CENTER>Se ha borrado correctamente el profesor.</CENTER><P>";

       mostrarListado($profesor->listar_profesores(),-1);

     }

    

   } 

   else 

   {

     mostrarListado($profesor->listar_profesores(),-1);

    

   }
   


   function mostrarListado($profesores_array,$elemento){





     $html='<div class="container">

   <h2>Listado de Profesores</h2>          

   <table class="table table-striped" id="tabla_profesores">

     <thead>

       <tr>

         <th>ID</th>

         <th>DNI</th>

         <th>NOMBRE</th>

         <th>TELEFONO</th>

         <th>FIRMA</th>

       </tr>

     </thead>

     <tbody>';

    

         $fila="";

         foreach($profesores_array as $profesor){


           if($elemento != $profesor['id']){

             $fila='<tr id='.$profesor['id'].'>

             <td>'.$profesor['id'].'</td>

             <td>'.$profesor['dni'].'</td>

             <td>'.$profesor['nombre'].'</td>

             <td>'.$profesor['telefono'].'</td>

             <td>'.$profesor['asignatura'].'</td>

             <td>'.$profesor['firma'].'</td>

             <td>'.'<a href="javascript:mostrarInfoprofesor('.$profesor['id'].')" class="btn btn-primary"  role="button">Estado</a>'.'</td>

             <td>'.'<a href="listarTest.php?idprofesor='.$profesor['id'].'" class="btn btn-info" role="button">Ver</a>'.'</td>

             <td>'.'<a href="index.php?operacion=editar&nume='.$profesor['id'].'" class="btn btn-warning" role="button">Modificar</a>'.'</td>

             <td>'.'<a href="index.php?operacion=borrar&nume='.$profesor['id'].'" class="btn btn-danger" role="button">Eliminar</a>'.'</td>

           </tr>';

           }else{

             $fila='<tr><form method="POST" class="form-inline" action="index.php?operacion=modificar">

             <td>'.$profesor['id'].'</td>

             <td><input type="text" class="form-control" id="dni" value="'.$profesor['dni'].'" name="dni" style="width:150px"></td>

             <td><input type="text" class="form-control" id="nombre" value="'.$profesor['nombre'].'" name="nombre" style="width:150px"></td>

             <td><input type="text" class="form-control" id="telefono" value="'.$profesor['telefono'].'" name="telefono" style="width:150px"></td>

             <td><input type="text" class="form-control" id="asignatura" value="'.$profesor['asignatura'].'" name="asignatura" style="width:150px"></td>

             <td>'.$profesor['firma'].'</td>

             <td>'.'<input type="submit" class="btn btn-success"  value="Guardar" />'.'</td>

             <td>'.'<a href="index.php" class="btn btn-danger" role="button">Cancelar</a>'.'</td>

             <input type="hidden" name="nume" value="'.$elemento.'" />

             

             </form>

           </tr>';

           }

          

            $html=$html.$fila;

          } //fin del bucle for 

          $html=$html.'</tbody>

                       </table>

                       <div id="informacion">
                       
                       </div>

                     </div>';

          echo $html;

      }



 

   ?>



<div class="container">


      </div>

    </div>



  </body>

</html>

        