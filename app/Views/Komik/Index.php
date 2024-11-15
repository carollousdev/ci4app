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
                                <?php foreach ($value as $k => $val): ?>
                                    <?php if (in_array($k, $ColumnName)): ?>
                                        <td><?= $k == 'sampul' ? '<img src=' . base_url('assets/images/' . $val) . ' class="sampul">' : $val; ?></td>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <td><a href="komik/<?= $value['slug']; ?>" class="btn btn-sm btn-success">ORDER</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>