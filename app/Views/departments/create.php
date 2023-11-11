
<div class="container">
    <div>
<a class="btn btn-success my-button" href="<?= site_url('departments/index') ?>">Назад</a>
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



    <form method="post" class="mb-3 row" action="/departments/create">
   <?= csrf_field(); ?>

   <div class="form-group">
   <label for="department_name" class="control-label">Новий відділ</label>
      <input type="text" class="form-control" id="department_name" name="department_name" value="<?=set_value("department_name"); ?>"/>
   </div>



   <button type="submit" class="btn btn-success my-button" >Зберегти</button>
</form>
