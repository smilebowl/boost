<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#"><?php echo __('CakePHP'); ?></a>
	</div>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li<?php echo $this->name=='Pages' ? ' class="active"' : ''; ?>>
				<a href="<?php echo $this->Html->url('/'); ?>">Home</a></li>
			<li<?php echo $this->name=='Items' ? ' class="active"' : ''; ?>>
				<?php echo $this -> Html -> link(__('Items'), array('controller' => 'items', 'action' => 'index')); ?></li>
			<li<?php echo $this->name=='Users' ? ' class="active"' : ''; ?>>
				<?php echo $this -> Html -> link(__('Users'), array('controller' => 'users', 'action' => 'index')); ?></li>
			<li<?php echo $this->name=='Accesslogs' ? ' class="active"' : ''; ?>>
				<?php echo $this -> Html -> link(__('AccessLogs'), array('controller' => 'accesslogs', 'action' => 'index')); ?></li>
			<?php
			if ($this -> Session -> read('Auth.User')) {
				// $link = $this -> Html -> link($this -> Session -> read('Auth.User.displayname'), array('controller' => 'users', 'action' => 'view', $this -> Session -> read('Auth.User.id')));
				// echo "<li>$link</li>";
				$username = AuthComponent::user('displayname');
				echo "<li>" . $this -> Html -> link(__('Logout') ." <small>($username)</small>",
					array('controller' => 'users', 'action' => 'logout'), 
					array('escape'=>false)) . "</li>";
			}
			?>
		</ul>
	</div><!--/.nav-collapse -->
</nav>
