<div class="users form login-container">
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend class="legend"><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->control('username') ?>
        <?= $this->Form->control('password') ?>
    	<?= $this->Form->button(__('Login')); ?>
    </fieldset>
<?= $this->Form->end() ?>
</div>