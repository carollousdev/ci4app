<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<!-- <div class='container'>
    <div class='row'>
        <div class=col>
            <div class="card">
                <div class="card-header">
                    <h2>Contact Person</h2>
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
                                    <td><?= $i++ ?></td>
                                    <td><?= $value['name'] ?></td>
                                    <td><?= $value['alamat'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?= $pager->links() ?>
            </div>
        </div>
    </div>
</div> -->
<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(0);
?>
<nav>
    <ul class="pager">
        <li <?= $pager->hasPrevious() ? '' : 'class="disabled"' ?>>
            <a href="<?= $pager->getPrevious() ?? '#' ?>" aria-label="<?= lang('Pager.previous') ?>">
                <span aria-hidden="true"><?= lang('Pager.newer') ?></span>
            </a>
        </li>
        <li <?= $pager->hasNext() ? '' : 'class="disabled"' ?>>
            <a href="<?= $pager->getNext() ?? '#' ?>" aria-label="<?= lang('Pager.next') ?>">
                <span aria-hidden="true"><?= lang('Pager.older') ?></span>
            </a>
        </li>
    </ul>
</nav>


<?= $this->endSection(); ?>