<nav aria-label="breadcrumb mt-4">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Home</li>

  </ol>
</nav>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalEventos">
  Agregar Evento
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <input type="text" class="form-control" id="nombrevento" placeholder="Nombre del evento" name="nombrevento" required>
            </div>
          </div>

          <div class="form-group">
            <label for="fechaevent">Fecha del evento</label>
            <input type="date" class="form-control" id="fechaevent" placeholder="Fecha del evento" name="fechaevent">
          </div>
          <div class="form-group col-md-4">
            <label for="costototal">Costo del evento</label>
            <input type="number" class="form-control" id="costototal" name="costototal">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="tpagado">Tipo de pago</label>
              <input type="text" class="form-control" id="tpagado" name="tpagado">
            </div>
            <div class="form-group col-md-6">
              <label for="tematica_idtipotematica">Tematica</label>
              <select name="tematica_idtipotematica" id="tematica_idtipotematica" class="form-control form-control-lg" required>
                <option value="">Selecione una tematica</option>
                <?php
                $personas = file_get_contents("http://itzagenda.softmormx.com/api/api.php/tematicas");
                $personas = json_decode($personas, true);

                foreach ($personas as $key => $value) :


                  ?>
                  <option value="<?php echo $value['idtipotematica'] ?>"><?php echo $value['tematica'] ?></option>

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