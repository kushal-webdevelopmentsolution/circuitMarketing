<div id="container" class="panel" >
	<div class="row">
    	
    </div>
    
    <h1>Potential Client</h1>

	<div id="body" class="row">
    
    	<div class="small-5 columns">
            
            <?php if(validation_errors()) { ?>
            <div data-alert class="errDiv alert-box alert">
                <?php echo validation_errors(); ?>
            </div>
            <?php } elseif($this->session->flashdata('message')) {?>
            <div data-alert class="succmsg alert-box success"><?php echo $this->session->flashdata('message');?></div>
            <?php } ?>
            <div id="clientDiv">
                <form name="client_form" class="client_form" method="post" enctype="multipart/form-data">
                    <div class="fieldsDiv">
                        <div class="leftField">
                            <label> Company<em>*</em></label>
                        </div>
                        <div class="rightField">
                            <input type="text" name="company" class="company" value="<?php if(isset($inserted_clients['company'])):echo $inserted_clients['company']; endif ?>"/>
                        </div>
                    </div>
                    <div class="fieldsDiv">
                        <div class="leftField">
                            <label> Address<em>*</em></label>
                        </div>
                        <div class="rightField">
                            <textarea name="address" class="address" cols="50" rows="10"><?php if(isset($inserted_clients['address'])): echo $inserted_clients['address']; endif ?></textarea>
                        </div>
                    </div>
                    <div class="fieldsDiv">
                        <div class="leftField">
                            <label> Products<em>*</em></label>
                        </div>
                        <div class="rightField">
                            <input type="text" name="products" class="products" value="<?php if(isset($inserted_clients['products'])):echo $inserted_clients['products']; endif ?>"/>
                        </div>
                    </div>
                    <div class="fieldsDiv">
                        <div class="leftField">
                            <label> Phone<em>*</em></label>
                        </div>
                        <div class="rightField">
                            <input type="text" name="phone" class="phone" value="<?php if(isset($inserted_clients['company'])): echo $inserted_clients['phone']; endif ?>"/>
                        </div>
                    </div>
                    <div class="fieldsDiv">
                        <div class="leftField">
                            <label> Contact Persont<em>*</em></label>
                        </div>
                        <div class="rightField">
                            <input type="text" name="contact" class="contact" value="<?php if(isset($inserted_clients['company'])): echo $inserted_clients['contact']; endif ?>"/>
                        </div>
                    </div>
                    <div class="fieldsDiv">
                        <div class="leftField">
                            <label> City<em>*</em></label>
                        </div>
                        <div class="rightField">
                            <?php 
                                $options= array();
                                foreach($cities as $city)
                                {
                                    $options[$city['city'].'-'.$city['state_code']] = $city['city'].' '.$city['state_code'];
                                }
                                if(isset($inserted_clients['city'])):
                                    echo form_dropdown('city', $options, $inserted_clients['city'],'id="city"');
                                else:
                                    echo form_dropdown('city', $options,'','id="city"');
                                endif
                                
                            ?>
                        </div>
                    </div>
                    
                    <div class="fieldsDiv">
                        <div class="leftField">
                            <label> State<em>*</em></label>
                        </div>
                        <div class="rightField">
                            <?php 
                                $options=array();
                                foreach($states as $state)
                                {
                                    $options[$state['state_code']] = $state['state'];
                                }
                                if(isset($inserted_clients['state'])):
                                    echo form_dropdown('state', $options, $inserted_clients['state'],'id="state"');
                                else:
                                    echo form_dropdown('state', $options, '','id="state"');
                                endif
                            ?>
                        </div>
                    </div>
                    <div class="fieldsDiv">
                        <div class="leftField">
                            <label> Country<em>*</em></label>
                        </div>
                        <div class="rightField">
                            <?php 
                                $options=array();
                                $options=array('US'=>'United States');
                                
                                echo form_dropdown('country', $options, 'US','id="country"');
                            ?>
                        </div>
                    </div>
                     <div class="fieldsDiv">
                        <div class="leftField">
                            <label> Comment<em>*</em></label>
                        </div>
                        <div class="rightField">
                            <textarea name="comment" class="comment" cols="50" rows="10"><?php if(isset($inserted_clients['comment'])):echo $inserted_clients['comment']; endif?></textarea>
                        </div>
                    </div>
                    <div class="fieldsDiv">
                        <div class="leftField">
                            <label> Reminder<em>*</em></label>
                        </div>
                        <div class="rightField">
                            <?php 
                                $options=array('Y'=>'Yes','N'=>'No');
                                if(isset($inserted_clients['reminder'])):
                                    echo form_dropdown('reminder',$options,$inserted_clients['reminder']);
                                else:
                                    echo form_dropdown('reminder', $options, 'N');
                                endif
    
                            ?>
                        </div>
                    </div>
                    
                    <div class="fieldsDiv">
                        <div class="leftField">
                            <label> Reminder Date/Time</label>
                        </div>
                        <div class="rightField">
                            <input type="text" name="reminder_date" class="datetimepicker_mask" id="datetimepicker_mask" value="<?php if(isset($inserted_clients['reminder_date'])):echo $inserted_clients['reminder_date']; endif ?>"/>
                        </div>
                    </div>
                    
                    <div class="fieldsDiv">
                        <div class="leftField">
                            <label> Mailer<em>*</em></label>
                        </div>
                       <div class="rightField">
                            <textarea name="mailer" class="mailer" cols="50" rows="10"><?php if(isset($inserted_clients['mailer'])):echo $inserted_clients['mailer']; endif?></textarea>
                        </div>
                    </div>
                    
                    <div class="fieldsDiv">
                        <div class="leftField">
                            
                        </div>
                        <div class="rightField">
                            <input type="submit" name="Insert" class="login_btn button small" value="Add Potential Client"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="small-7 columns">
        
        <table>
  			<thead>
    			<tr>
                  <th width="200">Company</th>
                  <th width="150">Address</th>
                  <th width="150">Products</th>
                  <th width="150">Phone</th>
                  <th width="150">Contact Person</th>
                  <th width="150">Comment</th>
                  <th width="150">Reminder</th>
                  <th width="150">Reminder Date</th>
                  <th width="150">Mailer</th>
                </tr>
  			</thead>
  			<tbody>
            <?php  foreach($lists as $client){?>
                <tr>
                  <td><?php echo $client['Company'];?></td>
                  <td><?php echo $client['Address'];?></td>
                  <td><?php echo $client['Products'];?></td>
                  <td><?php echo $client['Phone'];?></td>
                  <td><?php echo $client['Contact'];?></td>
                  <td><?php echo $client['Comment'];?></td>
                  <td><?php echo $client['Reminder'];?></td>
                  <td><?php echo $client['Reminder_date'];?></td>
                  <td><?php echo $client['Mailer'];?></td>
                </tr>
            <?php } ?>
    
  			</tbody>
		</table>
        
        </div>
	</div>
	