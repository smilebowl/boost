<script>
$(function(){
    $("form").submit(function() {
        if ($('#UserPassword').val() != $('#UserComfirm').val()) {
            alert('Retype password!');
            $('#UserPassword').focus();
            return false;
        }
        return true;
    });
});
</script>
<div class="actions">
	<ul class="nav nav-pills well well-sm">

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
<div class="users form">
<?php echo $this->Form->create('User', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'label' => array(
			'class' => 'col col-xs-2 control-label'),
		'wrapInput' => 'col col-xs-5',
		'class' => 'form-control'),
	'class' => 'well form-horizontal'
	)); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username', array('autocomplete'=>'off', 'afterInput'=>'<span class="help-block"><span class="label label-warning">'.__('Required').'</span></span>'));
		echo $this->Form->input('password', array('value'=>'','afterInput'=>'<span class="help-inline"><span class="label label-info">'.__('Required to change').'</span></span>'));
		echo $this->Form->input('comfirm', array('type'=>'password', 'value'=>'', 'afterInput'=>'<span class="help-inline"><span class="label label-info">'.__('Required to change').'</span></span>'));
		echo $this->Form->input('displayname', array('afterInput'=>'<span class="help-block"><span class="label label-warning">'.__('Required').'</span></span>'));
		echo $this->Form->input('role', array('afterInput'=>'<span class="help-block"><span class="label label-warning">'.__('Required').'</span></span>'));
	?>
	</fieldset>
<?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary')); ?>
<?php echo $this->Form->end(); ?>
</div>
