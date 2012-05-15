<div class="artists form">
<?php echo $this->Form->create('Artist');?>
	<fieldset>
		<legend><?php echo __('Add Artist'); ?></legend>
	<?php
		echo $this->Form->input('fullname');
		echo $this->Form->input('type',array('label'=>'Type of artist','after'=>'Ex. Digital, Illustrator, etc.'));
		echo $this->Form->input('url',array('label'=>'Website URL'));
		echo $this->Form->input('linkedin_url',array('label'=>'<a href="http://www.linkedin.com" target="_blank">LinkedIn</a> URL'));
		echo $this->Form->input('twitter',array('label'=>'Twitter Name'));
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
	?>
	</fieldset>
	<fieldset>
		<legend><?php echo __('Details'); ?></legend>
	<?php
		echo $this->Form->input('title',array('label'=>'Job Title'));
		echo $this->Form->input('employer');
		echo $this->Form->input('employment_status',array('after'=>'Ex. Freelance, Full-time, etc.'));
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

		<li><?php echo $this->Html->link(__('List Artists'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Works'), array('controller' => 'works', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work'), array('controller' => 'works', 'action' => 'add')); ?> </li>
	</ul>
</div>
