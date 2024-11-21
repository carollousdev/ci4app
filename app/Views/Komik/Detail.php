<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class='container'>
    <div class='row'>
        <div class=col>
            <h2 class="mt-2">Detail Komik</h2>
            <div class="card mt-3 mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/images/' . $komik['sampul']); ?>" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $komik['judul']; ?></h5>
                            <p class="card-text"><strong>Penulis: </strong><?= $komik['penulis']; ?></p>
                            <p class="card-text"><small class="text-muted"><strong>Penerbit: </strong><?= $komik['penerbit']; ?></small></p>

                            <a href="" class="btn btn-sm btn-warning">Edit</a>
                            <form action="<?= base_url('komik/' . $komik['id']) ?>" class="d-inline" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-sm btn-danger" type="submit">delete</button>
                            </form>
                            <br><br>
                            <a href="<?= base_url('/komik'); ?>">Kembali ke daftar komik</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>