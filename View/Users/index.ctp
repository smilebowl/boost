<div class="actions">
	<ul class="nav nav-pills well well-sm">
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
	</ul>
</div>
<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<table class="table table-striped table-hover table-condensed">
	<tr>
		<th class="actions"><?php echo __('Actions'); ?></th>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('displayname'); ?></th>
			<th><?php echo $this->Paginator->sort('role'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
		</tr>
	<?php foreach ($users as $user): ?>
	<?php
		$warning = ($user['User']['deleted']==1 ? ' class="warning"' : '');
	?>
	<tr style="white-space: nowrap;"<?php echo $warning;?>>
		<td class="actions">
			<?php echo $this->Icon->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php if ($user['User']['deleted'] != 1) : ?>
					<?php echo $this->Icon->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
					<?php echo $this->Icon->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
			<?php endif; ?>
		</td>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['displayname']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['role']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
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
	<?php echo $this->Paginator->pagination(array('ul' => 'pagination')); ?>
	</div>
</div>
