<table id="myTable">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Sr No') ?></th>
            <th><?= $this->Paginator->sort('company') ?></th>
            <th><?= $this->Paginator->sort('brand') ?></th>
            <th><?= $this->Paginator->sort('model') ?></th>
            <th><?= $this->Paginator->sort('make') ?></th>
            <th><?= $this->Paginator->sort('color') ?></th>
            <th><?= $this->Paginator->sort('description') ?></th>
            <th><?= $this->Paginator->sort('image') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($cars as $car) : ?>
            <tr>
                <td><?= $i //$this->Number->format($car->id) 
                    ?></td>
                <td><?= h($car->company) ?></td>
                <td><?= h($car->brand) ?></td>
                <td><?= h($car->model) ?></td>
                <td><?= h($car->make) ?></td>
                <td><?= h($car->color) ?></td>
                <td><?= h($car->description) ?></td>
                <td><?= $this->Html->image(h($car->image), array('width' => '70px')) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $car->id]) ?>
                </td>
            </tr>
        <?php
            $i++;
        endforeach; ?>
    </tbody>
</table>







<?php if ($overallstar != 0) { ?>
    <tr>
        <th><?= __('Overall Rating') ?></th>
        <td>
            <span class="ratestars">
                <?php
                for ($i = 0; $i < $overallstar; $i++) {
                    echo '<li class="star fa-solid fa-star" value="1"></li>';
                }
                for ($j = $i; $j < 5; $j++) {
                    echo '<li class="star fa-regular fa-star" value="1"></li>';
                }
                ?>
            </span>
        </td>
    </tr>
<?php } ?>




<td class='fa-sharp fa-solid fa-eye'><?= $this->Html->link(__(''), ['action' => 'view', $car->id]) ?></td>