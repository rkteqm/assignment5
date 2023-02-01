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
                <?= $this->Html->link(__('Login'), ['action' => 'login'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column-responsive column-80">
            <div class="users form content">
                <?= $this->Form->create($user, ['action' => 'javascript:void(0)', 'id' => 'regform']) ?>
                <fieldset>
                    <legend><?= __('Add User') ?></legend>
                    <?php
                    echo $this->Form->control('name', ['required' => 'false']);
                    echo $this->Form->control('email', ['required' => 'false']);
                    echo $this->Form->control('password', ['required' => 'false']);
                    echo $this->Form->control('confirm_password', ['required' => 'false', 'type' => 'password']);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>