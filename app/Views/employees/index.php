<link rel="stylesheet" type="text/css" href="<?=site_url('css\styles.css') ?>">
<div class="col">
   
 
<a class="btn btn-success" style="width: 160px" href="<?= site_url('employees/create/') ?>">
  Новий працівник</a>
 <a class="btn btn-success" style="width: 150px"  href="<?= site_url('/') ?>">
  Головна</a>
 <a class="btn btn-success" style="width: 150px" href="<?= site_url('departments/index') ?>">
  відділи</a>
   <a class="btn btn-success"style="width: 150px" href="<?= site_url('positions') ?>">
  посади</a>
 <a class="btn btn-success" style="width: 150px" href="<?= site_url('rating') ?>">
  оцінки</a> 
  <a class="btn btn-success" style="width: 150px" href="<?= site_url('tradeObjects') ?>">
  торгові обєкти</a> 

<!-- Фыльтрація--------------------------------------------------------- -->
  <div class="col">
   <form method="get" action="<?= site_url('employees') ?>">
      <div class="mb-3">
         <label for="employmentStatusFilter" class="form-label">Обрати статус зайнятості:</label>
         <select class="form-select" id="employmentStatusFilter" name="status_id">
            <option value="" selected>Усі статуси</option>
            <?php foreach ($employmentStatus as $status): ?>
               <option value="<?= esc($status['employment_status_id']) ?>" <?= esc($_GET['status_id'] ?? '') === $status['employment_status_id'] ? 'selected' : '' ?>>
                  <?= esc($status['status']) ?>
               </option>
            <?php endforeach; ?>
         </select>
      </div>
      <button type="submit" class="btn btn-success">Фільтрувати</button>
   </form>

<!-- Табличка----------------------------------------------------- -->
   <?php if (!empty($employees) && is_array($employees)): ?>
      <table class="table table-success table-striped">
         <thead>
            <tr class="tr-table-success">
               <th>ID співробітника</th>
               <th>Прізвище</th>
               <th>Ім'я</th>
               <th>По батькові</th>
               <th>Дата народження</th>
               <th>Адреса</th>
               <th>Телефон</th>
               <th>Дата найму</th>
               <th>Підприємство</th>
               <th>Посада</th>
               <th>Статус зайнятості</th>
               <th>Відділ</th>
               <th>Торговий об`єкт</th>
               <th>Середня оцінка</th>
               <th>Коментар</th>
               <th>Додатково</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($employees as $employee): ?>
               <tr>
                  <td><?= esc($employee['employee_id']) ?></td>
                  <td><?= esc($employee['last_name']) ?></td>
                  <td><?= esc($employee['first_name']) ?></td>
                  <td><?= esc($employee['middle_name']) ?></td>
                  <td><?= esc($employee['date_of_birth']) ?></td>
                  <td><?= esc($employee['address']) ?></td>
                  <td><?= esc($employee['phone']) ?></td>
                  <td><?= esc($employee['hire_date']) ?></td>
                  <td><?= esc($employee['company']) ?></td>

                  
  <!-- //////////////////////////////////////////////////////////////////// -->
                  <!-- посада працівника --> 
    
                  <td> 
                     <?php
                      $positionName = "";// Ініціалізуємо змінну для зберігання назви посади
                      foreach ($positions as $position) {// Перебираємо масив посад
                          if ($position['position_id'] == $employee['position_id']) {// Перевіряємо, чи поточна посада відповідає посаді працівника
                              $positionName = $position['position_name'];// Зберігаємо назву посади як вона називається в табличці у  оголошену змінну
                            break;// Вихід із циклу
                         }
                    }
                    echo $positionName;// Виводимо назву посади на екран
                    ?>
                  </td>
    <!-- //////////////////////////////////////////////////////////////////// -->
                  <!-- статус зайнятості працівника --> 
                  <td>
                  <?php
                      $statusName = "";
                      foreach ($employmentStatus as $status) {
                          if ($status['employment_status_id'] == $employee['employment_status_id']) {
                           $statusName = $status['status'];
                            break;
                         }
                    }
                    echo $statusName;
                    ?>   
               </td> 
 <!-- //////////////////////////////////////////////////////////////////// -->
                  <!-- відділ працівника --> 
                  <td>
                  <?php
                      $departmentName = "";
                      foreach ($departments as $department) {
                          if ($department['department_id'] == $employee['department_id']) {
                           $departmentName  = $department['department_name'];
                            break;
                         }
                    }
                    echo $departmentName;
                    ?> 
               </td>

 <!-- //////////////////////////////////////////////////////////////////// -->
                  <!-- ТТ працівника --> 
                  <td>
                  
                  <?php
                      $tradeObjectsName = "";
                      foreach ($tradeObjects as $objects) {
                          if ($objects['trade_object_id'] == $employee['trade_object_id']) {
                           $tradeObjectsName  = $objects['object_name'];
                            break;
                         }
                    }
                    echo $tradeObjectsName;
                    ?> 
               </td>
                   
 <!-- //////////////////////////////////////////////////////////////////// -->
                  <!-- Середній рейтинг співробітника -->
                  <!-- number_format обрізає до 2 (чи скільки поставиш) знаки після ком-->
                  <td>
                  <?php
                   if (isset($employeeRatings[$employee['employee_id']])) {
                       echo number_format($employeeRatings[$employee['employee_id']], 2);
                   } else {
                       echo 'Немає оцінок';
                   }
                   ?>
                  </td>
<!-- //////////////////////////////////////////////////////////////////// -->

                  <td><?= esc($employee['notes']) ?></td>
               
                  <td> 


                     <a class="btn btn-success" href="<?= site_url('employees/edit/' . $employee['employee_id']) ?>">
                     Редагувати</a>
                  </td>

               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
   <?php else: ?>
      <h2>Співробітники не знайдені</h2>
   <?php endif; ?>
</div>
</div>