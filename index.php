<?php 
    //Importación de todos los controladores
    require_once 'controlador/plantilla.controlador.php';
    require_once 'controlador/lugar.controlador.php';
    require_once 'controlador/invitado.controlador.php';
    require_once 'controlador/persona.controlador.php';
    require_once 'controlador/tematica.controlador.php';
    require_once 'controlador/evento.controlador.php';

    

    //Imprtación de modelos 

    


    $mostrarPlantilla = new PlantillaControlador();
    $mostrarPlantilla -> ctrMostrarPlantilla();


    

?>