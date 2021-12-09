<?php



require ("conexion.php");



class profesor{



    private $conexion;

    //private $numero_profesores = 0;



   /*function profesor()

   {

      $this->conexion = obtenerConexionBD();

     

   }*/

   public function __construct()
{
   $this->conexion = obtenerConexion();
}



function listar_profesores(){

  
   try {
   
      $stmt = $this->conexion->prepare("SELECT id, dni, nombre, telefono, firma FROM profesores");

      

       $stmt->execute();
      
       


   } catch(PDOException $e) {

   echo "Error: " . $e->getMessage();

   }

   return $stmt;



}




function obtener_profesor_por_id($id){

  
   try {
   
      $stmt = $this->conexion->prepare("SELECT id, dni, nombre, telefono, firma FROM profesores WHERE id=".$id);

      

       $stmt->execute();
      
       


   } catch(PDOException $e) {

   echo "Error: " . $e->getMessage();

   }

   return $stmt;



}



function modificar_profesor($id, $dni, $nombre, $telefono, $asignatura, $firma){

   
   try {

      $id_profesor = "";
      $dni_profesor = "";
      $nombre_profesor = "";
      $telefono_profesor = "";
      $asignatura_profesor = "";
      $firma_profesor = "";

        // preparar y vincular parámetros

        $stmt = $this->conexion->prepare("UPDATE profesores 
        SET nombre=:nombre, dni=:dni, telefono=:telefono, asignatura=:asignatura, firma=:firma 
        WHERE id=:id");

         $stmt->bindParam(':id', $id_profesor);
         $stmt->bindParam(':dni', $dni_profesor);
         $stmt->bindParam(':nombre', $nombre_profesor);
         $stmt->bindParam(':telefono', $telefono_profesor);  
         $stmt->bindParam(':asignatura', $asignatura_profesor); 
         $stmt->bindParam(':firma', $firma_profesor);    

        // Establecemos los parámetros y ejecutamos para insertar
        $id_profesor = $id;
        $dni_profesor = $dni;
        $nombre_profesor = $nombre;
        $telefono_profesor = $telefono;
        $asignatura_profesor = $asignatura;
        $firma_profesor = $firma;



        $stmt->execute();



 } catch(PDOException $e) {

        echo "Error: " . $e->getMessage();

 }

   
  

}


function borrar_profesor($id){



   try {

      $id_profesor="";

       // preparar y vincular parámetros

       $stmt = $this->conexion->prepare("DELETE FROM profesores WHERE id=:id");

       $stmt->bindParam(':id', $id_profesor);

      

       // establecemos los parámetros y ejecutamos para insertar

       $id_profesor = $id;

  

       $stmt->execute();

} catch(PDOException $e) {

       echo "Error: " . $e->getMessage();

}





  

}





}





?>
