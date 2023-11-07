

<div class="container">
    <h2 class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </h2>
    <p class="alert alert-warning">
        <?= validation_list_errors(); ?>
    </p>


    <form method="post" action="/rating/create">
   <?= csrf_field(); ?>
   <div class="form-group">
      <label for="employee_id" class="control-label">Працівник</label>
      <input type="text" class="form-control" id="employee_search" placeholder="Пошук працівника" />
      <select class="form-control" id="employee_id" name="employee_id" value="<?=set_value("employee_id"); ?>">
  <option value="">Виберіть працівника</option>
  <?php foreach ($employees as $employee):?>
   <option value="<?= $employee['employee_id'] ?>"><?= $employee['first_name'].''.$employee['last_name'].''.$employee['middle_name'] ?></option>
<?php endforeach; ?>
  </select>
   </div>
  
   <div class="form-group">
   <label for="rating_date" class="control-label">Дата оцінки</label>
      <input type="date" class="form-control" id="rating_date" name="rating_date" value="<?=set_value("rating_date"); ?>"/>
   </div>
   <div class="form-group">
      <label for="rating" class="control-label">Оцінка</label>
      <input type="number" class="form-control" id="rating" name="rating" value="<?=set_value("rating"); ?>"/>
   </div>
   


   <button type="submit" class="btn btn-success">Зберегти</button>
</form>
<a href="<?= site_url('employees') ?>">Головна сторінка</a>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('#employee_id').on('input', function () {
            var selectedName = $('#employee_id :selected').text();
            $('#employee_search').val(selectedName);
        });

        $('#employee_search').on('input', function () {
            var searchValue = $(this).val().toLowerCase();

            $('#employee_id option').each(function () {
                var optionText = $(this).text().toLowerCase();
                if (optionText.indexOf(searchValue) !== -1) {
                    $(this).prop('selected', true);
                    return false;
                }
            });
        });
    });
</script>