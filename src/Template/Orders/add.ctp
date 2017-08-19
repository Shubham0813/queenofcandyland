<?php
/**
  * @var \App\View\AppView $this
  */
  use Cake\Datasource\ConnectionManager;

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orders form large-9 medium-8 columns content">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <legend class="legend"><?= __('Add Order') ?></legend>
        <?php
            echo $this->Form->control('timestamp', ['empty' => true]);
            echo $this->Form->control('tracking_link');
            echo $this->Form->control('tracking_phone_number');

            foreach ($items as $i) {
                echo $i;
                echo $this->Form->control('quantity', ['name' => 'q'.trim($i)]);
            }

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
