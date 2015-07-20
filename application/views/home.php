<div id="container" class="panel">
	<div class="row">
    	<div class="small-2 medium-2 large-2 columns">&nbsp;&nbsp;</div>
        <div class="small-8 medium-8 large-8 columns">
			<h1>Chicago Circuit Marketing Tool</h1>
        </div>
        <div class="small-2 medium-2 large-2 columns">&nbsp;&nbsp;</div>

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
                    	
                    </div>
                    <div class="rightField">
                    	<input type="submit" name="submit" class="login_btn button small" value="Login"/>
                    </div>
                </div>
            </form>
        </div>
        </div>
        <div class="small-4 medium-4 large-4 columns">&nbsp;&nbsp;</div>
	</div>
