<div id="container" class="panel" >
	<div class="row">
    	
    </div>
    
    <h1>Search Client</h1>
    <style type="text/css">
	@media print
	{
		.print-hidden {
			display: none;
		}
		
		a {
			display: none;
		}
		.changeprintfont{
				font-size:12px !important;
		}
		.print-border { border:0px !important;}
			
	}
	</style>
    
    
    

	<div id="body" class="row">
    	<?php if($this->session->flashdata('message')) {?>
            <div data-alert class="succmsg alert-box success"><?php echo $this->session->flashdata('message');?></div>
            <?php } ?>
            <div id="search">
    	<form method="post" action="" enctype="multipart/form-data">
        
          <div class="row">
                <div class="large-4 columns">
                
                    <label>Company:
                        <select name="companies">
                          <option value=""> Select Company </option>
                        <?php foreach($companies as $company){ ?>
                          <option value="<?php echo $company['Company']; ?>" <?php if($default['companies'] == $company['Company']): ?>selected="selected" <?php endif; ?>><?php echo $company['Company']; ?></option>
                        <?php }?>
                        </select>
                      </label>
                  
                </div>
                <div class="large-4 columns">
                   <label>Products:
                        <select name="products">
                        <option value=""> Select Product </option>
                        <?php foreach($products as $product){ ?>
                          <option value="<?php echo $product['Products']; ?>" <?php if($default['products'] == $product['Products']): ?>selected="selected" <?php endif; ?>><?php echo $product['Products']; ?></option>
                        <?php }?>
                        </select>
                      </label>
                </div>
                <div class="large-4 columns">
                	<label style="padding-top:21px;">
                   <input class="button tiny" type="submit" ame="search" value="Search" >
                   </label>
                </div>
                <div class="large-4 columns">
                   &nbsp;
                </div>
          </div>
  		</form>
    </div>
    	<div class="row">
        	<div class="small-12">
        		<a href="javascript:void(0)" id="print"><i class="step fi-print size-48 right"></i></a>
            </div>
            
        </div>
        <div class="small-12 medium-12 large-12 columns">
        
        <table id="client_table">
  			<thead>
    			<tr>
                  <th width="200" class="companyHead">Company</th>
                  <th width="150" class="addressHead">Address</th>
                  <th width="150" class="productsHead">Products</th>
                  <th width="150" class="phoneHead">Phone</th>
                  <th width="150" class="contactHead">Contact Person</th>
                  <th width="150" class="commentHead">Comment</th>
                  <th width="150" class="reminderHead">Reminder</th>
                  <th width="150" class="reminderdateHead">Reminder Date</th>
                  <th width="150" class="mailerHead">Mailer</th>
                  <th width="150" class="actionHead">Action</th>
                </tr>
  			</thead>
  			<tbody>
            <?php  foreach($lists as $client){?>
                <tr>
                  <td class="companydata"><?php echo $client->Company;?></td>
                  <td class="addressdata"><?php echo $client->Address.' '.$client->City.' '.$client->State.' '.$client->Country;?></td>
                  <td class="productsdata"><?php echo $client->Products;?></td>
                  <td class="phonedata"><?php echo $client->Phone;?></td>
                  <td class="contactdata"><?php echo $client->Contact;?></td>
                  <td class="commentdata"><?php echo $client->Comment;?></td>
                  <td class="reminderdata"><?php echo $client->Reminder;?></td>
                  <td class="reminderdatedata"><?php echo $client->Reminder_date;?></td>
                  <td class="mailerdata"><?php echo $client->Mailer;?></td>
                  <td class="actiondata">
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
	<script type="text/javascript">
		$(function() {
			$("#print").click(function (){
				$("title").addClass("print-hidden");
				$("#search").addClass("print-hidden");
				$("#container > h1").addClass("print-hidden");
				$(".left-small").addClass("print-hidden");
				$(".actionHead").addClass("print-hidden");
				$(".actiondata").addClass("print-hidden");
				$("#client_table").addClass("changeprintfont");
				$(".right > h3").addClass("changeprintfont");
				$("div table").addClass("print-border");
				//$(this).parents("table").last().removeClass("print-hidden");
				if (window.print) {
					window.print();
				}
			});
		});
	</script>