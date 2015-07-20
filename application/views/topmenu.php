<?php 
	$menus = array(
			'Users'=>array(
					'Create New User'=> '/'.SITE_FOLDER.'/register/signup',
					'Users List'=>'/'.SITE_FOLDER.'/users/lists'
					),
			'Clients'=>array(
					'Create client'=>'/'.SITE_FOLDER.'/clients/client_form',
					'Clients List'=>'/'.SITE_FOLDER.'/clients/lists',
					'Clients Search'=>'/'.SITE_FOLDER.'/clients/search'
			)
	);


?>

<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap">
    <nav class="tab-bar">
      <section class="left-small">
        <a class="left-off-canvas-toggle menu-icon" ><span></span></a>
      </section>

      <section class="middle tab-bar-section">
        <h1 class="title">Chicago Circuit</h1>
      </section>

      <section class="right">
        <!--<a class="right-off-canvas-toggle menu-icon" ><span></span></a>-->
        <h3 class="title"> Today : <?php echo date('M d Y h:i A');  ?></h3>
      </section>
    </nav>

    <aside class="left-off-canvas-menu">
      <ul class="off-canvas-list">
        <li><label>Menu</label></li>
        <?php foreach($menus as $k=>$v) { ?>
        <li class="has-submenu"><a href="#"><?php echo $k; ?></a>
        	<ul class="left-submenu">
            	<li class="back"><a href="#">Back</a></li>
                <li><label><?php echo $k;?></label></li>
        	<?php foreach($v as $i=>$j){?>
                <li><a href="<?php echo $j;?>"><?php echo $i;?></a></li>
            <?php } ?>
            	
            </ul>
        </li>
        <?php }?>
        <li><a href="/<?php echo SITE_FOLDER;?>/home/logout">LogOut </a></li>
      </ul>
    </aside>

    <!--<aside class="right-off-canvas-menu">
      <ul class="off-canvas-list">
        <li><label>Users</label></li>
        <li><a href="#">Hari Seldon</a></li>
        <li class="has-submenu"><a href="#">R. Giskard Reventlov</a>
            <ul class="right-submenu">
                <li class="back"><a href="#">Back</a></li>
                <li><label>Level 1</label></li>
                <li><a href="#">Link 1</a></li>
                <li class="has-submenu"><a href="#">Link 2 w/ submenu</a>
                    <ul class="right-submenu">
                        <li class="back"><a href="#">Back</a></li>
                        <li><label>Level 2</label></li>
                        <li><a href="#">...</a></li>
                    </ul>
                </li>
                <li><a href="#">...</a></li>
            </ul>
        </li>
        <li><a href="#">...</a></li>
      </ul>
    </aside>-->
  