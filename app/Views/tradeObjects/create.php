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
    <div>
<a class="btn btn-success my-button" href="<?= site_url('rating') ?>">Назад</a>
<a class="btn btn-success my-button" href="<?= site_url('/') ?>">Головна</a>
<a class="btn btn-success my-button" href="<?= site_url('employees') ?>">Працівники</a>
</div>
    <form class="row g-3" method="post" action="/tradeObjects/create">
   <?= csrf_field(); ?>

   <div class="form-group">
   <label for="object_name" class="control-label">Назва торгового обєкту</label>
      <input type="text" class="form-control" id="object_name" name="object_name" value="<?=set_value("object_name"); ?>"/>
   </div>


   <div class="form-group">
   <label for="address" class="control-label">Адреса</label>
      <input type="text" class="form-control" id="address" name="address" value="<?=set_value("address"); ?>"/>
   </div>


   <button type="submit" class="btn btn-success my-button" >Зберегти</button>
</form>
</div>