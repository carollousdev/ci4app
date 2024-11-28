<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<div class='container'>
    <div class='row'>
        <div class=col>
            <div class="card">
                <div class="card-header">
                    <h2>Contact Person</h2>
                    <form action="" method="post">
                        <div class="input-group">
                            <input name="keyword" type="text" class="form-control" placeholder="Search person" aria-label="Search person">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($persons as $value): ?>
                                <tr>
                                    <td><?= $value['id'] ?></td>
                                    <td><?= $value['name'] ?></td>
                                    <td><?= $value['alamat'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?= $pager->links('person', 'my_pagination') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>