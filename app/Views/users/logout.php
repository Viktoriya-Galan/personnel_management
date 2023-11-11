<?= $this->extend("index/default") ?>

<?= $this->section("title") ?>
<?= esc($title)?>
<?php $this->endSection()?>

<?= $this->section("content") ?>
<script>
    setTimeout(function () {
        window.location.href = '/';
    }, 2000)
</script>
<?php $this->endSection()?>
