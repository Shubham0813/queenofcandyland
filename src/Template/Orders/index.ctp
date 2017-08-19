<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Order[]|\Cake\Collection\CollectionInterface $orders
  */
?>

<!-- Sidebar -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" style="z-index:3;width:250px;margin-top:76px;" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>
  <h4 class="w3-bar-item"><b><?= __('Actions') ?></b></h4>
  <?= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'w3-bar-item w3-button w3-hover-black']) ?>
  <?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index'], ['class' => 'w3-bar-item w3-button w3-hover-black']) ?>
  <?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add'], ['class' => 'w3-bar-item w3-button w3-hover-black']) ?>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px">

  <div class="w3-row w3-padding-64">
    <div class="w3-col w3-container">
      <h1 class="w3-text-orange">Current Items</h1>
        <table class="w3-table-all w3-striped w3-card" cellpadding="0" cellspacing="0">
                <thead>
                    <tr class="w3-lime">
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('timestamp') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('tracking_link') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('tracking_phone_number') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $this->Number->format($order->id) ?></td>
                <td><?= h($order->timestamp) ?></td>
                <td><?= h($order->tracking_link) ?></td>
                <td><?= h($order->tracking_phone_number) ?></td>
                <td><?= h($order->created) ?></td>
                <td><?= h($order->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $order->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>
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

