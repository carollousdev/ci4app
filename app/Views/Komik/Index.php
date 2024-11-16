<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class='container'>
    <div class='row'>
        <div class="col-12">
            <?php if (session()->getFlashdata('pesan')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class=col>
            <a href="<?= base_url('komik/create'); ?>" class="btn btn-sm btn-primary">Tambah komik</a>
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