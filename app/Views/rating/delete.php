<div class="container">

<h2>Підтвердіть видалення оцінки</h2>

<table class="table table-striped">
<tbody>
   <tr>
         <th>Працівник</th>
         <td><?= $rating['employee_id'] ?></td>
   </tr>
   <tr>
         <th>Оцінка</th>
         <td><?= $rating['rating'] ?></td>
    </tr>
    <tr>
         <th>Дата оцінки</th>
         <td><?= $rating['rating_date'] ?></td>
    </tr>        
      
   </tbody>

</div>

<div class="btn-group">
<form action="/rating/delete/<?= esc($rating['rating_id']) ?>" method="post">
    <?= csrf_field() ?>
    <input type="submit" value="Видалити оцінку" class="btn btn-danger">
</form>
</div>




</div>