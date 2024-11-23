<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class='container'>
    <div class='row'>
        <div class=col>
            <div class="card my-5">
                <div class="card-header">
                    <h2>Testing Upload</h2>
                </div>
                <div class="card-body">
                    <?php if (isset($errors) && !empty($errors)): ?>
                        <ul> <?php foreach ($errors as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    <?php endif ?>
                    <?= form_open_multipart(base_url('komik/upload')) ?>

                    <div class="form-group row">
                        <label for="userfile" class="col-sm-2 col-form-label">User File</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="file" class="form-control" name="userfile" id="userfile" size="20">
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