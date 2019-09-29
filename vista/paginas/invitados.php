<nav aria-label="breadcrumb mt-4">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Invitados</li>

  </ol>
</nav>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar Invitado
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Invitado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="#" method="post">
        <div class="modal-body">

          <div class="form-row">
            <div class="form-group col-md-6">

              <input type="hidden" class="form-control" id="idinvitado" placeholder="id_invitado" name="idinvitado">
            </div>
            <div class="form-group col-md-12">
              <label for="nombre">Nombre del invitado</label>
              <input type="text" class="form-control" id="nombre" placeholder="Nombre del invitado" name="nombre">
            </div>
          </div>

          <div class="form-group">
            <label for="fechaNas">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="fechaNas" placeholder="Fecha de nacimiento" name="fechaNas">
          </div>
          <div class="form-group col-md-4">
            <label for="genero">Genero</label>
            <input type="radio" class="form-control" id="genero_hombre" name="genero" value="1">Hombre <br>
            <input type="radio" class="form-control" id="genero_mujer" name="genero" value="0">Mujer
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="lugar_procedencia">Lugar de procedencia</label>
              <input type="text" class="form-control" id="lugar_procedencia" name="lugar_procedencia">
            </div>
            <div class="form-group col-md-6">
              <label for="telefono">Teléfono</label>
              <input type="number" class="form-control" id="telefono" name="telefono">
            </div>
            <div class="form-group col-md-6">
              <label for="email">E-mail</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group col-md-6">
              <label for="idpersona">Codigo de identificacion</label>
              <select name="idpersona" id="idpersona" class="form-control form-control-lg">
                <option value="">Selecione una persona</option>
                <?php
                $personas = file_get_contents("http://itzagenda.softmormx.com/api/api.php/personas");
                $personas = json_decode($personas, true);

                foreach ($personas as $key => $value) :


                  ?>
                  <option value="<?php echo $value['idpersona'] ?>"><?php echo $value['nombre'] ?></option>

                <?php endforeach; ?>
              </select>
             
            </div>

            <div class="form-group col-md-6">
              <label for="parentesco">Parentesco</label>
              <input type="text" class="form-control" id="parentesco" name="parentesco">
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
          <button type="submit" class="btn btn-primary" name="btnGuardarInivitado">Guardar</button>
        </div>
        <?php
        $enviarData = new InvitadoControlador();
        $enviarData->ctrAgregarInivitado();
        ?>
      </form>
    </div>
  </div>
</div>