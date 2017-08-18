<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candy Store</title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
</head>
<body class="home">

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
    </ul>
</nav>

<div class="row">
    <div class="columns large-12 text-center">
        <h3 class="more">Current Items</h3>

        <div class="items index large-12 medium-8 columns content">
            <table cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('vendor') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('quantity_on_hand') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('minimum_reorder_point') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= $this->Number->format($item->id) ?></td>
                        <td><?= h($item->name) ?></td>
                        
                        <?php 
                            foreach ($vendors as $vendor) {
                                if ($vendor->id == $item->vendor_id)
                                    echo "<td>$vendor->name</td>";
                            }
                        ?>                       
                        
                        <td><?= $this->Number->format($item->quantity_on_hand) ?></td>
                        <td><?= $this->Number->format($item->minimum_reorder_point) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </div>
        </div>

    </div>
    <hr/>
</div>



</body>
</html>
