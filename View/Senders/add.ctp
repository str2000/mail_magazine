<div class="senders form">
<?php echo $this->Form->create('Sender'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Senders'), array('action' => 'index')); ?></li>
	</ul>
</div>
