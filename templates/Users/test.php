<div class="column-responsive column-80">
    <div class="users form content">
        <?= $this->Form->create($user) ?>
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