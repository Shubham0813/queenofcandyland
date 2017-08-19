<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Item[]|\Cake\Collection\CollectionInterface $items
  */
?>

<!-- Sidebar -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" style="z-index:3;width:250px;margin-top:1em;" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>
  <h4 class="w3-bar-item"><b><?= __('Actions') ?></b></h4>
        <?= $this->Html->link(__('New Item'), ['action' => 'add'], ['class' => 'w3-bar-item w3-button w3-hover-black']) ?>
        <?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index'], ['class' => 'w3-bar-item w3-button w3-hover-black']) ?>
        <?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add'], ['class' => 'w3-bar-item w3-button w3-hover-black']) ?>
        <?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index'], ['class' => 'w3-bar-item w3-button w3-hover-black']) ?>
        <?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add'], ['class' => 'w3-bar-item w3-button w3-hover-black']) ?>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px">

  <div class="w3-row">
    <div class="w3-col w3-container">
      <h1 class="w3-text-orange">Current Items</h1>
        <table class="w3-table-all w3-striped w3-card" cellpadding="0" cellspacing="0">
                <thead>
                    <tr class="w3-lime">
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('quantity_on_hand') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('minimum_reorder_point') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('vendor_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('vendor_part_number') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('store_part_number') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                <td><?= $this->Number->format($item->id) ?></td>
                <td><?= h($item->name) ?></td>
                <td><?= $this->Number->format($item->quantity_on_hand) ?></td>
                <td><?= $this->Number->format($item->minimum_reorder_point) ?></td>
                <td><?= $item->has('vendor') ? $this->Html->link($item->vendor->name, ['controller' => 'Vendors', 'action' => 'view', $item->vendor->id]) : '' ?></td>
                <td><?= h($item->vendor_part_number) ?></td>
                <td><?= h($item->store_part_number) ?></td>
                <td><?= h($item->created) ?></td>
                <td><?= h($item->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $item->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>
  </div>


  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
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

  <footer id="myFooter">
    <div class="w3-container w3-theme-l2 w3-padding-32">
      
    </div>

    <div class="w3-container w3-theme-l1">
      <p>Designed and Developed by Amrit, Burak, Joel and Shubham</p>
    </div>
  </footer>

<!-- END MAIN -->
</div>

