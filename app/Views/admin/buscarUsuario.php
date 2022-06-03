<?=$this->extend('admin/main')?>

<?=$this->section('title')?>
Buscar usuario
<?=$this->endSection()?>
<?=$this->section('css')?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css
">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="">
<?=$this->endSection()?>
<?=$this->section('js')?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
</script>
<?=$this->endSection()?>

<?=$this->section('content')?>
<?php $configs = config('CT'); ?>
<section class="container"><br><br>
    <a class="" href="<?=base_url(route_to('search'))?>?estado=1">
        <span class="icon"><i class="fa fa-cog"></i></span>
        <span>Activo</span>
    </a>

    <a class="" href="<?=base_url(route_to('search'))?>?estado=0">
        <span class="icon"><i class="fa fa-cog"></i></span>
        <span>No activo</span>
    </a>

    <br><br>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Dui</th>
                <th>Telefono</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $key): ?>
            <tr>
                <td>
                    <?= $key->nombre ?>
                </td>
                <td>
                    <?= $key->apellido ?>
                </td>
                <td>
                    <?= $key->usuario?>
                </td>
                <td>
                    <?= $key->email?>
                </td>
                <td>
                    <?= $key->dui?>
                </td>
                <td>
                    <?= $key->telefono?>
                </td>
                <td>
                    <?php if($key->idRol == 1): ?>
                    <?= $configs->defaultRolAdmin ?>
                    <?php else: ?>
                    <?= $configs->defaultRolUsuario ?>
                    <?php endif; ?>
                </td>
                <td>
                    <a
                        href="<?=base_url(route_to('update'))?>?id=<?= password_hash($key->idUsuario,PASSWORD_DEFAULT)?>">
                        <span class="icon has-text-warning"><i class="fas fa-sync" aria-hidden="true"></i></span>
                    </a>
                    <?php if($key->estado == 1): ?>
                    <a
                        href="<?=base_url(route_to('delete'))?>?estado=0&id=<?= password_hash($key->idUsuario,PASSWORD_DEFAULT)?>">
                        <span class="icon has-text-danger"><i class="fas fa-trash-alt" aria-hidden="true"></i></span>
                    </a>
                    <?php else: ?>
                    <a
                        href="<?=base_url(route_to('back'))?>?estado=1&id=<?= password_hash($key->idUsuario,PASSWORD_DEFAULT)?>">
                        <span class="icon has-text-success"><i class="fas fa-upload" aria-hidden="true"></i></span>
                    </a>
                    <?php endif; ?>

                </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</section>

<?=$this->endSection()?>