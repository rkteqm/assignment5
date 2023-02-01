<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Car> $cars
 */
?>

<div class="container-fluid">
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <div class="container">
                    <h4 class="heading"><?= __('Actions') ?></h4>
                    <?= $this->Html->link(__('User Listing'), ['action' => 'userindex'], ['class' => 'side-nav-item']) ?>
                </div>
            </div>
        </aside>
        <div class="column-responsive column-90">
            <div class="users view content">
                <h3><?= __('User View') ?></h3>
                <table>
                    <tr>
                        <th><?= __('Name') ?></th>
                        <td><?= h($user->name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Email') ?></th>
                        <td><?= h($user->email) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created At') ?></th>
                        <td><?= h($user->created_at) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>