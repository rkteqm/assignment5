<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container">
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Html->link(__('Register'), ['action' => 'register'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column-responsive column-80">
            <?= $this->Flash->render() ?>
            <div class="users form content">
                <?= $this->Form->create() ?>
                <fieldset>
                    <legend><?= __('Login User') ?></legend>
                    <?php
                    echo $this->Form->control('email', ['required' => false]);
                    echo $this->Form->control('password', ['required' => false]);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Login')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>