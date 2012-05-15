<div class="artists index">
	<h2><?php echo __('Artists');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('fullname');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('linkin_url');?></th>
			<th><?php echo $this->Paginator->sort('twitter');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('phone');?></th>
			<th><?php echo $this->Paginator->sort('employer');?></th>
			<th><?php echo $this->Paginator->sort('employment_status');?></th>
			
			<th><?php echo $this->Paginator->sort('city');?></th>
			<th><?php echo $this->Paginator->sort('state');?></th>
			<th><?php echo $this->Paginator->sort('country');?></th>
			<th><?php echo $this->Paginator->sort('zip');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($artists as $artist): ?>
	<tr>
		<td><?php echo h($artist['Artist']['type']); ?>&nbsp;</td>
		<td><?php echo h($artist['Artist']['title']); ?>&nbsp;</td>
		<td><?php echo h($artist['Artist']['fullname']); ?>&nbsp;</td>
		<td><?php echo $this->Text->autoLinkUrls($artist['Artist']['url'],array('target'=>'_blank')); ?>&nbsp;</td>
		<td><?php echo $this->Text->autoLinkUrls($artist['Artist']['linkedin_url'],array('target'=>'_blank')); ?>&nbsp;</td>
		<td><?php 
			if(!empty($artist['Artist']['twitter'])){
				echo $this->Html->link('http://twitter.com/#!/'.$artist['Artist']['twitter'],array('target'=>'_blank')); 
			}
		?>&nbsp;</td>
		<td><?php echo $this->Text->autoLinkEmails($artist['Artist']['email']); ?>&nbsp;</td>
		<td><?php echo h($artist['Artist']['phone']); ?>&nbsp;</td>
		<td><?php echo h($artist['Artist']['employer']); ?>&nbsp;</td>
		<td><?php echo h($artist['Artist']['employment_status']); ?>&nbsp;</td>
		<td><?php echo h($artist['Artist']['city']); ?>&nbsp;</td>
		<td><?php echo h($artist['Artist']['state']); ?>&nbsp;</td>
		<td><?php echo h($artist['Artist']['country']); ?>&nbsp;</td>
		<td><?php echo h($artist['Artist']['zip']); ?>&nbsp;</td>
		<td><?php echo h($artist['Artist']['created']); ?>&nbsp;</td>
		<td><?php echo h($artist['Artist']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $artist['Artist']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $artist['Artist']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $artist['Artist']['id']), null, __('Are you sure you want to delete # %s?', $artist['Artist']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Artist'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Works'), array('controller' => 'works', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work'), array('controller' => 'works', 'action' => 'add')); ?> </li>
	</ul>
</div>
