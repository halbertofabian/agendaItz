<nav aria-label="breadcrumb mt-4">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Actividad</li>

  </ol>
</nav>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar Actividad
</button>

<div class="container">
  <table class="table table-striped table-responsive">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre de evento</th>
        <th scope="col">Descripción</th>
        <th scope="col">Fecha inicio</th>
        <th scope="col">Fecha termino</th>
        <th scope="col">Gasto</th>
        <th scope="col">Importe</th>
        
      </tr>
    </thead>
    <tbody>
      <?php  
        
        // Mandar a traer la api para consumir su data
        $api = file_get_contents("http://itzagenda.softmormx.com/api/api.php/actividades");
        // convertir la data que viene en json a arrglo
        $api = json_decode($api,true);
        
        /**
         * Mostrar que es lo que contine
        *echo "<pre>";
        *print_r($api);
        *echo "</pre>";*/

        if($api != null):
        foreach ($api as $key => $value):
      ?>

      <tr>
        <th>
          <?php echo $value['idactividad']; ?>
        </th>
        <th>
          <?php echo $value['nombreactividad']; ?>
        </th>
        <th>
          <?php echo $value['descripcion']; ?>
        </th>
        <th>
          <?php echo $value['fechaini']; ?>
        </th>
        <th>
          <?php echo $value['fechafin']; ?>
        </th>
        <th>
          <?php echo $value['gasto']; ?>
        </th>
        <th>
          <?php echo $value['importe']; ?>
        </th>
        
      </tr>

        <?php endforeach; endif; ?>


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
               
                <input type="hidden" class="form-control" id="idactividad" placeholder="id lugar" name="idactividad">
              </div>
              <div class="form-group col-md-12">
                <label for="nombreactividad">Nombre de la actividad</label>
                <input type="text" class="form-control" id="nombreactividad" placeholder="Nombre de la actividad" name="nombreactividad">
              </div>
            </div>
            
            <div class="form-group">
              <label for="descripcion">Descripcion</label>
              <input type="text" class="form-control" id="descripcion" placeholder="Descripcion" name="descripcion">
            </div>
            <div class="form-group">
            <label for="fechaini">Fecha Inicial</label>
            <input type="date" class="form-control" id="fechaini" placeholder="Fecha de nacimiento" name="fechaini">
          </div>
          <div class="form-group">
            <label for="fechafin">Fecha Final</label>
            <input type="date" class="form-control" id="fechafin" placeholder="Fecha de nacimiento" name="fechafin">
          </div>
            <div class="form-group col-md-4">
              <label for="gasto">Gasto</label>
              <input type="double" class="form-control" id="gasto" name="gasto">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="importe">Importe</label>
                <input type="double" class="form-control" id="importe" name="importe">
              </div>
              <div class="form-group col-md-6">
                <label for="actividadcol">Lugar de actividad</label>
                <input type="text" class="form-control" id="actividadcol" name="actividadcol">
              </div>
              <div class="form-group col-md-6">
                <label for="idevento">Evento</label>
                <select name="idevento" id="idevento" class="form-control form-control-lg" required>
                <option value="">Selecione un evento</option>
                <?php
                $personas = file_get_contents("http://itzagenda.softmormx.com/api/api.php/eventos");
                $personas = json_decode($personas, true);

                foreach ($personas as $key => $value) :


                  ?>
                  <option value="<?php echo $value['idevento'] ?>"><?php echo $value['idevento'] . ' ' . $value['nombrevento'] ?></option>

                <?php endforeach; ?>
              </select>
              </div>
              <div class="form-group col-md-6">
                <label for="idlugar">Lugar</label>
                <select name="idlugar" id="idlugar" class="form-control form-control-lg" required>
                <option value="">Selecione un lugar</option>
                <?php
                $personas = file_get_contents("http://itzagenda.softmormx.com/api/api.php/lugares");
                $personas = json_decode($personas, true);

                foreach ($personas as $key => $value) :


                  ?>
                  <option value="<?php echo $value['idlugar'] ?>"><?php echo $value['idlugar'] . ' ' . $value['nombrelugar'] ?></option>

                <?php endforeach; ?>
              </select>
              </div>


            </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" name="btnGuardarActividad">Guardar</button>
        </div>
        <?php 
           $enviarData = new ActividadControlador();
            $enviarData -> ctrAgregarActividad();
         ?>
      </form>
    </div>
  </div>
</div>