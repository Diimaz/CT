<?=$this->extend('user/main')?>

<?=$this->section('title')?>
Actualizar
<?=$this->endSection()?>
<?=$this->section('css')?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
<link rel="stylesheet" href="/assets/css/style.css">
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
    <h1 class="title">Actualiza tu perfil</h1>
    <h2 class="subtitle">
        Modifica lo que quieras actualizar y presiona guardar.
    </h2>
    <form action="<?=base_url('user/actualizarPerfil')?>?id=<?= password_hash($usuario->idUsuario,PASSWORD_DEFAULT)?>"
        method="POST">

        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="label">Nombres</label>
                <div class="control">
                    <input name='nombre'
                        value="<?php if(old('nombre') != null): ?><?=old('nombre')?><?php else: ?><?= $usuario->nombre ?><?php endif; ?>"
                        class="input" type="text" placeholder="Ej: Melvin Marvin">
                </div>
                <p class="is-danger help"><?=session('errors.nombre')?></p>
            </div>

            <div class="form-group col-md-4">
                <label class="label">Apellidos</label>
                <div class="control">
                    <input name='apellido'
                        value="<?php if(old('apellido') != null): ?><?=old('apellido')?><?php else: ?><?= $usuario->apellido ?><?php endif; ?>"
                        class="input" type="text" placeholder="Ej: Quintanilla Saldivar">
                </div>
                <p class="is-danger help"><?=session('errors.apellido')?></p>
            </div>

            <div class="form-group col-md-4">
                <label class="label">Usuario</label>
                <div class="control">
                    <input name='usuario'
                        value="<?php if(old('usuario') != null): ?><?=old('usuario')?><?php else: ?><?= $usuario->usuario ?><?php endif; ?>"
                        class="input" type="text" placeholder="Ej: User123">
                </div>
                <p class="is-danger help"><?=session('errors.usuario')?></p>
            </div>

            <div class="form-group col-md-4">
                <label class="label">Correo Electronico</label>
                <div class="control has-icons-left has-icons-right">
                    <input name='email'
                        value="<?php if(old('email') != null): ?><?=old('email')?><?php else: ?><?= $usuario->email ?><?php endif; ?>"
                        class="input" type="" placeholder="email@gmail.com" value="">
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <span class="icon is-small is-right">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                </div>
                <p class="is-danger help"><?=session('errors.email')?></p>
            </div>

            <div class="form-group col-md-2">
                <label class="label">Número de telefono</label>
                <div class="control">
                    <input name='telefono'
                        value='<?php if(old('telefono') != null): ?><?=old('telefono')?><?php else: ?><?= $usuario->telefono ?><?php endif; ?>'
                        class="input" type="text" placeholder="75757575">
                </div>
                <p class="is-danger help"><?=session('errors.telefono')?></p>
            </div>

            <div class="col-md-2">
                <label class="label">Contraseña</label>
                <div class="control">
                    <input name='password' class="input" type="password" placeholder="Contraseña">
                </div>
                <p class="is-danger help"><?=session('errors.password')?></p>
            </div>

            <div class="col-md-2">
                <label class="label">Confirma tu contraseña</label>
                <div class="control">
                    <input name='c-password' class="input" type="password" placeholder="Repite contraseña">
                </div>
            </div>

            <div class="col-md-8 col-md-offset-3">
                <div class="control">
                    <button class="button is-primary">Guardar datos</button>
                </div>
            </div>

        </div>
    </form>
</section>
<?=$this->endSection()?>