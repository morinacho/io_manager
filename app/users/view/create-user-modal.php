<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Agregar empleado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="post" name="agregar-empleado" data-url="<?php echo URL_ROUTE ?>users/store" >
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" name="apellido" class="form-control" id="in-apellidos" placeholder="Ingresar apellidos" required>
                        <label for="floatingInput">Apellidos</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="nombres" class="form-control" id="in-nombres" placeholder="Ingresar nombres" required>
                        <label for="floatingInput">Nombres</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="documento" class="form-control" id="in-documento" placeholder="Ingresar documento" required>
                        <label for="floatingInput">Nº Documento</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="in-email" placeholder="Ingresar email" required>
                        <label for="floatingInput">ejemplo@mail.com</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="telefono" class="form-control" id="in-telefono" placeholder="Ingresar telefono" required>
                        <label for="floatingInput">Teléfono</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="area" class="form-select" aria-label="Default select example">
                            <option selected disabled>Seleccionar area</option>
                            <?php 
                                foreach($param['areas'] as $area){
                                    echo "
                                        <option value='$area->id'>$area->nombre</option>
                                    ";
                                }
                            ?>
                        </select>
                        <label for="floatingInput">Area</label>
                    </div>
                    <div class="form-floating mb-3c hide">
                        <select name="rol" class="form-select" aria-label="Default select example">
                            <option selected disabled>Seleccionar rol</option>
                            <?php 
                                foreach($param['roles'] as $rol){
                                    echo "
                                        <option value='$rol->id'>$rol->nombre</option>
                                    ";
                                }
                            ?>
                        </select>
                        <label for="floatingInput">Rol</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="save-user" name="save-user">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
