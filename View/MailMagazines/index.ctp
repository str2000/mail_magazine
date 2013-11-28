<table class="table">
<tr>
<th>作成日</th><th>件名</th><th></th><th></th><th></th>
</tr>
<?php foreach ($contents as $content): ?>
	<tr>
		<td><?php echo date("Y-m-d",strtotime($content['Content']['created'])); ?></td>
		<td width="400"><?php echo $content['Content']['subject']; ?></td>
		<td>
			<?php
			if($content['Content']['started']=="0000-00-00 00:00:00"){ //メルマガ発行が始まっていない場合
				echo $this->Html->link(
				    '発行する',
				    "/mail_magazines/queue_set/{$content['Content']['id']}",
				    array(),
				    false,
				    false
				);
			}elseif($content['Content']['started']!="0000-00-00 00:00:00" && $content['Content']['finished']=="0000-00-00 00:00:00"){
				echo $this->Html->link(
				    '発行中→発行停止',
				    "/mail_magazines/stop_send/{$content['Content']['id']}",
				    array(),
				    false,
				    false
				);
			}else{
				echo '発行済';
			}
			?><br>
			<?php echo $this->Html->link(
				"テスト送信",
				"/mail_magazines/test_issue/{$content['Content']['id']}",
			    array('escape' => false)
			); ?>
		</td>
		<td>
			<?php echo $this->Html->link(
			    "Edit",
			    "/mail_magazines/edit/{$content['Content']['id']}",
			    array('escape' => false)
			); ?>
		</td>
		<td>
			<?php echo $this->Html->link(
			    "Delete",
			    "/mail_magazines/delete/{$content['Content']['id']}",
			    array('escape' => false),
			    '１つの記事を削除します。よろしいですか？'
			); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
