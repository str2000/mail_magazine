<div class="senders view">
<h2><?php echo __('Sender'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sender['Sender']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($sender['Sender']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($sender['Sender']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($sender['Sender']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($sender['Sender']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Delete'); ?></dt>
		<dd>
			<?php echo h($sender['Sender']['delete']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sender'), array('action' => 'edit', $sender['Sender']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sender'), array('action' => 'delete', $sender['Sender']['id']), null, __('Are you sure you want to delete # %s?', $sender['Sender']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Senders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sender'), array('action' => 'add')); ?> </li>
	</ul>
</div>
