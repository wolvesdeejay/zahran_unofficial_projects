<h2><?= esc($Make) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="<?= site_url('Cars') ?>" method="post">
    <?= csrf_field() ?>

    <label for="Make">Make</label>
    <input type="input" name="Make" value="<?= set_value('Make') ?>">
    <br>
    <label for="Year">Text</label>
    <textarea name="Year" cols="45" rows="4"><?= set_value('Year') ?></textarea>
    <br>

    <input type="submit" name="submit" value="Create cars item">
</form>