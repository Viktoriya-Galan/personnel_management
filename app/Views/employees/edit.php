<div class="container">
    <div>
<a class="btn btn-success my-button" href="<?= site_url('employees') ?>">Назад</a>
<a class="btn btn-success my-button" href="<?= site_url('/') ?>">Головна</a>
    </div>
    <?php if (session()->has('error')) : ?>
        <h2 class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </h2>
    <?php endif; ?>
    <?php if (session()->has('errors')) : ?>
<p class="alert alert-warning" >
   <?= \Config\Services::validation()->listErrors(); ?>
</p>
    <?php endif; ?>


<form class="form_Edit_Employee" method="post" action="/employees/edit/<?= $employee['employee_id']; ?>">
   <?= csrf_field(); ?>

   <div class="form-group">
      <label for="last_name" class="control-label">Прізвище</label>
      <input type="text" class="form-control" id="last_name" name="last_name" value="<?=$employee["last_name"]; ?>"/>
   </div>
   <div class="form-group">
      <label for="first_name" class="control-label">Ім'я</label>
      <input type="text" class="form-control" id="first_name" name="first_name" value="<?=$employee["first_name"]; ?>"/>
   </div>
   <div class="form-group">
   <label for="middle_name" class="control-label">По батькові</label>
      <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?=$employee["middle_name"]; ?>"/>
   </div>
   <div class="form-group">
   <label for="date_of_birth" class="control-label">Дата народження</label>
      <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?=$employee["date_of_birth"]; ?>"/>
   </div>
   <div class="form-group">
      <label for="address" class="control-label">Адреса</label>
      <input type="text" class="form-control" id="address" name="address" value="<?=$employee["address"]; ?>"/>
   </div>
   <div class="form-group">
      <label for="phone" class="control-label">Телефон</label>
      <input type="number" class="form-control" id="phone" name="phone" value="<?=$employee["phone"]; ?>"/>
   </div>
   <div class="form-group">
      <label for="hire_date" class="control-label">Дата найму</label>
      <input type="date" class="form-control" id="hire_date" name="hire_date" value="<?=$employee["hire_date"]; ?>"/>
   </div>
   <div class="form-group">
      <label for="company" class="control-label">Підприємство</label>
      <input type="text" class="form-control" id="company" name="company" value="<?=$employee["company"]; ?>"/>
   </div>


   <div class="form-group">
    <label for="position_id" class="control-label">Посада</label>
    <select class="form-control" id="position_id" name="position_id">
        <option value="">Виберіть посаду</option>
        <?php foreach ($positions as $position): ?>
            <option selected value="<?= $position['position_id'] ?>"><?= $position['position_name'] ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <label for="employment_status_id" class="control-label">Статус зайнятості</label>
    <select class="form-control" id="employment_status_id" name="employment_status_id">
        <option value="">Виберіть статус зайнятості</option>
        <?php foreach ($employmentStatus as $status): ?>
            <option value="<?= $status['employment_status_id'] ?>"><?= $status['status'] ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <label for="department_id" class a="control-label">Відділ</label>
    <select class="form-control" id="department_id" name="department_id">
        <option value="">Виберіть відділ</option>
        <?php foreach ($departments as $department): ?>
            <option value="<?= $department['department_id'] ?>"><?= $department['department_name'] ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <label for="trade_object_id" class="control-label">Торговий об'єкт</label>
    <select class="form-control" id="trade_object_id" name="trade_object_id">
        <option value="">Виберіть торговий об'єкт</option>
        <?php foreach ($tradeObjects as $object): ?>
            <option value="<?= $object['trade_object_id'] ?>"><?= $object['object_name'] ?></option>
        <?php endforeach; ?>
   <div class="form-group">
        </select>
      <label for="notes" class="control-label">Коментар</label>
      <input type="text-area" size="100" class="form-control" id="notes" name="notes" value="<?=$employee["notes"]; ?>"/>
   </div>


   <button type="submit" class="btn btn-success">Зберегти</button>
</form>
</div>