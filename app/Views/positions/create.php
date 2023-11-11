
<div class="container">
    <div>
<a class="btn btn-success my-button" href="<?= site_url('positions') ?>">Назад</a>
<a class="btn btn-success my-button" href="<?= site_url('/') ?>">Головна</a>
<a class="btn btn-success my-button" href="<?= site_url('employees') ?>">Працівники</a>
    </div>
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

    <form method="post" class="mb-3 row" action="/positions/create">
   <?= csrf_field(); ?>

   <div class="form-group">
   <label for="position_name" class="control-label">Нова посада</label>
      <input type="text" class="form-control" id="position_name" name="position_name" value="<?=set_value("position_name"); ?>"/>
   </div>


   <div class="form-group">
   <label for="position_description" class="control-label">опис посади</label>
      <input type="text" class="form-control" id="position_description" name="position_description" value="<?=set_value("position_description"); ?>"/>
   </div>


   <button type="submit" class="btn btn-success my-button">Зберегти</button>
</form>

