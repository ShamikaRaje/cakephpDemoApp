<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Hot Air Balloons
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20081210
-->

<?php
	$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
	$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>
	<?php echo $cakeDescription ?>:
	<?php echo $this->fetch('title'); ?>
</title>
<?php
	echo $this->Html->meta('icon');
	echo $this->Html->css('cake.generic');
	echo $this->fetch('meta');
	echo $this->fetch('css');

	// Loading scripts for kendo ui Controls
    echo $this->Html->css('styles/kendo.common.min.css');
    echo $this->Html->css('styles/kendo.default.min.css');
	echo $this->fetch('script');
    echo $this->Html->script('jquery.min.js');
    echo $this->Html->script('kendo.web.min.js');
    //--------------- End---------------//
    
  	// Mainly responsible for adding theme
	echo $this->Html->css('default');
	echo $this->Html->charset(); 
	
?>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="#">Cakephp Demo theme</a></h1>
			<!--<p> design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a></p>-->
		</div>
	</div>
	<!-- end #header -->
	<div id="menu">
		<ul>
		<?php 
		if(Configure::read('USER_LOGGED_IN') == 'guest_user'){ ?>
			<li><?php   echo $this->Html->link('Login', array('plugin'=>'login', 'controller' => 'logins', 'action' => 'login')); ?>
			</li>
		<?php } 
		elseif(Configure::read('USER_LOGGED_IN') == 'logged_in_user'){    ?>
			<li><?php  echo $this->Html->link('My Posts', array('plugin'=>'post', 'controller' => 'Posts', 'action' => 'index_new')); ?>
			</li>

			<li><?php  echo $this->Html->link('Employee Info', array('plugin'=>'employee', 'controller' => 'EmpPersonelInfo', 'action' => 'index'));?>
			</li>

			<li><?php  echo $this->Html->link('Employee', array('plugin'=>'employee', 'controller' => 'Employees', 'action' => 'index'));?>
			</li>

			<li><?php  echo $this->Html->link('Category Tree', array('plugin'=>'post', 'controller' => 'TreeCategories', 'action' => 'index'));?>
			</li>
			
			<li><?php  echo $this->Html->link('Authors', array('plugin'=>'author', 'controller' => 'Authors', 'action' => 'index'));?>
			</li>

			<li>
				<a href="#">Contact</a>
			</li>

			<li><?php  echo $this->Html->link('Downloads', array('plugin'=>'post', 'controller' => 'Posts', 'action' => 'download'));?>
			</li>
			<li><?php  echo $this->Html->link('Logout', array('plugin'=>'login', 'controller' => 'logins', 'action' => 'logout'));?>
			</li>
			<li>
				<strong>
					<?php 
						if(!empty($_SESSION['Auth']['User'])){
							echo "Welcome ".ucfirst($_SESSION['Auth']['User']);

						}
					?>
				</strong>
			</li>
			<?php } ?>
		</ul>
	</div><!-- end #menu -->
	
	<div id="page">
		<div id="banner">&nbsp;</div>

		<div id="content">
			<!--<div class="post">
				<h1 class="title"><a href="#">Welcome to Hot Air Balloons </a></h1>
				<p class="meta">Posted by <a href="#">Someone</a> on March 10, 2008
					&nbsp;&bull;&nbsp; <a href="#" class="comments">Comments (64)</a> &nbsp;&bull;&nbsp; <a href="#" class="permalink">Full article</a></p>
				<div class="entry">
					<p>This is <strong>Hot Air Balloons</strong>, a free, fully standards-compliant CSS template designed by FreeCssTemplates<a href="http://www.nodethirtythree.com/"></a> for <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>. The photo used in this design is from <a href="http://www.pdphoto.org/">PDPhoto.rog</a>. This free template is released under a <a href="http://creativecommons.org/licenses/by/2.5/">Creative Commons Attributions 2.5</a> license, so you’re pretty much free to do whatever you want with it (even use it commercially) provided you keep the links in the footer intact. Aside from that, have fun with it :)</p>
					<p>Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum ipsum. Proin imperdiet est. Phasellus dapibus semper urna. Pellentesque ornare, orci in felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem.</p>
				</div>
			</div>-->
			<div class="post">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
		</div><!-- end #content -->
		
		<div id="sidebar">
			<?php 

				// create the sidebar block.
				$this->start('sidebar');
				echo $this->element('sidebar');
				$this->end();
				echo $this->fetch('sidebar'); ?>
		</div><!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div><!-- end #page -->
	
	<div id="footer">
		<p><?php echo $cakeVersion; ?></p>
		<!-- scripts_for_layout -->
		<?php echo $scripts_for_layout; ?>
		<!-- Js writeBuffer -->
		<?php
		if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
			 echo $this->Js->writeBuffer();
		// Writes cached scripts
		?>
	</div>
	<!-- end #footer -->
</div>
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>
