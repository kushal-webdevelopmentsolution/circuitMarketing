<div id="container" class="panel" >
	<div class="row">
    	
    </div>
    
    <h1>Dashboard</h1>

	<div id="body" class="row">
    	<?php if($this->session->flashdata('message')) {?>
            <div data-alert class="succmsg alert-box success"><?php echo $this->session->flashdata('message');?></div>
        <?php } ?>
        <?php
			//echo '<pre>';
		//	print_r($reminders);
		
		?>    
        <div class="small-4 medium-4 large-4 columns ">
        	<h4> Today's Reminder </h4>
            
        	<?php foreach($reminders as $reminder){?>
            
            	<h5>You should contanct below client on <b><?php echo date('M d Y h:i A',strtotime($reminder['Reminder_date'])); ?></b></h5>
                <?php if(strtotime(date('m/d/Y H:i')) > strtotime($reminder['Reminder_date'])): ?>
            	<ul class="vcard small-12 past">
                <?php else: ?>
                <ul class="vcard small-12">
                <?php endif; ?>
                  <li class="fn"><?php echo $reminder['Company']; ?></li>
                  <li class="street-address"><?php echo $reminder['Address']; ?></li>
                  <li class="locality"><?php echo $reminder['City']; ?></li>
                  <li><span class="state"><?php echo $reminder['State']; ?></span>, <span class="zip">12345</span></li>
                  <li class="phone"><a href="#"><?php echo $reminder['Phone']; ?></a></li>
                </ul>
                
            <?php } ?>
        </div>
	</div>
	