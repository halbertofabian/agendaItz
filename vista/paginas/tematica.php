<nav aria-label="breadcrumb mt-4">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Tematica</li>

  </ol>
</nav>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar Tematica
</button>

<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tematica</th>
        <th scope="col">Color</th>
        <th scope="col">Vestimenta</th>
        <th scope="col">Decoracion</th>
        
      </tr>
    </thead>
    <tbody>
      <?php  
        
        // Mandar a traer la api para consumir su data
        $api = file_get_contents("http://itzagenda.softmormx.com/api/api.php/tematicas");
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
          <?php echo $value['idtipotematica']; ?>
        </th>
        <th>
          <?php echo $value['tematica']; ?>
        </th>
        <th>
          <?php echo $value['color']; ?>
        </th>
        <th>
          <?php echo $value['vestimenta']; ?>
        </th>
        <th>
          <?php echo $value['decoracion']; ?>
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
        <h5 class="modal-title" id="exampleModalLabel">Agregar Tematica</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="#" method="post">
        <div class="modal-body">

          <div class="form-row">
            <div class="form-group col-md-6">

              <input type="hidden" class="form-control" id="idtematica" placeholder="id tematica" name="idtematica">
            </div>
            <div class="form-group col-md-12">
              <label for="tematica">Tematica</label>
              <input type="text" class="form-control" id="tematica" placeholder="Tematica" name="tematica">
            </div>
          </div>

          <div class="form-group">
            <label for="color">Color</label>
            <input type="text" class="form-control" id="color" placeholder="Rojo, amarillo, azul, etc..." name="color">
          </div>
          <div class="form-group col-md-12">
            <label for="vestimenta">vestimenta</label>
            <input type="text" class="form-control" id="vestimenta" name="vestimenta">
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="decoracion">Decoracion</label>
              <input type="text" class="form-control" id="decoracion" name="decoracion">
            </div>

          </div>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" name="btnGuardarTematica">Guardar</button>
        </div>
        <?php
      $enviarData = new TematicaControlador();
        $enviarData->ctrAgregarTematica();
        ?>
      </form>
    </div>
  </div>
</div>