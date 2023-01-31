<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rating $rating
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $cars
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Ratings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ratings form content">
            <?= $this->Form->create($rating) ?>
            <fieldset>
                <legend><?= __('Rate this car') ?></legend>
                <?php
                echo '
                <span class="ratestars">
                        <li class="star" value="1"><a><i class="fa-regular fa-star"></a></i></li>
                        <li class="star" value="2"><a><i class="fa-regular fa-star"></a></i></li>
                        <li class="star" value="3"><a><i class="fa-regular fa-star"></a></i></li>
                        <li class="star" value="4"><a><i class="fa-regular fa-star"></a></i></li>
                        <li class="star" value="5"><a><i class="fa-regular fa-star"></a></i></li>
                    </ol>
                </span>
                ';
                echo $this->Form->control('star', ['type' => 'hidden', 'value' => '5', 'id' => 'starinput']);
                echo $this->Form->control('review', ['type' => 'textarea', 'required' => false]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.star').click(function() {
            var stars = $(this).val()
            $(this).prevAll('li').css({
                "background-color": "yellow",
            });
            $(this).css({
                "background-color": "yellow",
            });
            $(this).nextAll('li').css({
                "background-color": "white",
            });
            $('#starinput').val(stars)
        })
    });
</script>