<?=$this->extend('admin/main')?>

<?=$this->section('title')?>
Actualizar usuario
<?=$this->endSection()?>
<?=$this->section('css')?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
<link rel="stylesheet" href="/assets/css/style_admin.css">
<?=$this->endSection()?>
<?=$this->section('content')?>

<section class="section">
    <?php if(session('msg')):?>
    <article class="message is-<?=session('msg.type')?>">
        <div class="message-body">
            <?=session('msg.body')?>
        </div>
    </article>
    <?php endif; ?>

    <div class="container">

        <h1 class="title">Actualizar usuario</h1>
        <h2 class="subtitle">
            Modifique los datos del usuario que desea actualizar.
        </h2>
        <form class="border p-3 form "
            action="<?=base_url('admin/actualizarUsuario')?>?id=<?= password_hash($mostrar->idUsuario,PASSWORD_DEFAULT)?>"
            method="POST">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label class="label">Nombres</label>
                    <div class="control">
                        <input name='nombre' value="<?= $mostrar->nombre ?>" class="input" type="text"
                            placeholder="Ej: Melvin Marvin">
                    </div>
                    <p class="is-danger help"><?=session('errors.nombre')?></p>
                </div>

                <div class="form-group col-md-4">
                    <label class="label">Apellidos</label>
                    <div class="control">
                        <input name='apellido' value="<?= $mostrar->apellido ?>" class="input" type="text"
                            placeholder="Ej: Quintanilla Saldivar">
                    </div>
                    <p class="is-danger help"><?=session('errors.apellido')?></p>
                </div>

                <div class="form-group col-md-4">
                    <label class="label">Usuario</label>
                    <div class="control">
                        <input name='usuario' value="<?= $mostrar->usuario ?>" class="input" type="text"
                            placeholder="Ej: Quintanilla Saldivar">
                    </div>
                    <p class="is-danger help"><?=session('errors.apellido')?></p>
                </div>

                <div class="form-group col-md-4">
                    <label class="label">Correo Electronico</label>
                    <div class="control has-icons-left has-icons-right">
                        <input name='email' value="<?= $mostrar->email?>" class="input" type=""
                            placeholder="email@gmail.com" value="">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    <p class="is-danger help"><?=session('errors.email')?></p>
                </div>

                <div class="form-group col-md-2">
                    <label class="label">Número de telefono</label>
                    <div class="control">
                        <input name='telefono' value='<?= $mostrar->telefono ?>' class="input" type="text"
                            placeholder="75757575">
                    </div>
                    <p class="is-danger help"><?=session('errors.telefono')?></p>
                </div>

                <div class="col-md-2">
                    <label class="label">Número de DUI</label>
                    <div class="control">
                        <input name='dui' value='<?= $mostrar->dui ?>' class="input" type="text"
                            placeholder="00000000-0">
                    </div>
                    <p class="is-danger help"><?=session('errors.dui')?></p>
                </div>

                <div class="form-group col-md-5 col-md-offset-8">
                    <label class="label">Asignar estado del empleado</label>
                    <div class="control select is-link">
                        <select name='estado'>

                            <option value="1" <?php if($mostrar->estado == 1): ?>selected<?php endif;?>>
                                Activo</option>
                            <option value="0" <?php if($mostrar->estado == 0): ?>selected<?php endif;?>>
                                No activo</option>
                        </select>
                    </div>
                    <p class="is-danger help"><?=session('errors.idiomaPrimario')?></p>
                </div>

                <div class="col-md-6 col-md-offset-3">
                    <label class="label">Asignar un rol</label>
                    <div class="control select is-link">
                        <select name='idRol'>

                            <option value="1" <?php if($mostrar->idRol == 1): ?>selected<?php endif;?>>
                                Admin</option>

                            <option value="2" <?php if($mostrar->idRol == 2): ?>selected<?php endif;?>>
                                Usuario</option>
                        </select>
                    </div>
                    <p class="is-danger help"><?=session('errors.idiomaPrimario')?></p>
                </div>

                <br>
                <div class="col-md-5">
                    <label class="label">Contraseña</label>
                    <div class="control">
                        <input name='password' class="input" type="password" placeholder="Contraseña">
                    </div>
                    <p class="is-danger help"><?=session('errors.password')?></p>
                </div>

                <div class="col-md-5">
                    <label class="label">Repetir contraseña</label>
                    <div class="control">
                        <input name='c-password' class="input" type="password" placeholder="Repite contraseña">
                    </div>
                </div>

                <div class="col-md-8 col-md-offset-3">
                    <div class="control">
                        <button class="button is-primary">Actualizar</button>
                    </div>
                </div>
        </form>
    </div>
</section>
<?=$this->endSection()?>