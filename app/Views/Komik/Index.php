<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class='container'>
    <div class='row'>
        <div class="col-12">
            <?php if (session()->getFlashdata('pesan')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        </div>
        <div class=col>
            <a href="<?= base_url('komik/create'); ?>" class="btn btn-sm btn-outline-primary mt-3 mb-3">Tambah komik</a>
            <div class="card mb-5">
                <div class="card-header">
                    <h2>Daftar Komik</h2>
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
                                            <td><?= $k == 'sampul' ? '<img src=' . base_url('uploads/images/' . $val) . ' class="sampul">' : $val; ?></td>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <td>
                                        <a href="komik/<?= $value['slug']; ?>" class="btn btn-sm btn-success">INFO</a>
                                        <a href="#" class="btn btn-sm btn-warning">PRINT</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>