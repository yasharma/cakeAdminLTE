<div class="login-box">
	<div class="login-logo">Admin Login</div>
 	<div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php echo $this->Session->flash(); ?>
        <?php  echo $this->Form->create(); ?>
        	<div class="form-group has-feedback">
            	<?php
            		echo $this->Form->input('Admin.username',
            			array(
            				'label'			=> false,
            				'class' 		=> 'form-control',
            				'placeholder' 	=> 'Username',
            				'autocomplete'	=> 'off',
                            'autofocus'     => true,
                            'value'         => @$username 
            			)
            		);
            	?>
            	<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          	</div>
          	<div class="form-group has-feedback">
            	<?php
            		echo $this->Form->input('Admin.password',
            			array(
            				'type'			=> 'password',
            				'label'			=> false,
            				'class' 		=> 'form-control',
            				'placeholder' 	=> 'Password',
                            'value'         => @$password
            			)
            		);
            	?>
            	<span class="glyphicon glyphicon-lock form-control-feedback"></span>
          	</div>
          	<div class="row">
            	<div class="col-xs-8">    
              		<div class="checkbox icheck ">
                		<label> 
                        <input type="checkbox" name="data[Admin][remember_me]"> Remember Me </label>
              		</div>                        
            	</div>
            	<div class="col-xs-4">
            		<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            	</div>
          	</div>
        <?php echo $this->Form->end(); ?>
        <a href="#forgotpassword" data-toggle="modal" data-target="#forgot_password_modal1">I forgot my password</a><br>
    </div>
</div>

<div class="example-modal2">
  <div class="modal fade" id="forgot_password_modal">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Forgot Password</h4>
        </div>
        <form id="forgot_password_form" action="" method="post" >
            <div class="modal-body">
                <p> Please enter your email for forgot password. </p>
                <div class="form-group">
                    <input type="email" class="form-control" name="data[Admin][email]"></input>
                </div>    
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary pull-left">Submit</button>
              <button type="button" class="btn btn-default " data-dismiss="modal">Cancel</button>
            </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div><!-- /.example-modal -->

<script type="text/javascript">
    $(document).ready(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>