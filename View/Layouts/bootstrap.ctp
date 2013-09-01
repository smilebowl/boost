<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
		<?php echo __('CakePHP: Boost:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
<!--	<meta name="viewport" content="width=device-width, initial-scale=1.0">-->

	<?php echo $this->Html->meta('icon'); ?>
	<!-- Le styles -->
	<?php echo $this->Html->css('bootstrap.min'); ?>
<!--
	<style>
	body {padding-top: 60px;}
	</style>
-->
	<?php echo $this->Html->css('main'); ?>

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<?php echo $this->Html->script('vendor/html5shiv'); ?>
	<![endif]-->

	<?php
	echo $this->fetch('meta');
	echo $this->fetch('css');
	?>
    <?php echo $this->Html->script('vendor/jquery-1.10.1.min'); ?>
    <?php echo $this->Html->script('vendor/bootstrap.min'); ?>
    <?php echo $this->Html->script('main'); ?>
    <?php echo $this->fetch('script'); ?>

</head>

<body>

    <?php echo $this->element('menu'); ?>
    
	<div class="container">

<!-- 		<h1>Bootstrap starter template</h1> -->

		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>

		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => '', 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div> <!-- /container -->

	<!-- Le javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>
