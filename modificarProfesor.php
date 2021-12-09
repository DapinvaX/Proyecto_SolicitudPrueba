<?php

require ("profesores.php");

$profesor = new profesor();


if(isset($_POST['id']))
{
    $id = $_POST['id'];
}
if(isset($_POST['dni']))
{
    $dni = $_POST['dni'];
}
if(isset($_POST['nombre']))
{
    $nombre = $_POST['nombre'];
}
if(isset($_POST['telefono']))
{
    $telefono = $_POST['telefono'];
}
if(isset($_POST['asignatura']))
{
    $asignatura = $_POST['asignatura'];
}
if(isset($_POST['firma']))
{
    $firma = $_POST['firma'];
}

  $paciente->modificar_profesor($id, $nombre, $telefono, $asignatura, $firma);

  $html = '<tr>

  <td>'.$id.'</td>

  <td>'.$dni.'</td>

  <td>'.$nombre.'</td>

  <td>'.$telefono.'</td>

  <td>'.$asignatura.'</td>

  <td>'.$firma.'</td>

  <td>'.'<a href="index.php?operacion=editar&nume='.$id.'" class="btn btn-info" role="button">Modificar</a>'.'</td>

  <td>'.'<a href="index.php?operacion=borrar&nume='.$id.'" class="btn btn-danger" role="button">Eliminar</a>'.'</td>

  <td>'.'<a href="listarTest.php?idPaciente='.$id.'" class="btn btn-warning" role="button">Ver</a>'.'</td>

  </tr>';


    echo $html;
?>