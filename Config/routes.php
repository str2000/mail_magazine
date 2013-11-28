<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 */

Router::mapResources('api_users');
Router::parseExtensions('json');

Router::connect('/', array('controller' => 'mail_magazines', 'action' => 'index'));
Router::connect('/senders', array('controller' => 'senders', 'action' => 'edit', 1));

CakePlugin::routes();

require CAKE . 'Config' . DS . 'routes.php';
