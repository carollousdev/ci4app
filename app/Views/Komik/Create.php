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
                    <?= form_open_multipart(base_url('komik/save')) ?>
                    <div class="form-group row">
                        <label for="sampul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control <?= (!empty(session('validation')['judul'])) ? 'is-invalid' : '' ?>" name="judul" id="judul" value="<?= old('judul'); ?>" autofocus>
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
                                <input type="text" class="form-control <?= (!empty(session('validation')['penulis'])) ? 'is-invalid' : '' ?>" name="penulis" id="penulis" value="<?= old('penulis'); ?>">
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
                                <input type="text" class="form-control <?= (!empty(session('validation')['penerbit'])) ? 'is-invalid' : '' ?>" name="penerbit" id="penerbit" value="<?= old('penerbit'); ?>">
                                <div class="invalid-feedback">
                                    <?= session('validation')['penerbit'] ?? "" ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                        <div class="col-sm-2">
                            <img src="<?= base_url('uploads/images/default.jpg') ?>" class="img-thumbnail img-preview" alt="">
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="file" class="form-control <?= (!empty(session('validation')['sampul'])) ? 'is-invalid' : '' ?>" name="sampul" id="sampul" size="20" value="<?= old('sampul'); ?>" onchange="previewImg()">
                                <div class="invalid-feedback">
                                    <?= session('validation')['sampul'] ?? "" ?>
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