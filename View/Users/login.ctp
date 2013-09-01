<script>
$(function(){
   $("#UserUsername").focus(); 
});
</script>
<div class="loginform row">
	<h2>
		<?php  echo __('Login');?>
	</h2>
	<div class="users form well col col-xs-9">
		<?php 
		  $msg = $this->Session->flash('auth');
		  if (!empty($msg)) : 
		 ?>
			<div class="alert alert-warning">
			<?php echo $msg; ?>
			</div>
		<?php endif; ?>
		<?php echo $this->Form->create('User'); ?>
		<fieldset>
			<legend>
				<?php echo __('Please enter your username and password.'); ?>
			</legend>
			<?php
			echo $this->Form->input('username', array('class'=>'form-control'));
			echo $this->Form->input('password',array('label'=>__('Password'), 'class'=>'form-control'));
			?>
		</fieldset>
		<br />
		<?php echo $this->Form->submit(__('Login'), array('class'=>'btn btn-lg btn-success btn-block')); ?>
		<?php echo $this->Form->end(); ?>
<!--			<?php echo AuthComponent::password('admin'); ?>-->
	</div>
</div>