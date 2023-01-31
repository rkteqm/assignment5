<td>
    <?php if ($car->active == 1) : ?>
        <?= $this->Form->postLink(__('Inactive'), ['action' => 'userStatus', $car->id, $car->active], ['confirm' => __('Are you sure you want to Inactive # {0}?', $car->id)]) ?>
    <?php else : ?>
        <?= $this->Form->postLink(__('Active'), ['action' => 'userStatus', $car->id, $car->active], ['confirm' => __('Are you sure you want to active # {0}?', $car->id)]) ?>
    <?php endif; ?>
</td>