<?=$this->extend('admin/main')?>

<?=$this->section('title')?>
Registrar CT
<?=$this->endSection()?>
<?=$this->section('css')?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css
">
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
    <h1 class="title">Registrar un nuevo centro de tecnología</h1>
    <h2 class="subtitle">
        Llena los siguientes datos para agregar un nuevo centro de tecnología.
    </h2>
    <form action="<?=base_url('admin/registrarCt')?>" method="POST">
        <div class="field">
            <label class="label">Nombre del centro de tecnología</label>
            <div class="control">
                <input name='nombreCt' value='<?=old('nombreCt')?>' class="input" type="text"
                    placeholder="Ej: Melvin Marvin">
            </div>
            <p class="is-danger help"><?=session('errors.nombreCt')?></p>
        </div>


        <div class="field control">
            <label class="label">Selecciona un encargado</label>
            <div class="control select is-link">
                <select name='encargado'>
                    <option value="">...</option>
                    <?php foreach ($usuarios as $key): ?>
                    <?php if(!in_array($key->idUsuario,$ct)):?>
                    <option value="<?=password_hash($key->idUsuario,PASSWORD_DEFAULT)?>">
                        <?=$key->nombre." ".$key->apellido?></option>
                    <?php endif;?>
                    <?php endforeach;?>
                </select>
            </div>
            <p class="is-danger help"><?=session('errors.encargado')?></p>
        </div>

        <div class="field">
            <label class="label">Descripción</label>
            <div class="control">
                <textarea class="textarea" name='descripcion' class="input" type="text"
                    placeholder="Una breve descripcion" row="10"><?=old('descripcion')?></textarea>
            </div>
            <p class="is-danger help"><?=session('errors.descripcion')?></p>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-primary">Registrar</button>
            </div>
        </div>
    </form>
</section>
<?=$this->endSection()?>