<div class="actions">
	<ul class="nav nav-pills well well-sm">
		<li><?php echo $this->Html->link(__('Edit Item'), array('action' => 'edit', $item['Item']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Item'), array('action' => 'delete', $item['Item']['id']), null, __('Are you sure you want to delete # %s?', $item['Item']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="items view well">
<h2><?php  echo __('Item'); ?></h2>
	<dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($item['Item']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($item['Item']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age'); ?></dt>
		<dd>
			<?php echo h($item['Item']['age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tel'); ?></dt>
		<dd>
			<?php echo h($item['Item']['tel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($item['User']['username'], array('controller' => 'users', 'action' => 'view', $item['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($item['Item']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($item['Item']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($item['Item']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
