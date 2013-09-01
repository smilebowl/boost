<?php
	echo $this->Html->css('datepicker', null, array('inline' => false));
	echo $this->Html->script('vendor/bootstrap-datepicker', array('charset'=>'UTF-8'));
?>
<script>
$(function(){
   $('.datepicker').datepicker({
   		format: 'yyyy-mm-dd',
   		language: 'ja'
   	}).on('changeDate', function(ev) {
  		$(this).datepicker('hide');
	});
});
</script>
<div class="accesslogs index">
	<h2><?php echo __('Accesslogs'); ?></h2>
	
  <div class="row well">
	<?php 
		echo $this->Form->create('Accesslog', array(
			'inputDefaults' => array(
				 'div' => false,
				 'label' => false,
				 'wrapInput' => false,
				 'class' => 'form-control'
			),
			'class' => 'form-inline',
			'url' => array_merge(array('action' => 'index'), $this->params['pass'])
		));
	
		echo $this->Form->input('logged_from',array(
			'class' => 'datepicker form-control',
			'type'=>'text',
			'wrapInput' => 'input-group col-sm-4',
			'beforeInput' => '<span class="input-group-addon">' . __('Logged').'(From)' .'</span>',
		));
		echo $this->Form->input('logged_to',array(
			'class' => 'datepicker form-control',
			'type'=>'text',
			'wrapInput' => 'input-group col-sm-4',
			'beforeInput' => '<span class="input-group-addon">' . __('Logged').'(To)' .'</span>',
		));
		echo $this->Form->input('controllername',array(
			'wrapInput' => 'input-group col-sm-4',
			'beforeInput' => '<span class="input-group-addon">' . __('Controllername') .'</span>',
		));
		echo $this->Form->input('actionname',array(
			'wrapInput' => 'input-group col-sm-4',
			'beforeInput' => '<span class="input-group-addon">' . __('Actionname') .'</span>',
		));
		echo $this->Form->input('user_id',array(
			'placeholder'=>__('Condition'),
			'empty'=>'---',
			'wrapInput' => 'input-group col-sm-4',
			'beforeInput' => '<span class="input-group-addon">' . __('User') .'</span>',
		));
		echo $this->Form->input('param',array(
			'type'=>'text',
			'wrapInput' => 'input-group col-sm-5',
			'beforeInput' => '<span class="input-group-addon">' . __('param') .'</span>',
		));
		
		echo $this->Form->submit(__('Search'), array(
			'div' => false,
			'class'=>'btn btn-success btn-lg',
		));
		echo $this->Form->end();
	?>
  </div>

	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<?php echo $this->Paginator->pagination(array('ul' => 'pagination', 'modulus'=>9)); ?>

	<table class="table table-striped table-hover table-condensed">
	<tr>
			<th class="actions"><?php echo __('Actions'); ?></th>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('logged'); ?></th>
			<th><?php echo $this->Paginator->sort('controllername'); ?></th>
			<th><?php echo $this->Paginator->sort('actionname'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('url'); ?></th>
			<th><?php echo $this->Paginator->sort('param'); ?></th>
	</tr>
	<?php foreach ($accesslogs as $accesslog): ?>
	<tr style="white-space: nowrap;">
		<td class="actions">
			<?php echo $this->Icon->link(__('View'), array('action' => 'view', $accesslog['Accesslog']['id'])); ?>
		</td>		
		<td><?php echo h($accesslog['Accesslog']['id']); ?>&nbsp;</td>
		<td><?php echo h($accesslog['Accesslog']['logged']); ?>&nbsp;</td>
		<td><?php echo h($accesslog['Accesslog']['controllername']); ?>&nbsp;</td>
		<td><?php echo h($accesslog['Accesslog']['actionname']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($accesslog['User']['displayname'], array('controller' => 'users', 'action' => 'view', $accesslog['User']['id'])); ?>
		</td>
		<td style="white-space: normal;"><?php echo String::truncate(h($accesslog['Accesslog']['url']),40); ?>&nbsp;</td>
		<td style="white-space: normal;"><?php echo String::truncate(h($accesslog['Accesslog']['param']),80); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
