<?php
class MailMagazinesController extends AppController {

	public $uses = array('Content', 'User', 'Queue', 'Sender');
	public $components  = array('Session', 'RequestHandler');
	
	
	function index(){
		$contents = $this->Content->find('all', array('order'=>array('Content.id'=>'desc')));
		$this->set('contents',$contents);
	}
	
	function add() {
		$this->Content->set($this->data);
		switch($this->data['Content']['mode'])
		{
			case "complete":
				if($this->Session->check('complete')){
					$this->redirect("/mail_magazines/");
				}else{
					if ($this->Content->saveAll($this->data, array('validate'=>'first'))) {
						$this->Session->write('complete', true);
						$this->redirect("/mail_magazines/");
					}else{
						$this->render("add");
					}
				}
			break;
			
			default:
					$this->Session->delete('complete');
		}
	}
	
	function edit($id=null) {
		$this->Content->set($this->data);
		switch($this->data['Content']['mode'])
		{
			case "complete":
				if($this->Session->check('complete')){
					$this->redirect("/mail_magazines/");
				}else{
					if ($this->Content->saveAll($this->data, array('validate'=>'first'))) {
						$this->Session->write('complete', true);
						$this->redirect("/mail_magazines/");
					}else{
						$this->render("edit");
					}
				}
			break;
			
			default:
				$this->Session->delete('complete');
				$this->data = $this->Content->find('first', array('conditions' => array('Content.id' => $id)));
		}
	}
	
	function queue_set($id=null, $is_test = false){
		if ($is_test) {
			$users=$this->User->find('all',array('conditions' => array('User.isTest' => 1), 'fields' => array('User.id')));
		} else {
			$users=$this->User->find('all',array('fields' => array('User.id')));
		}
		$contents=$this->Content->find('first', array('conditions' => array('Content.id' => $id)));
		$sender=$this->Sender->find('first');
		foreach($users as $key=>$val){
			$data['Queue'][$key]['user_id']=$val['User']['id'];
			$data['Queue'][$key]['content_id']=$id;
			$data['Queue'][$key]['sender_id']=1;
		}
		$this->Queue->saveAll($data['Queue']);
		
		$this->Content->id = $id;
		$this->Content->saveField('started', date("Y-m-d h:i:s"));
		
		if (!$is_test) {
			$this->redirect("/mail_magazines/");
		}
	}
	
	function issue(){
		mb_language('uni');
		mb_internal_encoding('UTF-8');
		$queues=$this->Queue->find('all',array(
			'conditions' => array('Queue.send' => 0),
			'order' => array('Queue.id' => 'Asc'),
			'limit' => '100'
		));
		foreach($queues as $key=>$val){
			mb_send_mail($val['User']['email'],$val['Content']['subject'],$val['Content']['body'],"From: {$val['Sender']['name']}<{$val['Sender']['email']}>","-f {$val['Sender']['email']}");
			
			$this->Queue->id=$val['Queue']['id'];
			$data['Queue']['sent'] = date("Y-m-d h:i:s");
			$data['Queue']['send'] = 1;
			$this->Queue->save($data['Queue']);
			echo "Mail send:".$val['User']['name']."&lt;".$val['User']['email']."&gt; done.<br>";
		}
		$contents = $this->Content->find('all',array('order'=>array('Content.id'=>'desc')));
		foreach($contents as $key => $val){
			$count = $this->Queue->find('count',array('conditions'=>array('Queue.content_id'=>$val['content']['id'],'Queue.send'=>1)));
			if($val['Content']['started']!='0000-00-00 00:00:00' && !$count){
				$this->Content->id = $val['Content']['id'];
				$this->Content->saveField('finished', date("Y-m-d h:i:s"));
			}
		}
	}

	public function test_issue($id = null) {
		$this->queue_set($id, true);
		$this->issue();
		$this->Session->setFlash(__('テスト送信完了しました。'));
		$this->redirect("/mail_magazines/");
	}
	
	function stop_send($id=null){
		$content = $this->Content->find('first',array('conditions'=>array('Content.id'=>$id)));
		if($content['Content']['finished']=='0000-00-00 00:00:00'){
			$this->Content->id = $id;
			$this->Content->saveField('started', '0000-00-00 00:00:00');
			$this->Queue->deleteAll(array('Queue.content_id'=>$id));
			$this->set('message','発行を停止しました。再度発行する場合はすべての会員に発行されます。');
		}else{
			$this->set('message','すでに発行が完了しています。');
		}
	}
	
	function delete($id=null) {
		$this->Content->del($id);
		$this->redirect("/mail_magazines/");
	}
}
?>
