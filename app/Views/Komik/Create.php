<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class='container'>
    <div class='row'>
        <div class=col>
            <div class="card my-5">
                <div class="card-header">
                    <h2>Tambah Komik</h2>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('komik/save'); ?>" class="needs-validation" method="POST" novalidate>
                        <div class="form-group row">
                            <label for="sampul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control <?= (session('validation') && isset(session('validation')['judul'])) ? "is-invalid" : "" ?>" name="judul" id="judul">
                                    <div class="invalid-feedback">
                                        <?= session('validation')['judul'] ?? "" ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sampul" class="col-sm-2 col-form-label">Penulis</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control <?= (session('validation') && isset(session('validation')['penulis'])) ? "is-invalid" : "" ?>" name="penulis" id="penulis" value="<?= old('penulis'); ?>">
                                    <div class="invalid-feedback">
                                        <?= session('validation')['penulis'] ?? "" ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sampul" class="col-sm-2 col-form-label">Penerbit</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control <?= (session('validation') && isset(session('validation')['penerbit'])) ? "is-invalid" : "" ?>" name="penerbit" id="penerbit" value="<?= old('penerbit'); ?>">
                                    <div class="invalid-feedback">
                                        <?= session('validation')['penerbit'] ?? "" ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="sampul" id="sampul" value="<?= old('sampul'); ?>">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Tambah data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>