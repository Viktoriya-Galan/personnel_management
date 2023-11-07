<div class="container">
    <h2 class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </h2>
    <p class="alert alert-warning">
        <?= validation_list_errors(); ?>
    </p>


    <form method="post" action="/positions/create">
   <?= csrf_field(); ?>

   <div class="form-group">
   <label for="position_name" class="control-label">Нова посада</label>
      <input type="text" class="form-control" id="position_name" name="position_name" value="<?=set_value("position_name"); ?>"/>
   </div>


   <div class="form-group">
   <label for="position_description" class="control-label">опис посади</label>
      <input type="text" class="form-control" id="position_description" name="position_description" value="<?=set_value("position_description"); ?>"/>
   </div>


   <button type="submit" class="btn btn-success">Зберегти</button>
</form>
<a href="<?= site_url('employees') ?>">Головна сторінка</a>