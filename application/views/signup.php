<div id="container" class="panel">
	<h1>User Registration</h1>

	<div id="body" class="row">
        <div class="small-4 medium-4 large-4 columns">&nbsp;&nbsp;</div>
        <div class="small-4 medium-4 large-4 columns">
        <?php if(validation_errors()) { ?>
        <div class="errDiv">
		 	<?php echo validation_errors(); ?>
        </div>
        <?php } else {?>
        <div class="succmsg"><?php echo $this->session->flashdata('message');?></div>
        <?php } ?>
		<div id="loginDiv">
        	<form name="logindiv" class="login" method="post" enctype="multipart/form-data">
            	<div class="fieldsDiv">
                	<div class="leftField">
                    	<label> Username<em>*</em></label>
                    </div>
                    <div class="rightField">
                    	<input type="text" name="username" class="username"/>
                    </div>
                </div>
                <div class="fieldsDiv">
                	<div class="leftField">
                    	<label> Password<em>*</em></label>
                    </div>
                    <div class="rightField">
                    	<input type="password" name="pwd" class="pwd"/>
                    </div>
                </div>
                <div class="fieldsDiv">
                	<div class="leftField">
                    	<label> Email<em>*</em></label>
                    </div>
                    <div class="rightField">
                    	<input type="email" name="email" class="email" maxlength="35"/>
                    </div>
                </div>
                <div class="fieldsDiv">
                	<div class="leftField">
                    	<label> Contact No<em>*</em></label>
                    </div>
                    <div class="rightField">
                    	<input type="text" name="contactno" class="contactno" maxlength="10"/>
                    </div>
                </div>
                
                <div class="fieldsDiv">
                	<div class="leftField">
                    	<label> Roles<em>*</em></label>
                    </div>
                    <div class="rightField">
                    	<?php 
							foreach($roles as $role)
							{
								$options[$role['id']] = $role['role'];
							}
							echo form_dropdown('role', $options, 'large');
						?>
                    </div>
                </div>
                
                <div class="fieldsDiv">
                	<div class="leftField">
                    	
                    </div>
                    <div class="rightField">
                    	<input type="submit" name="submit" class="login_btn button small" value="Create New User"/>
                    </div>
                </div>
            </form>
        </div>
        </div>
        <div class="small-4 medium-4 large-4 columns">&nbsp;&nbsp;</div>
	</div>
