<div class="container">
    <form action="cliente.php?action=<?php echo($action=='update')?'change&id_cliente='.$datos['id_cliente']:'save'; ?>" method="post">
        <h2><?php echo ($action == 'update') ? 'Editar' : 'Nuevo'; ?> Idioma</h2>
        <div class="mb-3">
            <label for="InputCliente" class="form-label">Idioma</label>
            <input type="text" class="form-control" id="InputCliente" name="nombre" required="required" value="<?php echo (isset($datos["nombre"])) ? $datos["nombre"] : ''; ?>">
        </div>
        <input type="submit" class="btn btn-primary" name="save" value="Guardar"></input>
    </form>
</div>