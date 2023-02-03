<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Car $car
 */

use Cake\I18n\Number;

?>
<div class="container-fluid">
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <div class="container">
                    <h4 class="heading"><?= __('Actions') ?></h4>
                    <?php if ($role == 0) { ?>
                        <?= $this->Html->link(__('Edit Car'), ['action' => 'edit', $car->id], ['class' => 'side-nav-item']) ?>
                        <?= $this->Form->postLink(__('Delete Car'), ['action' => 'delete', $car->id], ['confirm' => __('Are you sure you want to delete # {0}?', $car->id), 'class' => 'side-nav-item']) ?>
                        <?= $this->Html->link(__('List Cars'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                        <?= $this->Html->link(__('New Car'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
                    <?php } else { ?>
                        <?= $this->Html->link(__('List Cars'), ['action' => 'home'], ['class' => 'side-nav-item']) ?>
                    <?php } ?>
                </div>
            </div>
        </aside>
        <div class="column-responsive column-90">
            <div class="cars view content">
                <table>
                    <tr>
                        <th><?= __('Image') ?></th>
                        <td><?= $this->Html->image(h($car->image), array('width' => '300px')) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Company') ?></th>
                        <td><?= h($car->company) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Brand') ?></th>
                        <td><?= h($car->brand) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Model') ?></th>
                        <td><?= h($car->model) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Make') ?></th>
                        <td><?= h($car->make) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Color') ?></th>
                        <td><?= h($car->color) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Description') ?></th>
                        <td><?= h($car->description) ?></td>
                    </tr>
                    <?php if ($overallstar != 0) { ?>
                        <tr>
                            <th><?= __('Overall Rating') ?></th>
                            <td>
                                <span class="ratestars">
                                    <?php
                                    echo '<p>' . number_format($overallstar, 1) . '/5 star</p>';
                                    for ($i = 1; $i <= $overallstar; $i++) {
                                        echo '<li class="fa-solid fa-star" value="1"></li>';
                                    }
                                    if ($overallstar > $i - 1 && $overallstar < 5) {
                                        echo '<li class="fa-solid fa-star-half-stroke"></li>';
                                        $i++;
                                    }
                                    for ($j = $i; $j < 6; $j++) {
                                        echo '<li class="fa-regular fa-star" value="1"></li>';
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Reviews') ?></th>
                            <td><?= h($count) ?> reviews</td>
                        </tr>
                    <?php } ?>
                </table>
                <div class="related">
                    <?php
                    if ($role == 1) {
                        if ($auth == true) { ?>
                            <div id="commenthide">
                                <a href="">
                                    <legend><?= __('Rate this car') ?> <i class="fa-solid fa-arrow-right"></i></legend>
                                </a>
                            </div>
                        <?php } else { ?>
                            <legend><?= $this->Html->link(__('Rate this car'), ['action' => 'redirectLogin']) ?><i class="fa-solid fa-arrow-right"></i></legend>
                    <?php }
                    }
                    ?>
                    <div id="commentshow" class="ratings form content">
                        <?= $this->Form->create($rating, ['id' => 'rateform']) ?>
                        <fieldset>
                            <legend><a href="" id="hideme">Back</a></legend>
                            <legend><?= __('Rate this car') ?></legend>
                            <span class="ratestars">
                                <li class="star fa-solid fa-star" value="1"></li>
                                <li class="star fa-regular fa-star" value="2"></li>
                                <li class="star fa-regular fa-star" value="3"></li>
                                <li class="star fa-regular fa-star" value="4"></li>
                                <li class="star fa-regular fa-star" value="5"></li>
                            </span>
                            <?php
                            echo $this->Form->control('star', ['type' => 'hidden', 'value' => '1', 'id' => 'starinput']);
                            echo $this->Form->control('review', ['type' => 'textarea', 'required' => false]);
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Submit')) ?>
                        <?= $this->Form->end() ?>
                    </div>
                    <?php
                    $sum = 0;
                    $count = 0;
                    if (!empty($car->ratings)) : ?>
                        <h4><?= __('Related Ratings') ?></h4>
                        <div class="table-responsive">
                            <table>
                                <tr>
                                    <th><?= __('Star') ?></th>
                                    <th><?= __('Review') ?></th>
                                    <th><?= __('Name') ?></th>
                                    <th><?= __('Time') ?></th>
                                </tr>
                                <?php foreach ($ratings as $ratings) : ?>
                                    <tr>
                                        <td>
                                            <span class="ratestars">
                                                <?php
                                                for ($i = 0; $i < $ratings->star; $i++) {
                                                    echo '<li class="fa-solid fa-star" value="1"></li>';
                                                }
                                                for ($j = $i; $j < 5; $j++) {
                                                    echo '<li class="fa-regular fa-star" value="1"></li>';
                                                }
                                                ?>
                                            </span>
                                        </td>
                                        <td><?= h($ratings->review) ?></td>
                                        <td><?= h($ratings->user_name) ?></td>
                                        <td><?= h($ratings->time) ?></td>
                                    </tr>
                                    <?php

                                    $count++;
                                    $sum += $ratings->star;
                                    ?>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        <?php $overallstar = $sum / $count; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#commenthide').click(function(e) {
            e.preventDefault();
            $(this).hide();
            $('#commentshow').show();
        });
        $('#hideme').click(function(e) {
            e.preventDefault();
            $('#commentshow').hide();
            $('#commenthide').show();
        });

        $('.star').click(function() {
            var stars = $(this).val()

            $(this).prevAll('li').removeClass('fa-regular');
            $(this).prevAll('li').addClass('fa-solid');
            $(this).removeClass('fa-regular');
            $(this).addClass('fa-solid');
            $(this).nextAll('li').removeClass('fa-solid');
            $(this).nextAll('li').addClass('fa-regular');

            $('#starinput').val(stars)
        })
    });
</script>