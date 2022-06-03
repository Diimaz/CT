<?=$this->extend('admin/main')?>

<?=$this->section('title')?>
Perfil
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
    <h1 class="title">Perfil</h1>
    <h2 class="subtitle">
        Mi perfil.
    </h2>
    <form action="#" method="POST">
        <div class="field">
            <label class="label">Nombres</label>
            <label class="label"><?=$usuario->nombre?></label>
        </div>

        <div class="field">
            <label class="label">Apellidos</label>
            <label class="label"><?=$usuario->apellido?></label>
        </div>

        <div class="field">
            <label class="label">Usuario</label>
            <label class="label"><?=$usuario->usuario?></label>
        </div>

        <div class="field">
            <label class="label">Correo Electronico</label>
            <label class="label"><?=$usuario->email?></label>
        </div>

        <div class="field">
            <label class="label">Número de telefono</label>
            <label class="label"><?=$usuario->telefono?></label>
        </div>

        <div class="field">
            <label class="label">Número de DUI</label>
            <label class="label"><?=$usuario->dui?></label>
        </div>
    </form>
</section>
<?=$this->endSection()?>