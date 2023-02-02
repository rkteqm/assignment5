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
            <?= $this->Flash->render() ?>
            <div class="users form content">
                <?= $this->Form->create($user, ['id' => 'regform']) ?>
                <fieldset>
                    <legend><?= __('Edit User') ?></legend>
                    <?php
                    echo $this->Form->control('name', ['required' => false]);
                    echo $this->Form->control('email', ['required' => false]);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>