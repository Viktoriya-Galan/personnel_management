<div class="container">
<?php if (session()->has('error')) : ?>
        <h2 class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </h2>
    <?php endif; ?>

    <?php if (session()->has('errors')) : ?>
        <p class="alert alert-warning">
            <?= validation_list_errors(); ?>
        </p>
    <?php endif; ?>
    <a class="btn btn-success my-button" href="<?= site_url('rating') ?>">Назад</a>
<a class="btn btn-success my-button" href="<?= site_url('/') ?>">Головна</a>


<form action="/users/registration" method="post">
<?=csrf_field()?>
<div class="mb-3">
    <label for="login" class="form-label">login</label>
        <input type="text" name="login" id="login" class="form-control" placeholder="login" value="<?=set_value('login')?>">
    </div>

    <div class="mb-3">
    <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="password" value="<?=set_value('password')?>">
    </div>

    <div class="mb-3">
    <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="email" value="<?=set_value('email')?>">
    </div>

    <div class="btn-group">

        <input type="submit" value="Registrstion" class="btn btn-success">
        <a href="/" class="btn btn-secondary">Головна</a>
    </div>

</form>
</div>