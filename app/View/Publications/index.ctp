<div class="publications index">
	<h2><?php echo __('Publications');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('phone');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('city');?></th>
			<th><?php echo $this->Paginator->sort('state');?></th>
			<th><?php echo $this->Paginator->sort('country');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($publications as $publication): ?>
	<tr>
		<td><?php echo h($publication['Publication']['id']); ?>&nbsp;</td>
		<td><?php echo h($publication['Publication']['name']); ?>&nbsp;</td>
		<td><?php echo h($publication['Publication']['url']); ?>&nbsp;</td>
		<td><?php echo h($publication['Publication']['phone']); ?>&nbsp;</td>
		<td><?php echo h($publication['Publication']['email']); ?>&nbsp;</td>
		<td><?php echo h($publication['Publication']['city']); ?>&nbsp;</td>
		<td><?php echo h($publication['Publication']['state']); ?>&nbsp;</td>
		<td><?php echo h($publication['Publication']['country']); ?>&nbsp;</td>
		<td><?php echo h($publication['Publication']['created']); ?>&nbsp;</td>
		<td><?php echo h($publication['Publication']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $publication['Publication']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $publication['Publication']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $publication['Publication']['id']), null, __('Are you sure you want to delete # %s?', $publication['Publication']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Publication'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Works'), array('controller' => 'works', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work'), array('controller' => 'works', 'action' => 'add')); ?> </li>
	</ul>
</div>
