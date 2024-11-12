<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<div class='container'>
    <div class='row'>
        <div class=col>
            <h1>Contacts</h1>
            <p>More informations:</p>

            <?php foreach ($this->data['alamat'] as $key => $val): ?>
                <ul>Alamat <?= $key + 1; ?></ul>
                <?php foreach ($val as $v => $x): ?>
                    <li><?= ucfirst($v) . ' : ' . $x; ?></li>
                <?php endforeach; ?>
                <br />
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>