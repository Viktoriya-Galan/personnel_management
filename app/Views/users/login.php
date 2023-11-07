<div class="container">
<h2 class="alert alert-danger">
    <?=session()->getFlashdata('error')?>
</h2>
<p class="allert allert-warning">
    <?=validation_list_errors()?>
</p>

<form action="/users/login" method="post">
<?=csrf_field()?>
<div class="mb-3">
    <label for="login" class="form-label">Логін</label>
        <input type="text" name="login" id="login" class="form-control" placeholder="login" value="<?=set_value('login')?>">
    </div>

    <div class="mb-3">
    <label for="password" class="form-label">Пароль</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="password" value="<?=set_value('password')?>">
    </div>

    <div class="btn-group">
        <input type="submit" value="Log in" class="btn btn-success">
        <a href="/" class="btn btn-secondary">Головна</a>
    </div>

    
</form>
</div>