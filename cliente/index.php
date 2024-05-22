<h1>Clientes</h1>
<div class="main-button">
    <a href="index.html" class="btn btn-info">Regresar</a>
    <a href="cliente.php?action=create" class="btn btn-info">Nuevo</a>
</div>
<table class="table table-bordered table-hover align-middle">
    <thead class="table-primary">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Idioma</th>
            <th scope="col">Ultima Actualizacion</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>
            <tr>
                <th scope="row"><?php echo $dato['id_idioma']; ?></th>
                <th scope="row"><?php echo $dato['nombre']; ?></th>
                <th scope="row"><?php echo $dato['ultima_actualizacion']; ?></th>
                <td>
                    <div class="main-button">
                        <a href="cliente.php?action=update&id_idioma=<?php echo $dato['id_idioma']; ?>"
                        class="btn btn-info">Actualizar</a>
                        <a href="cliente.php?action=delete&id_idioma=<?php echo $dato['id_idioma']; ?>"
                         class="btn btn-info">Borrar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<P>Se encontraron <?php echo $app->getCount();?> idiomas</P>