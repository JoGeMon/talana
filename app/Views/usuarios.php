<?= $this->extend('default') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col justify-content-end">
        <button type="button" class="btn btn-sm btn-primary">Agregar Usuario</button>
    </div>
</div>
<div class="row">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
            </thead>
        <tbody>
            <?php foreach($usuarios as $usuario) :  ?>
                <tr>
                    <td><?= $usuario['id'] ?></td>
                    <td><?= $usuario['nombre'] ?></td>
                    <td><?= $usuario['email'] ?></td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm">Editar</a>
                        <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>