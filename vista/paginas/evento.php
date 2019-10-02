<nav aria-label="breadcrumb mt-4">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Home</li>

  </ol>
</nav>

<h1>Eventos</h1>
</nav>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar Evento
</button>

<div class="container">
  <table class="table table-striped table-responsive">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre de evento</th>
        <th scope="col">Fecha evento</th>
        <th scope="col">Costo total evento</th>
        
      </tr>
    </thead>
    <tbody>
      <?php  
        
        // Mandar a traer la api para consumir su data
        $api = file_get_contents("http://itzagenda.softmormx.com/api/api.php/eventos");
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
          <?php echo $value['idevento']; ?>
        </th>
        <th>
          <?php echo $value['nombrevento']; ?>
        </th>
        <th>
          <?php echo $value['fechaevent']; ?>
        </th>
        <th>
          <?php echo $value['costototal']; ?>
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
        <h5 class="modal-title" id="exampleModalLabel">Agregar evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="#" method="post">
        <div class="modal-body">
         
            <div class="form-row">
              <div class="form-group col-md-6">
               
                <input type="hidden" class="form-control" id="idevento" placeholder="id del evento" name="idevento">
              </div>
              <div class="form-group col-md-12">
                <label for="nombrevento">Nombre del evento</label>
                <input type="text" class="form-control" id="nombrevento" placeholder="Nombre del evento" name="nombrevento">
              </div>
            </div>
            
            <div class="form-group">
              <label for="fechaevent">Fecha del evento</label>
              <input type="date" class="form-control" id="fechaevent" placeholder="Fecha del evento" name="fechaevent">
            </div>
            <div class="form-group col-md-4">
              <label for="costototal">Código postal</label>
              <input type="number" class="form-control" id="costototal" name="costototal">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="tpagado">Total pagado</label>
                <input type="text" class="form-control" id="tpagado" name="tpagado">
              </div>
              <div class="form-group col-md-6">
                <label for="tematica_idtipotematica">Tematica</label>
                <select name="tematica_idtipotematica" id="idlugar" class="form-control form-control-lg">
                <option value="">Selecione un lugar</option>
                <?php
                $lugares = file_get_contents("http://itzagenda.softmormx.com/api/api.php/tematicas");
                $lugares = json_decode($lugares, true);

                foreach ($lugares as $key => $value) :


                  ?>
                  <option value="<?php echo $value['idtipotematica'] ?>"><?php echo $value['tematica'] ?></option>

                <?php endforeach; ?>
              </select>
              </div>
              <div class="form-group col-md-6">
                <label for="idlugar">Lugar</label>
                <select name="idlugar" id="idlugar" class="form-control form-control-lg">
                <option value="">Selecione un lugar</option>
                <?php
                $lugares = file_get_contents("http://itzagenda.softmormx.com/api/api.php/lugares");
                $lugares = json_decode($lugares, true);

                foreach ($lugares as $key => $value) :


                  ?>
                  <option value="<?php echo $value['idlugar'] ?>"><?php echo $value['nombrelugar'] ?></option>

                <?php endforeach; ?>
              </select>
              </div>
              


            </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" name="btnGuardarEvento">Guardar</button>
        </div>
        <?php 
            $enviarData = new EventoControlador();
            $enviarData -> ctrAgregarEvento();
         ?>
      </form>
    </div>
  </div>
</div>