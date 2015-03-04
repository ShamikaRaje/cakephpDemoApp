<div>
	<?php 
		echo $this->Html->tag('h2', 'Add Employee Personel Information');
		echo $this->Html->getCrumbs(' > Add', array(
		    'text' => 'Home', //$this->Html->image('home.png'),
		    'url' => array('controller' => 'EmpPersonelInfo', 'action' => 'index'),
		    'escape' => false
		    ));
	?>
</div>
<?php 
echo $this->Html->link($this->Html->image('Arrow-Back-icon.png', array('width' => '25', 'height' => '25')), array('controller' => 'EmpPersonelInfo', 'action' => 'index'),array('escape' => false));

	echo $this->Form->create('EmpPersonelInfo');  
	echo $this->Form->input('emp_id',array('type'=>'select','options'=>$employees));
	echo $this->Form->input('emp_addr');
	echo $this->Form->input('nominee_name');
	echo $this->element('Employee.dropdown', array('name' => 'country', 'data' => $countries));
	//echo $this->Form->input('country',array('type'=>'select', 'options'=>$countries));
	echo $this->Form->input('state',array('type'=>'select',  'options'=>$states)); 
	echo $this->Form->input('city',array('type'=>'select', 'options'=>$cities));
	echo $this->Form->end('Save Information');

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
	jQuery("#EmpPersonelInfoEmpId").prepend('<option value="">--Select--</option>');
	jQuery('#EmpPersonelInfoEmpId option[value=""]').prop('selected', true);
	jQuery("#EmpPersonelInfoCountry").prepend('<option value=0>--Select--</option>');
	jQuery('#EmpPersonelInfoCountry option[value=0]').prop('selected', true);
	jQuery("#EmpPersonelInfoState").prepend('<option value=0>--Select--</option>');
	jQuery('#EmpPersonelInfoState option[value=0]').prop('selected', true);
	jQuery("#EmpPersonelInfoCity").prepend('<option value=0>--Select--</option>');
	jQuery('#EmpPersonelInfoCity option[value=0]').prop('selected', true);
</script>

