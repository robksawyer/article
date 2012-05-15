<div class="publications view">
<h2><?php  echo __('Publication');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($publication['Publication']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($publication['Publication']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($publication['Publication']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($publication['Publication']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($publication['Publication']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($publication['Publication']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($publication['Publication']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($publication['Publication']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($publication['Publication']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($publication['Publication']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Publication'), array('action' => 'edit', $publication['Publication']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Publication'), array('action' => 'delete', $publication['Publication']['id']), null, __('Are you sure you want to delete # %s?', $publication['Publication']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Publications'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Publication'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Works'), array('controller' => 'works', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work'), array('controller' => 'works', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Works');?></h3>
	<?php if (!empty($publication['Work'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Artist Id'); ?></th>
		<th><?php echo __('Media Type'); ?></th>
		<th><?php echo __('Publication Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($publication['Work'] as $work): ?>
		<tr>
			<td><?php echo $work['id'];?></td>
			<td><?php echo $work['name'];?></td>
			<td><?php echo $work['artist_id'];?></td>
			<td><?php echo $work['media_type'];?></td>
			<td><?php echo $work['publication_id'];?></td>
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
