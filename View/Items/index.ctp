<div class="actions">
	<ul class="nav nav-pills well well-sm">
		<li><?php echo $this->Html->link(__('New Item'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="items index">
	<h2><?php echo __('Items'); ?></h2>

	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<?php echo $this->Paginator->pagination(array('ul' => 'pagination')); ?>

	<table class="table table-striped table-hover table-condensed">
	<tr>
		<th class="actions"><?php echo __('Actions'); ?></th>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('age'); ?></th>
			<th><?php echo $this->Paginator->sort('tel'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
		</tr>
	<?php foreach ($items as $item): ?>
	<tr style="white-space: nowrap;">
		<td class="actions">
			<?php echo $this->Icon->link(__('View'), array('action' => 'view', $item['Item']['id'])); ?>
			<?php echo $this->Icon->link(__('Edit'), array('action' => 'edit', $item['Item']['id'])); ?>
			<?php echo $this->Icon->postLink(__('Delete'), array('action' => 'delete', $item['Item']['id']), null, __('Are you sure you want to delete # %s?', $item['Item']['id'])); ?>
		</td>
		<td><?php echo h($item['Item']['id']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['title']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['age']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['tel']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($item['User']['username'], array('controller' => 'users', 'action' => 'view', $item['User']['id'])); ?>
		</td>
		<td><?php echo h($item['Item']['description']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['created']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['modified']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
