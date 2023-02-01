<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>

<div class="container-fluid">
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <div class="container">
                    <h4 class="heading"><?= __('Actions') ?></h4>
                    <?= $this->Html->link(__('Car Listing'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                </div>
            </div>
        </aside>
        <div class="column-responsive column-90">
            <div class="cars index content">
                <?= $this->Flash->render() ?>
                <?= $this->Html->link(__('Add'), ['action' => 'register'], ['class' => 'button float-right']) ?>
                <h3><?= __('Users') ?></h3>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('Sr No') ?></th>
                                <th><?= $this->Paginator->sort('name') ?></th>
                                <th><?= $this->Paginator->sort('email') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($users as $user) : ?>
                                <tr>
                                    <td><?= $i //$this->Number->format($car->id) 
                                        ?></td>
                                    <td><?= h($user->name) ?></td>
                                    <td><?= h($user->email) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['action' => 'userview', $user->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'useredit', $user->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'userdelete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                                    </td>
                                </tr>
                            <?php
                                $i++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                    </ul>
                    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>