<nav aria-label="breadcrumb mt-4">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Actividad</li>

  </ol>
</nav>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar Actividad
</button>

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
                <input type="text" class="form-control" id="nombreactividad" placeholder="Nombre del lugar" name="nombreactividad">
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
                <label for="idevento">Id evento</label>
                <input type="text" class="form-control" id="idevento" name="idevento">
              </div>
              <div class="form-group col-md-6">
                <label for="idlugar">Id lugar</label>
                <input type="text" class="form-control" id="idlugar" name="idlugar">
              </div>


            </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" name="btnGuardarActividad">Guardar</button>
        </div>
        <?php 
            $enviarData = new LugarControlador();
            $enviarData -> ctrAgregarActividad();
         ?>
      </form>
    </div>
  </div>
</div>