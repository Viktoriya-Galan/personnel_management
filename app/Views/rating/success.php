<h1>Оцінку додано</h1>
<button class="btn btn-primary"   > 
<a href="<?= site_url('employees') ?>">Головна сторінка</a>

  </button>

  <h2 class="alter alter-error">
   <?= session()->getFlashdata('error'); ?>
</h2>
<p class="alter alter-warning">
   <?=validation_list_errors(); ?>
</p>

