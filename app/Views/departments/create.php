<div class="container">
    <h2 class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </h2>
    <p class="alert alert-warning">
        <?= validation_list_errors(); ?>
    </p>


    <form method="post" action="/departments/create">
   <?= csrf_field(); ?>

   <div class="form-group">
   <label for="department_name" class="control-label">новий відділ</label>
      <input type="text" class="form-control" id="department_name" name="department_name" value="<?=set_value("department_name"); ?>"/>
   </div>



   <button type="submit" class="btn btn-success">Зберегти</button>
</form>
<a href="<?= site_url('employees') ?>">Головна сторінка</a>