<div class="works form">
<?php echo $this->Form->create('Work');?>
	<fieldset>
		<legend><?php echo __('Edit Work'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('artist_id',array('empty'=>'-- Select an Artist --','after'=>'<div class="after">Don\'t see the artist, <a href="/artists/add">add him/her</a>.</div>'));
		echo $this->Form->input('media_type',array('after'=>'<div class="after">Ex. Chalk, Acrylic, Oil, Crayon, Conté, Pen and ink, etc.</div>'));
		echo $this->Form->input('media_base',array('after'=>'<div class="after">Ex. Canvas, Metal, Paper, Wood etc.</div>'));
		echo $this->Form->input('publication_id',array('empty' => '-- Select a Publication --','after'=>'<div class="after">Don\'t see the publication, <a href="/publications/add">add it</a>.</div>'));
		//echo $this->Form->input('Upload.fileName', array('type' => 'file','label'=>false,'before'=>'<div class="before">Add an image of the work.</div>'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Work.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Work.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Works'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Artists'), array('controller' => 'artists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artist'), array('controller' => 'artists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Publications'), array('controller' => 'publications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Publication'), array('controller' => 'publications', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Uploads'), array('controller' => 'uploads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Upload'), array('controller' => 'uploads', 'action' => 'add')); ?> </li>
	</ul>
</div>
