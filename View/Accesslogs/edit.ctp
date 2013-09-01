<div class="accesslogs form">
<?php echo $this->Form->create('Accesslog'); ?>
	<fieldset>
		<legend><?php echo __('Edit Accesslog'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('logged');
		echo $this->Form->input('controllername');
		echo $this->Form->input('actionname');
		echo $this->Form->input('user_id');
		echo $this->Form->input('url');
		echo $this->Form->input('param');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Accesslog.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Accesslog.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Accesslogs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
