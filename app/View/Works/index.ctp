<div class="works index">
	<h2><?php echo __('Works');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('artist_id');?></th>
			<th><?php echo $this->Paginator->sort('media_type');?></th>
			<th><?php echo $this->Paginator->sort('publication_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($works as $work): ?>
	<tr>
		<td><?php echo h($work['Work']['id']); ?>&nbsp;</td>
		<td><?php echo h($work['Work']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($work['Artist']['fullname'], array('controller' => 'artists', 'action' => 'view', $work['Artist']['id'])); ?>
		</td>
		<td><?php echo h($work['Work']['media_type']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($work['Publication']['name'], array('controller' => 'publications', 'action' => 'view', $work['Publication']['id'])); ?>
		</td>
		<td><?php echo h($work['Work']['created']); ?>&nbsp;</td>
		<td><?php echo h($work['Work']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $work['Work']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $work['Work']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $work['Work']['id']), null, __('Are you sure you want to delete # %s?', $work['Work']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Work'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Artists'), array('controller' => 'artists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artist'), array('controller' => 'artists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Publications'), array('controller' => 'publications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Publication'), array('controller' => 'publications', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Uploads'), array('controller' => 'uploads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Upload'), array('controller' => 'uploads', 'action' => 'add')); ?> </li>
	</ul>
</div>
