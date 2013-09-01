<div class="accesslogs view">
<h2><?php echo __('Accesslog'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($accesslog['Accesslog']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logged'); ?></dt>
		<dd>
			<?php echo h($accesslog['Accesslog']['logged']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Controllername'); ?></dt>
		<dd>
			<?php echo h($accesslog['Accesslog']['controllername']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Actionname'); ?></dt>
		<dd>
			<?php echo h($accesslog['Accesslog']['actionname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($accesslog['User']['id'], array('controller' => 'users', 'action' => 'view', $accesslog['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($accesslog['Accesslog']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Param'); ?></dt>
		<dd>
			<?php echo h($accesslog['Accesslog']['param']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Accesslog'), array('action' => 'edit', $accesslog['Accesslog']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Accesslog'), array('action' => 'delete', $accesslog['Accesslog']['id']), null, __('Are you sure you want to delete # %s?', $accesslog['Accesslog']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Accesslogs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accesslog'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
