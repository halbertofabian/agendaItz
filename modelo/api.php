<?php

require_once 'vendor/autoload.php';
require_once 'vendor/conexion.php';

$app = new \Slim\Slim();

// Obtner todas las Personas
$app->get("/personas",function(){
	$conexion = Conexion::conectar();
	$query = $conexion->prepare("SELECT * FROM persona");
	$query->execute();

	echo json_encode($query->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_LINE_TERMINATORS);
	$query =  null;
	$conexion = null;
});

// Obtener todos los invitados
$app->get("/invitados",function(){
	$conexion =  Conexion::conectar();
	$query = $conexion->prepare("SELECT * FROM invitados");
	$query->execute();

	echo json_encode($query->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_LINE_TERMINATORS);
	$query = null;
	$conexion = null;
});

//Obtener todos los lugares
$app->get("/lugares",function(){
	$conexion = Conexion::conectar();
	$query = $conexion->prepare("SELECT nombrelugar, ST_AsText(direccion) FROM lugares;");
	$query->execute();

	echo json_encode($query->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_LINE_TERMINATORS);
	$query = null;
	$conexion = null;
});

//Obtener todas los tematicas
$app->get("/tematicas",function(){
	$conexion = Conexion::conectar();
	$query = $conexion->prepare("SELECT * FROM tematicas");
	$query->execute();

	echo json_encode($query->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_LINE_TERMINATORS);
	$query = null;
	$conexion = null;
});

//Obtener todas las Actividades
$app->get("/actividades",function(){
	$conexion = Conexion::conectar();
	$query = $conexion->prepare("SELECT * FROM actividades");
	$query->execute();
	
	echo json_encode($query->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_LINE_TERMINATORS);
	$query = null;
	$conexion = null;
});

