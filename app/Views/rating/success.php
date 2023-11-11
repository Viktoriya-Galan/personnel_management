<h1>Оцінку додано</h1>
<button class="btn btn-primary"   > 
<a class="btn btn-success my-button" href="<?= site_url('rating') ?>">Назад</a>
<a class="btn btn-success my-button" href="<?= site_url('/') ?>">Головна</a>
<a class="btn btn-success my-button" href="<?= site_url('employees') ?>">Працівники</a>

  </button>

  <h2 class="alter alter-error">
   <?= session()->getFlashdata('error'); ?>
</h2>
<p class="alter alter-warning">
   <?=validation_list_errors(); ?>
</p>

