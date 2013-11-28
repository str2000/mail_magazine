<div class="senders form">
<?php echo $this->Form->create('Sender'); ?>
	<fieldset>
		<legend><?php echo __('Edit Sender'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
