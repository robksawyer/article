<div class="publications form">
<?php echo $this->Form->create('Publication');?>
	<fieldset>
		<legend><?php echo __('Add Publication'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('url',array('label'=>'URL','value'=>'http://'));
		echo $this->Form->input('email',array('label'=>'Email contact'));
		echo $this->Form->input('phone');
	?>
	</fieldset>
	<fieldset>
		<legend><?php echo __('Address'); ?></legend>
	<?php
		echo $this->Form->input('city',array('class'=>'city'));
		$states = $this->Geography->stateList();
		echo $this->Form->input('state',array('class'=>'state','type'=>'select','options'=>$states,'empty' => '-- Select a State --'));
		$countries = $this->Geography->countryList();
		echo $this->Form->input('country',array('class'=>'country','type'=>'select','options'=>$countries,'empty' => '-- Select a Country --'));
		echo $this->Form->input('zip',array('class'=>'zip'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Publications'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Works'), array('controller' => 'works', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work'), array('controller' => 'works', 'action' => 'add')); ?> </li>
	</ul>
</div>
