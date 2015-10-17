<!DOCTYPE html>
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>Reservation | <?php echo !empty($title)?$title:'Error'; ?></title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<?php
			echo $this->Html->css(
				array(
					'bootstrap.min',
					'font-awesome.min',
					'AdminLTE.min',
					'blue',
					'_all-skins.min',
					'ionicons.min'
				)
			);

			echo $this->Html->script('jQuery-2.1.4.min');
		?>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>
	<!--
	BODY TAG OPTIONS:
	=================
	Apply one or more of the following classes to get the
	desired effect
	|---------------------------------------------------------|
	| SKINS         | skin-blue                               |
	|               | skin-black                              |
	|               | skin-purple                             |
	|               | skin-yellow                             |
	|               | skin-red                                |
	|               | skin-green                              |
	|---------------------------------------------------------|
	|LAYOUT OPTIONS | fixed                                   |
	|               | layout-boxed                            |
	|               | layout-top-nav                          |
	|               | sidebar-collapse                        |
	|               | sidebar-mini                            |
	|---------------------------------------------------------|
	-->
	<body class="<?php echo in_array($this->params['action'], array('admin_login'))?'login-page':'skin-green sidebar-mini'; ?>" data-spy="scroll" data-target="#scrollspy">
	<div class="wrapper">
	<?php echo !in_array($this->params['action'], array('admin_login'))?$this->element('adminElements/admin_header'):''; ?> 
	<?php echo !in_array($this->params['action'], array('admin_login'))?$this->element('adminElements/admin_sidebar'):''; ?> 
		<div class="<?php echo !in_array($this->params['action'], array('admin_login'))?'content-wrapper':''; ?>">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>	
	</div>
	<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
		<?php
			echo $this->Html->script(
				array(
					'bootstrap.min',
					'icheck.min',
					'app.min',
				)
			);
		?>
	</body>
</html>