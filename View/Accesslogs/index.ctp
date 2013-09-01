<div class="accesslogs index">
	<h2><?php echo __('Accesslogs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('logged'); ?></th>
			<th><?php echo $this->Paginator->sort('controllername'); ?></th>
			<th><?php echo $this->Paginator->sort('actionname'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('url'); ?></th>
			<th><?php echo $this->Paginator->sort('param'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($accesslogs as $accesslog): ?>
	<tr>
		<td><?php echo h($accesslog['Accesslog']['id']); ?>&nbsp;</td>
		<td><?php echo h($accesslog['Accesslog']['logged']); ?>&nbsp;</td>
		<td><?php echo h($accesslog['Accesslog']['controllername']); ?>&nbsp;</td>
		<td><?php echo h($accesslog['Accesslog']['actionname']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($accesslog['User']['id'], array('controller' => 'users', 'action' => 'view', $accesslog['User']['id'])); ?>
		</td>
		<td><?php echo h($accesslog['Accesslog']['url']); ?>&nbsp;</td>
		<td><?php echo h($accesslog['Accesslog']['param']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $accesslog['Accesslog']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $accesslog['Accesslog']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $accesslog['Accesslog']['id']), null, __('Are you sure you want to delete # %s?', $accesslog['Accesslog']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Accesslog'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
