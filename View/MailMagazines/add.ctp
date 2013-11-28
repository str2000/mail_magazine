<?php echo $this->Form->create('Content'); ?>
<?php echo $this->Form->error('subject'); ?>
<?php echo $this->Form->error('body'); ?>

	<div class="input-parts">
		<label for="subject">件名：</label><?php echo $this->Form->input('subject',array('label'=>false,'div'=>false,'error'=>false,'size'=>80)); ?>
	</div>
	
	<div class="input-parts">
		<label for="body">内容：</label><?php echo $this->Form->input('body',array('label'=>false,'div'=>false,'error'=>false,'cols'=>67,'rows'=>30)); ?>
	</div class="input-parts">
	
	<div class="input-parts">
		<?php echo $this->Form->hidden('mode',array('value'=>'complete')); ?>
		<?php echo $this->Form->submit('作成'); ?>
	</div>
	
<?php echo $this->Form->end(); ?>