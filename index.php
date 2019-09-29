<?php 
    //Importación de todos los controladores
    require_once 'controlador/plantilla.controlador.php';
    require_once 'controlador/lugar.controlador.php';
    require_once 'controlador/invitado.controlador.php';

    

    //Imprtación de modelos 

    


    $mostrarPlantilla = new PlantillaControlador();
    $mostrarPlantilla -> ctrMostrarPlantilla();


    

?>