//Obtener Pago de Eventos por id
$app->get("/eventos/:id",function($id){
	$conexion = Conexion::conectar();
	$query = $conexion->prepare("SELECT idevento AS id, nombrevento AS nombre, costototal AS costo, tpagado AS abonado FROM eventos
	WHERE idevento = :id");

	$query->bindParam(":id",$id,PDO::PARAM_STR);
	$query->execute();
	
	echo json_encode($query->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_LINE_TERMINATORS);
	$query = null;
	$conexion = null;
});

//Ver eventos activos
$app->get("/eventos",function(){
	$conexion = Conexion::conectar();
	$query = $conexion->prepare("SELECT * FROM eventos WHERE estado = 1");
	$query->execute();
	
	echo json_encode($query->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_LINE_TERMINATORS);
	$query = null;
	$conexion = null;
});

// Insertar Persona
$app->post("/insertar/persona",function() use($app){
	
	try
	{
		$conexion = Conexion::conectar();
		$query="INSERT INTO persona 
		VALUES(
			'{$app->request->post("idpersona")}',
			'{$app->request->post("nombre")}',
			'{$app->request->post("fechaNas")}',
		 	 b'{$app->request->post("genero")}',
			'{$app->request->post("lugar_procedencia")}',
			'{$app->request->post("telefono")}',
			'{$app->request->post("email")}',
			'{$app->request->post("rol")}',
			'{$app->request->post("idlugar")}',
			'{$app->request->post("idevento")}',
			'{$app->request->post("clave")}'
			)";

	$pps = $conexion->prepare($query);

		if($pps -> execute())
		{
			$result = array("status" => true, "message" => "Persona Insertado con Exito");
		}
		else
		{
			$result = array("status" => false, "message" => "Upss! ha Ocurrido un error");
		}

		echo json_encode($result);
		$pps = null;
		$query = null;
		$conexion = null;	
	}
	catch(Exception $e)
	{
		print_r($e->getMessage());
	}
});

// Insertar Invitado
$app->post("/insertar/invitado",function() use($app){
	
	try
	{
		$conexion = Conexion::conectar();
		$query="INSERT INTO invitados 
		VALUES(
			'{$app->request->post("idinvitado")}',
			'{$app->request->post("nombre")}',
			'{$app->request->post("fechaNas")}',
		 	 b'{$app->request->post("genero")}',
			'{$app->request->post("lugar_procedencia")}',
			'{$app->request->post("telefono")}',
			'{$app->request->post("email")}',
			'{$app->request->post("idpersona")}',
			'{$app->request->post("parentesco")}',
			'{$app->request->post("idlugar")}'
			)";

	$pps = $conexion->prepare($query);

		if($pps -> execute())
		{
			$result = array("status" => true, "message" => "Invitado con Exito");
		}
		else
		{
			$result = array("status" => false, "message" => "Upss! ha Ocurrido un error");
		}

		echo json_encode($result);
		$pps = null;
		$query = null;
		$conexion = null;	
	}
	catch(Exception $e)
	{
		print_r($e->getMessage());
	}
});

// Insertar Lugar 
$app->post("/insertar/lugar",function() use($app){

	$point = $app->request->post("direccion");

	try
	{
		$conexion = Conexion::conectar();
		$query="INSERT INTO lugares 
		VALUES(
			'{$app->request->post("id_place")}',
			'{$app->request->post("nombrelugar")}',
			ST_GeomFromText('POINT($point)',4326),
		 	'{$app->request->post("codigopostal")}',
			'{$app->request->post("descripcion")}',
			'{$app->request->post("nombredueño")}',
			'{$app->request->post("telefono")}',
			'{$app->request->post("capacidad")}'
			)";

	$pps = $conexion->prepare($query);

		if($pps -> execute())
		{
			$result = array("status" => true, "message" => "Lugar Creado con Exito");
		}
		else
		{
			$result = array("status" => false, "message" => "Upss! ha Ocurrido un error");
		}

		echo json_encode($result);
		$pps = null;
		$query = null;
		$conexion = null;
	}
	catch(Exception $e)
	{
		print_r($e->getMessage());
	}
});

// Insertar Tematica 
$app->post("/insertar/tematica",function() use($app){

	try
	{
		$conexion = Conexion::conectar();
		$query="INSERT INTO tematicas 
		VALUES(
			'{$app->request->post("idtematica")}',
			'{$app->request->post("tematica")}',
			'{$app->request->post("color")}',
		 	'{$app->request->post("vestimenta")}',
			'{$app->request->post("decoracion")}'
			)";

		$pps = $conexion->prepare($query);

		if($pps -> execute())
		{
			$result = array("status" => true, "message" => "Tematica Creada con Exito");
		}
		else
		{
			$result = array("status" => false, "message" => "Upss! ha Ocurrido un error");
		}

		echo json_encode($result);
		$pps = null;
		$query = null;	
		$conexion = null;
	}
	catch(Exception $e)
	{
		print_r($e->getMessage());
	}
});

// Insertar Evento 
$app->post("/insertar/evento",function() use($app){

	try
	{
		$conexion = Conexion::conectar();
		$query="INSERT INTO eventos 
		VALUES(
			'{$app->request->post("idevento")}',
			'{$app->request->post("nombrevento")}',
			'{$app->request->post("fechaevent")}',
		 	'{$app->request->post("costototal")}',
			'{$app->request->post("tpagado")}',
			'{$app->request->post("tematica_idtipotematica")}',
			'{$app->request->post("idlugar")}'
			)";

	$pps = $conexion->prepare($query);

		if($pps -> execute())
		{
			$result = array("status" => true, "message" => "Tematica Creado con Exito");
		}
		else
		{
			$result = array("status" => false, "message" => "Upss! ha Ocurrido un error");
		}

		echo json_encode($result);
		$pps = null;
		$query = null;
		$conexion = null;	
	}
	catch(Exception $e)
	{
		print_r($e->getMessage());
	}
});

// Insertar Actividades
$app->post("/insertar/actividad",function() use($app){
	
	try
	{
		$conexion = Conexion::conectar();
		$query="INSERT INTO actividades 
		VALUES(
			'{$app->request->post("idactividad")}',
			'{$app->request->post("nombreactividad")}',
			'{$app->request->post("descripcion")}',
		 	'{$app->request->post("fechaini")}',
			'{$app->request->post("fechafin")}',
			'{$app->request->post("gasto")}',
			'{$app->request->post("importe")}',
			'{$app->request->post("actividadcol")}',
			'{$app->request->post("idevento")}',
			'{$app->request->post("idlugar")}'
			)";

	$pps = $conexion->prepare($query);

		if($pps -> execute())
		{
			$result = array("status" => true, "message" => "Actividad Registrada con Exito");
		}
		else
		{
			$result = array("status" => false, "message" => "Upss! ha Ocurrido un error");
		}

		echo json_encode($result);
		$pps = null;
		$query = null;	
		$conexion = null;
	}
	catch(Exception $e)
	{
		print_r($e->getMessage());
	}
});

//Obtener Parientes de Organizador
$app->get("/parientes/:id",function($id){
	$conexion = Conexion::conectar();
	$query = $conexion->prepare(
		"SELECT i.idinvitado AS id, i.nombre, i.parentesco, i.telefono
		FROM (invitados i JOIN persona p 
		ON i.idpersona = p.idpersona)
		WHERE (i.idpersona = $id AND (i.parentesco = 'Mamá' OR i.parentesco = 'Papá' OR i.parentesco = 'Hijo' OR i.parentesco = 'Hija'  OR i.parentesco = 'Hermano' 
		OR i.parentesco = 'Hermana' OR i.parentesco = 'Tío' OR i.parentesco = 'Tía' OR i.parentesco = 'Primo' OR i.parentesco = 'Prima'
		OR i.parentesco = 'Hierno' OR i.parentesco = 'Nuera' OR i.parentesco = 'Cuñado' OR i.parentesco = 'Cuñada' OR i.parentesco = 'Sobrino'
		OR i.parentesco = 'Sobrina'))
		ORDER BY i.nombre;	
		");
		//SELECT * FROM conferencias WHERE id = :conf_id
	$query->bindParam(":id",$id,PDO::PARAM_STR);

	$query->execute();
	//print_r($query->fetchAll(PDO::FETCH_ASSOC));
	echo json_encode($query->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
	$conexion = null;
	$query = null;
});

//Obtener datos de Evento por id de organizador
$app->get("/evento/:id",function($id){
	$conexion = Conexion::conectar();
	$query = $conexion->prepare(
		"SELECT e.idevento, e.nombrevento, e.fechaevent,  e.costototal, e.tpagado, t.tematica, l.nombrelugar
		FROM persona p JOIN eventos e ON p.idevento = e.idevento JOIN tematicas t
		ON e.tematica_idtipotematica = t.idtipotematica JOIN lugares l ON e.idlugar = l.idlugar
		WHERE p.idpersona = :id AND p.rol = 'Organizador'
		GROUP BY e.idevento;	
		");
		//SELECT * FROM conferencias WHERE id = :conf_id
	$query->bindParam(":id",$id,PDO::PARAM_STR);

	$query->execute();
	//print_r($query->fetchAll(PDO::FETCH_ASSOC));
	echo json_encode($query->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
	$conexion = null;
	$query = null;
});

//Actualizar evento 
$app->post("/update/evento",function() use($app){

	try
	{
	$conexion = Conexion::conectar();
	$query = "UPDATE  eventos 
	SET
	nombrevento = '{$app->request->post("nombrevento")}',
	fechaevent = '{$app->request->post("fechaevent")}',
	tematica_idtipotematica ='{$app->request->post("tematica_idtipotematica")}'
	idlugar ='{$app->request->post("idlugar")}'
	WHERE idevento = '{$app->request->post("idevento")}' ";
	
	$pps = $conexion->prepare($query);

	if($pps -> execute()){
		$result = array("status" => true, "message" => "Evento Actualizado Exitosamente!");
	}else{
		$result = array("status" => false, "message" => "La conferencia no existe");
	}

	echo json_encode($result);
	$query = null;
	$pps = null;
	$conexion = null;
	}
	catch(Exception $e)
	{
		print_r($e->getMessage());
	}
});

//Actualizar Pago evento 
$app->post("/update/pagoevt",function() use($app){

	try
	{
	$conexion = Conexion::conectar();

	$query = "UPDATE  eventos 
	SET
	tpagado = tpagado + '{$app->request->post("tpagado")}'
	WHERE idevento = '{$app->request->post("idevento")}' AND costototal > tpagado";
	
	$pps = $conexion->prepare($query);

	if($pps -> execute()){
		$result = array("status" => true, "message" => "Pago Actualizado Exitosamente!");
	}else{
		$result = array("status" => false, "message" => "La conferencia no existe");
	}

	echo json_encode($result);
	$query = null;
	$pps = null;
	$conexion = null;
	}
	catch(Exception $e)
	{
		print_r($e->getMessage());
	}
});

//Finalizar evento 
$app->post("/fin/evento",function() use($app){

	try
	{
	$conexion = Conexion::conectar();

	$query = "UPDATE  eventos 
	SET
	estado = 0
	WHERE idevento = '{$app->request->post("idevento")}'";
	
	$pps = $conexion->prepare($query);

	if($pps -> execute()){
		$result = array("status" => true, "message" => "Evento Finalizado Exitosamente!");
	}else{
		$result = array("status" => false, "message" => "La conferencia no existe");
	}

	echo json_encode($result);
	$query = null;
	$pps = null;
	$conexion = null;
	}
	catch(Exception $e)
	{
		print_r($e->getMessage());
	}
});

/*	//Eliminar por id
$app->get("/delete/conference/:id",function($id) use($app){
	$query = Conexion::conectar()->prepare(
		"DELETE  FROM conferencias WHERE id = :conf_id	
		");
	$query -> bindParam(":conf_id",$id,PDO::PARAM_STR);

	//var_dump($query->execute()>0);
	$query->execute();

	if($query->rowCount()){
		$result = array("status" => true, "message" => "Conferencia borrada");
	}else{
		$result = array("status" => false, "message" => "La conferencia no existe");
	}

	echo json_encode($result);
});
*/

$app->run();

