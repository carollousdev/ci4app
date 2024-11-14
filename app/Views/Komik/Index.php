<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class='container'>
    <div class='row'>
        <div class=col>
            <div class="card-header">
                <h1><?= $title; ?></h1>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sampul</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($komik as $key => $value): ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <?php foreach ($value as $k => $val): ?>
                                    <td><?= $k == 'sampul' ? "<img src='{$val}' width=100>" : $val; ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>