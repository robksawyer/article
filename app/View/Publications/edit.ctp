<div class="publications form">
<?php echo $this->Form->create('Publication');?>
	<fieldset>
		<legend><?php echo __('Edit Publication'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('url');
		echo $this->Form->input('phone');
		echo $this->Form->input('email');
		echo $this->Form->input('city');
		echo $this->Form->input('state');
		echo $this->Form->input('country');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Publication.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Publication.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Publications'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Works'), array('controller' => 'works', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work'), array('controller' => 'works', 'action' => 'add')); ?> </li>
	</ul>
</div>
