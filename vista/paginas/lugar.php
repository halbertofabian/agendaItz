<nav aria-label="breadcrumb mt-4">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Lugar</li>

  </ol>
</nav>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar Lugar
</button>

<div class="container">
  <table class="table table-striped table-responsive">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Direccion</th>
        
      </tr>
    </thead>
    <tbody>
      <?php  
        
        // Mandar a traer la api para consumir su data
        $api = file_get_contents("http://itzagenda.softmormx.com/api/api.php/lugares");
        // convertir la data que viene en json a arrglo
        $api = json_decode($api,true);
        
        /**
         * Mostrar que es lo que contine
        *echo "<pre>";
        *print_r($api);
        *echo "</pre>";*/
        foreach ($api as $key => $value):
      ?>

      <tr>
        <th>
          <?php echo $value['idlugar']; ?>
        </th>
        <th>
          <?php echo $value['nombrelugar']; ?>
        </th>
        <th>
          <?php echo $value['ST_AsText(direccion)']; ?>
        </th>
        
      </tr>

        <?php endforeach; ?>


    </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar lugar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="#" method="post">
        <div class="modal-body">
         
            <div class="form-row">
              <div class="form-group col-md-6">
               
                <input type="hidden" class="form-control" id="id_place" placeholder="id lugar" name="id_place">
              </div>
              <div class="form-group col-md-12">
                <label for="nombrelugar">Nombre del lugar</label>
                <input type="text" class="form-control" id="nombrelugar" placeholder="Nombre del lugar" name="nombrelugar">
              </div>
            </div>
            
            <div class="form-group">
              <label for="direccion">Dirección</label>
              <input type="text" class="form-control" id="direccion" placeholder="45 -98" name="direccion">
            </div>
            <div class="form-group col-md-4">
              <label for="codigopostal">Código postal</label>
              <input type="number" class="form-control" id="codigopostal" name="codigopostal">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion">
              </div>
              <div class="form-group col-md-6">
                <label for="nombredueño">Nombre dueño</label>
                <input type="text" class="form-control" id="nombredueño" name="nombredueño">
              </div>
              <div class="form-group col-md-6">
                <label for="telefono">Teléfono</label>
                <input type="number" class="form-control" id="telefono" name="telefono">
              </div>
              <div class="form-group col-md-6">
                <label for="capacidad">capacidad</label>
                <input type="number" class="form-control" id="capacidad" name="capacidad">
              </div>


            </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" name="btnGuardarLugar">Guardar</button>
        </div>
        <?php 
            $enviarData = new LugarControlador();
            $enviarData -> ctrAgregarLugar();
         ?>
      </form>
    </div>
  </div>
</div>