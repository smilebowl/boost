<div class="actions">
	<ul class="nav-pills breadcrumb well">

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Accesslog.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Accesslog.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Accesslogs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="accesslogs form">
<?php echo $this->Form->create('Accesslog', array(
	'inputDefaults' => array(
		'div' => 'control-group',
		'label' => array(
			'class' => 'control-label'),
		'wrapInput' => 'controls'),
	'class' => 'well form-horizontal'
	)); ?>
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
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
</div>
