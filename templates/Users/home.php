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
                    <?= $this->Html->link(__('Car Listing'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                </div>
            </div>
        </aside>
        <div class="column-responsive column-90">
            <div class="cars index content">
                <h3><?= __('Cars') ?></h3>
                <div class="col-6 float-left">
                    <form class="form-inline form-control">
                        <input class="form-control mr-sm-2" id="searchBox" type="search" placeholder="Search" aria-label="Search">
                    </form>
                </div>
                <div class="table-responsive">
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

<script>
    $(document).ready(function() {
        $('.page-link').click(function() {
            $(".page-item").removeClass("active");
            addclas = $(this).parent();
            addclas.addClass("active")
            var count = $(this).html();
            $.ajax({
                url: 'pagination_data.php',
                type: 'post',
                data: ({
                    'mypage': true,
                    'count': count
                }),
                success: function(response) {
                    $('.rahul').html('');
                    $('.rahul').append(response);
                }
            });
        });
    });

    function performSearch() {

        // Declare search string 
        var filter = searchBox.value.toUpperCase();

        // Loop through first tbody's rows
        for (var rowI = 0; rowI < trs.length; rowI++) {

            // define the row's cells
            var tds = trs[rowI].getElementsByTagName("td");

            // hide the row
            trs[rowI].style.display = "none";

            // loop through row cells
            for (var cellI = 0; cellI < tds.length; cellI++) {

                // if there's a match
                if (tds[cellI].innerHTML.toUpperCase().indexOf(filter) > -1) {

                    // show the row
                    trs[rowI].style.display = "";

                    // skip to the next row
                    continue;

                }
            }
        }

    }

    // declare elements
    const searchBox = document.getElementById('searchBox');
    const table = document.getElementById("myTable");
    const trs = table.tBodies[0].getElementsByTagName("tr");

    // add event listener to search box
    searchBox.addEventListener('keyup', performSearch);
</script>