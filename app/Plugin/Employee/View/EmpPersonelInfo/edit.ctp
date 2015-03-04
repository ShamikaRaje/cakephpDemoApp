<?php 
	echo $this->Html->tag('h2', 'Edit Employee Information');
	echo $this->Html->link($this->Html->image('Arrow-Back-icon.png', array('width' => '25', 'height' => '25')), array('controller' => 'EmpPersonelInfo', 'action' => 'index'),array('escape' => false));

	echo $this->Form->create('EmpPersonelInfo');
	echo $this->Form->input('EmpPersonelInfo.id', array('type' => 'hidden'));

	echo $this->Form->input('EmpPersonelInfo.emp_id',array('type'=>'select', 'selected'=>isset($this->request->data['EmpPersonelInfo']['emp_id'])?$this->request->data['EmpPersonelInfo']['emp_id']:0, 'options'=>$employees));

	echo $this->Form->input('EmpPersonelInfo.emp_addr');
	echo $this->Form->input('EmpPersonelInfo.nominee_name');

	echo $this->Form->input('EmpPersonelInfo.country',array('type'=>'select', 'selected'=>$this->request->data['EmpPersonelInfo']['country'], 'options'=>$countries));

	echo $this->Form->input('EmpPersonelInfo.state',array('type'=>'select', 'selected'=>$this->request->data['EmpPersonelInfo']['state'], 'options'=>$states));

	echo $this->Form->input('EmpPersonelInfo.city',array('type'=>'select', 'selected'=>$this->request->data['EmpPersonelInfo']['city'], 'options'=>$cities
		));
	echo $this->Form->end('Save Post');

$this->Js->get('#EmpPersonelInfoCountry')->event('change', 
	$this->Js->request(
		array(
			'controller'=>'EmpPersonelInfo',
			'action'=>'get_by_country'
		), 
		array(
			'update'=>'#EmpPersonelInfoState',
			'async' => true,
			'method' => 'post',
			'dataExpression'=>true,
			'data'=> $this->Js->serializeForm(array(
				'isForm' => true,
				'inline' => true
				))
		))
	); 

$this->Js->get('#EmpPersonelInfoState')->event('change', 
	$this->Js->request(
		array(
			'controller'=>'EmpPersonelInfo',
			'action'=>'get_by_state'
		), 
		array(
			'update'=>'#EmpPersonelInfoCity',
			'async' => true,
			'method' => 'post',
			'dataExpression'=>true,
			'data'=> $this->Js->serializeForm(array(
				'isForm' => true,
				'inline' => true
				))
		))
	);
?>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript">
	jQuery("#EmpPersonelInfoEmpId").prepend('<option value=0>--Select--</option>');
	//jQuery('#EmpPersonelInfoEmpAddr option[value=0]').prop('selected', true);
	jQuery("#EmpPersonelInfoCountry").prepend('<option value=0>--Select--</option>');
	//jQuery('#EmpPersonelInfoCountry option[value=0]').prop('selected', true);
	jQuery("#EmpPersonelInfoState").prepend('<option value=0>--Select--</option>');
	//jQuery('#EmpPersonelInfoState option[value=0]').prop('selected', true);
	jQuery("#EmpPersonelInfoCity").prepend('<option value=0>--Select--</option>');
	//jQuery('#EmpPersonelInfoCity option[value=0]').prop('selected', true);
</script>