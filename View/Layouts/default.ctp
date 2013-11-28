<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
	?>
	<link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900' rel='stylesheet' type='text/css'>
	<?php
		echo $this->Html->css('tanaka_build');
		echo $this->fetch('css');
	?>
	<?php
		echo $this->Html->script('//code.jquery.com/jquery-1.10.1.min.js');
		echo $this->Html->script('underscore');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">

		<aside>
			<ul class="sidebar">
				<li id="sidebar-header"><a href="/"><i class="icon-mail"></i></a></li>
				<li><a href="/users"><i class="icon-users"></a></i></li>
				<li><a href="/senders"><i class="icon-wrench"></a></i></li>
			</ul>
			<div class="sidebar-group">
				<ul>
					<li class="tab-header">MailMagazine</li>
				</ul>
			</div>
		</aside>

		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>

		<div id="footer">
		</div>

	</div>
</body>
</html>
