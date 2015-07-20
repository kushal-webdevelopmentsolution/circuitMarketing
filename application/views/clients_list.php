<div id="container" class="panel" >
	<div class="row">
    	
    </div>
    
    <h1>Potential Client</h1>

	<div id="body" class="row">
    	<?php if($this->session->flashdata('message')) {?>
            <div data-alert class="succmsg alert-box success"><?php echo $this->session->flashdata('message');?></div>
            <?php } ?>
        <div class="small-12 medium-12 large-12 columns">
        
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
                  <th width="150">Action</th>
                </tr>
  			</thead>
  			<tbody>
            <?php  foreach($lists as $client){?>
                <tr>
                  <td><?php echo $client->Company;?></td>
                  <td><?php echo $client->Address.' '.$client->City.' '.$client->State.' '.$client->Country;?></td>
                  <td><?php echo $client->Products;?></td>
                  <td><?php echo $client->Phone;?></td>
                  <td><?php echo $client->Contact;?></td>
                  <td><?php echo $client->Comment;?></td>
                  <td><?php echo $client->Reminder;?></td>
                  <td><?php echo $client->Reminder_date;?></td>
                  <td><?php echo $client->Mailer;?></td>
                  <td>
                  <a href="<?php echo '/'.SITE_FOLDER.'/clients/delete/'.$client->id;?>" title="Delete Client" onclick="return confirm('Are you want to Delete <?php echo $client->Company ?> ?');"><i class="step fi-x size-24 left"></i></a>
                  
                  <a href="<?php echo '/'.SITE_FOLDER.'/clients/edit/'.$client->id;?>" title="Edit Client"><i class="step fi-clipboard-pencil size-24 right"></i></a>
                  </td>
                  
                </tr>
            <?php } ?>
    
  			</tbody>
		</table>
        <div class="pagination-centered">
        	<ul class="pagination">
        	<?php echo $links; ?>
            </ul>
        </div>
        
        </div>
	</div>
	