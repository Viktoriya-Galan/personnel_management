<div class="container">
    <h2 class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </h2>
    <p class="alert alert-warning">
        <?= validation_list_errors(); ?>
    </p>


    <form method="post" action="/tradeObjects/create">
   <?= csrf_field(); ?>

   <div class="form-group">
   <label for="object_name" class="control-label">Назва торгового обєкту</label>
      <input type="text" class="form-control" id="object_name" name="object_name" value="<?=set_value("object_name"); ?>"/>
   </div>


   <div class="form-group">
   <label for="address" class="control-label">Адреса</label>
      <input type="text" class="form-control" id="address" name="address" value="<?=set_value("address"); ?>"/>
   </div>


   <button type="submit" class="btn btn-success">Зберегти</button>
</form>
<a href="<?= site_url('employees') ?>">Головна сторінка</a>