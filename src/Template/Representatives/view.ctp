<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Representative $representative
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Representative'), ['action' => 'edit', $representative->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Representative'), ['action' => 'delete', $representative->id], ['confirm' => __('Are you sure you want to delete # {0}?', $representative->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Representatives'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Representative'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="representatives view large-9 medium-8 columns content">
    <h3><?= h($representative->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($representative->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($representative->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact') ?></th>
            <td><?= h($representative->contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($representative->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($representative->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($representative->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Vendors') ?></h4>
        <?php if (!empty($representative->vendors)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Address Id') ?></th>
                <th scope="col"><?= __('Representative Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($representative->vendors as $vendors): ?>
            <tr>
                <td><?= h($vendors->id) ?></td>
                <td><?= h($vendors->name) ?></td>
                <td><?= h($vendors->address_id) ?></td>
                <td><?= h($vendors->representative_id) ?></td>
                <td><?= h($vendors->created) ?></td>
                <td><?= h($vendors->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Vendors', 'action' => 'view', $vendors->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Vendors', 'action' => 'edit', $vendors->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vendors', 'action' => 'delete', $vendors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendors->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
