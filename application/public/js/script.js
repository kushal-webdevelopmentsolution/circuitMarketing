// JavaScript Document
$(function() {  
		 $("#city").change(function(){  
		 /*dropdown post *///  
		 $.ajax({  
			url:"/circuitMarketing/clients/find_state/"+$(this).val(),  
			data: {},  
			type: "GET",  
			success:function(data){ 
			$('#state').val(data).attr("selected","selected");
			  
		 }  
	  });  
   });  
});


