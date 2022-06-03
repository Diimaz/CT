<?=$this->extend('admin/main')?>

<?=$this->section('title')?>
Registrar usuario
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

        <div class="field">
            <label class="label">Encargado</label>
            <div class="control">
                <input name='encargado' value='<?=old('encargado')?>' class="input" type="text"
                    placeholder="Ej: Quintanilla Saldivar">
            </div>
            <p class="is-danger help"><?=session('errors.encargado')?></p>
        </div>

        <div class="field">
            <label class="label">Descripción</label>
            <div class="control">
                <input name='descripcion' value='<?=old('descripcion')?>' class="input" type="text"
                    placeholder="75757575">
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