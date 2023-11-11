<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 

<div class="container">
  <nav class="navbar navbar-dark bg-success">
    <div class="container-fluid" style="justify-content: left;">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>   
    </button>
    <a class="navbar-brand" href="/" style="margin: 0 10px ;">Головна</a>
    <a class="navbar-brand" href="<?= site_url('users/login') ?>">Вхід</a>
        <a class="navbar-brand" href="<?= site_url('users/registration') ?>">Реєстрація</a>
    <h1 style="margin-left: 420px;color: white; font-size: 32px">Додаток для обліку працівників</h1>

    <div class="collapse navbar-collapse" id="navbarToggleExternalContent">
      

      <?php if(isset($_COOKIE['role'])) :?>
        <?
        $role = $_COOKIE['role'];
        if($role === 'admin') :
        ?>
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="navbar-brand" href="<?= site_url('employees') ?>">Працівники</a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="<?= site_url('departments/index') ?>">Відділи</a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="<?= site_url('positions') ?>">Посади</a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="<?= site_url('rating') ?>">Оцінки</a>
          </li>
          <li class="nav-item">
          <a class="navbar-brand" href="<?= site_url('users/logout') ?>">Вийти</a>
          </li>
        </ul>
      <?endif?>
      <? else: ?>
        <p class="navbar-brand"> Увійдіть як адміністратор</p>

      <? endif; ?>
      </div>
    </div>
  </nav>

  <img src="https://img.freepik.com/premium-vector/hr-manager-teamwork-hr-department-hr-process_491047-302.jpg" alt="" width="100%" height="900px">
</div>
<!-- закриття навбару по второму кліку -->

</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
