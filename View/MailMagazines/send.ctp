<?php echo $form->create('Content',array('url'=>array('controller'=>'mail_magazine','action'=>'add'))); ?>
<?php echo $form->error('subject'); ?>
<?php echo $form->error('body'); ?>

	<div class="input-parts">
		<label for="subject">件名：</label><?php echo $form->input('subject',array('label'=>false,'div'=>false,'error'=>false,'size'=>80)); ?>
	</div>
	
	<div class="input-parts">
		<label for="body">内容：</label><?php echo $form->input('body',array('label'=>false,'div'=>false,'error'=>false,'cols'=>67,'rows'=>30)); ?>
	</div class="input-parts">
	
	<div class="input-parts">
		<?php echo $form->hidden('mode',array('value'=>'complete')); ?>
		<?php echo $form->submit('作成'); ?>
	</div>
	
<?php echo $form->end(); ?>