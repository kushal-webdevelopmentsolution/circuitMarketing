<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<script src="/circuitMarketing/application/public/js/jquery.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>  
    <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>-->
    <script src="/circuitMarketing/application/public/js/foundation.min.js"></script>
  	<script src="/circuitMarketing/application/public/js/foundation/foundation.offcanvas.js"></script>
    <script src="/circuitMarketing/application/public/js/vendor/modernizr.js"></script>
    <script src="/circuitMarketing/application/public/js/jquery.datetimepicker.js"></script>
    <script type="text/javascript" src="/circuitMarketing/application/public/js/script.js"></script>
     <link rel="stylesheet" type="text/css" href="/circuitMarketing/application/public/js/jquery.datetimepicker.css"/>
    <link href="/circuitMarketing/application/public/css/style.css" rel="stylesheet" type="text/css"  /> 
    <link rel="stylesheet" href="/circuitMarketing/application/public/css/foundation.css" />
    <link rel="stylesheet" href="/circuitMarketing/application/public/css/foundation-icons.css" />
    <script type="text/javascript">
	   $(function(){
	   $(document).foundation(); 
	   });
	   
	   $(function(){
		   
			$('#datetimepicker_mask').datetimepicker({
				//formatTime:'H:i',
				minDate:'<?php echo date('m/d/Y'); ?>',
				format:'m/d/Y H:i',
				//formatDate:'m/d/Y'
				mask:'19/39/9999 29:59',
				theme:'dark'
			});
	   });

    </script>
     
               
</head>
<body>
<section class="main-section">

