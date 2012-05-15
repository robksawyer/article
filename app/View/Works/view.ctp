<div class="works view">
<h2><?php  echo __('Work');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($work['Work']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($work['Work']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Artist'); ?></dt>
		<dd>
			<?php echo $this->Html->link($work['Artist']['fullname'], array('controller' => 'artists', 'action' => 'view', $work['Artist']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Media Type'); ?></dt>
		<dd>
			<?php echo h($work['Work']['media_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publication'); ?></dt>
		<dd>
			<?php echo $this->Html->link($work['Publication']['name'], array('controller' => 'publications', 'action' => 'view', $work['Publication']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($work['Work']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($work['Work']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Work'), array('action' => 'edit', $work['Work']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Work'), array('action' => 'delete', $work['Work']['id']), null, __('Are you sure you want to delete # %s?', $work['Work']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Works'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Artists'), array('controller' => 'artists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artist'), array('controller' => 'artists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Publications'), array('controller' => 'publications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Publication'), array('controller' => 'publications', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Uploads'), array('controller' => 'uploads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Upload'), array('controller' => 'uploads', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Uploads');?></h3>
	<?php if (!empty($work['Upload'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Path'); ?></th>
		<th><?php echo __('Caption'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Size'); ?></th>
		<th><?php echo __('Filesize'); ?></th>
		<th><?php echo __('Ext'); ?></th>
		<th><?php echo __('Group'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Work Id'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($work['Upload'] as $upload): ?>
		<tr>
			<td><?php echo $upload['id'];?></td>
			<td><?php echo $upload['name'];?></td>
			<td><?php echo $upload['path'];?></td>
			<td><?php echo $upload['caption'];?></td>
			<td><?php echo $upload['type'];?></td>
			<td><?php echo $upload['size'];?></td>
			<td><?php echo $upload['filesize'];?></td>
			<td><?php echo $upload['ext'];?></td>
			<td><?php echo $upload['group'];?></td>
			<td><?php echo $upload['slug'];?></td>
			<td><?php echo $upload['work_id'];?></td>
			<td><?php echo $upload['active'];?></td>
			<td><?php echo $upload['modified'];?></td>
			<td><?php echo $upload['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'uploads', 'action' => 'view', $upload['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'uploads', 'action' => 'edit', $upload['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'uploads', 'action' => 'delete', $upload['id']), null, __('Are you sure you want to delete # %s?', $upload['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Upload'), array('controller' => 'uploads', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
