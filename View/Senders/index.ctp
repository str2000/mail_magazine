<div class="senders index">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($senders as $sender): ?>
	<tr>
		<td><?php echo h($sender['Sender']['id']); ?>&nbsp;</td>
		<td><?php echo h($sender['Sender']['name']); ?>&nbsp;</td>
		<td><?php echo h($sender['Sender']['email']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sender['Sender']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sender['Sender']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sender['Sender']['id']), null, __('Are you sure you want to delete # %s?', $sender['Sender']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Sender'), array('action' => 'add')); ?></li>
	</ul>
</div>
