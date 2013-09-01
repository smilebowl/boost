<div class="actions">
	<ul class="nav nav-pills well well-sm">
		<li><?php echo $this->Html->link(__('List Accesslogs'), array('action' => 'index')); ?> </li>
	</ul>
</div>
<div class="accesslogs view well">
<h2><?php  echo __('Accesslog'); ?></h2>
	<dl class="dl-horizontal">
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
