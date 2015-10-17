<header class="main-header">
	<!-- Logo -->
	<a href="../../index2.html" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>A</b>LT</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>Admin</b>LTE CakePHP</span>
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<?php $admin = $this->Session->read('Auth.Admin'); ?>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<?php
							echo $this->Html->image('admin.png',
								array(
									'class' => 'user-image',
									'fullBase' => true
								)
							);
						?>
						<span class="hidden-xs"><?php echo $admin['firstname'].' '.$admin['lastname']; ?></span>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
							<?php
								echo $this->Html->image('admin.png',
									array(
										'class' => 'img-circle',
										'fullBase' => true
									)
								);
							?>
							<p>
								<?php echo $admin['firstname'].' '.$admin['lastname']; ?>
								<small>Member since <?php echo date('M, Y', strtotime($admin['created'])); ?></small>
							</p>
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="#" class="btn btn-default btn-flat">Profile</a>
							</div>
							<div class="pull-right">
								<?php 
									echo $this->Html->link('Sign Out', 
										array(
											'controller' => 'administrators', 
											'action' => 'logout', 
											'admin' => true
										),
										array(
											'class' => 'btn btn-default btn-flat'
										)
									) 
								?>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>