<div class="mediaTypes view">
<h2><?php  echo __('Media Type');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mediaType['MediaType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($mediaType['MediaType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($mediaType['MediaType']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($mediaType['MediaType']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Media Type'), array('action' => 'edit', $mediaType['MediaType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Media Type'), array('action' => 'delete', $mediaType['MediaType']['id']), null, __('Are you sure you want to delete # %s?', $mediaType['MediaType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Media Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Works'), array('controller' => 'works', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work'), array('controller' => 'works', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Works');?></h3>
	<?php if (!empty($mediaType['Work'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Artist Id'); ?></th>
		<th><?php echo __('Media Type'); ?></th>
		<th><?php echo __('Publication Id'); ?></th>
		<th><?php echo __('Media Type Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($mediaType['Work'] as $work): ?>
		<tr>
			<td><?php echo $work['id'];?></td>
			<td><?php echo $work['name'];?></td>
			<td><?php echo $work['artist_id'];?></td>
			<td><?php echo $work['media_type'];?></td>
			<td><?php echo $work['publication_id'];?></td>
			<td><?php echo $work['media_type_id'];?></td>
			<td><?php echo $work['created'];?></td>
			<td><?php echo $work['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'works', 'action' => 'view', $work['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'works', 'action' => 'edit', $work['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'works', 'action' => 'delete', $work['id']), null, __('Are you sure you want to delete # %s?', $work['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Work'), array('controller' => 'works', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
