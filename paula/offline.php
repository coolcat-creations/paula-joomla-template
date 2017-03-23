<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/** @var JDocumentHtml $this */

$twofactormethods = JAuthenticationHelper::getTwoFactorMethods();
$app              = JFactory::getApplication();

// Output as HTML5
$this->setHtml5(true);

$fullWidth = 1;

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add template js
JHtml::_('script', 'template.js', array('version' => 'auto', 'relative' => true));

// Add html5 shiv
JHtml::_('script', 'jui/html5.js', array('version' => 'auto', 'relative' => true, 'conditional' => 'lt IE 9'));

// Add Stylesheets
JHtml::_('stylesheet', '../vendor/bootstrap/css/bootstrap.min.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', '/creative.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', '../vendor/font-awesome/css/font-awesome.min.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic', array('version' => 'auto', 'relative' => true));

JHtml::_('stylesheet', 'offline.css', array('version' => 'auto', 'relative' => true));


// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Logo file or site title param
$sitename = $app->get('sitename');

if ($this->params->get('logoFile'))
{
	$logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
}
elseif ($this->params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle')) . '</span>';
}
else
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
</head>
<body class="site">

<header style="background-image:url('<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/offlinecat.jpg');">
	<div class="header-content">
		<div class="header-content-inner">
			<h1>Diese Seite ist momentan offline.</h1>
			<?php if (!empty($logo)) : ?>
				<h2><?php echo $logo; ?></h2>
			<?php else : ?>
				<h2><?php echo htmlspecialchars($app->get('sitename')); ?></h2>
			<?php endif; ?>
			<?php if ($app->get('offline_image') && file_exists($app->get('offline_image'))) : ?>
				<img src="<?php echo $app->get('offline_image'); ?>" alt="<?php echo htmlspecialchars($app->get('sitename')); ?>" />
			<?php endif; ?>
			<?php if ($app->get('display_offline_message', 1) == 1 && str_replace(' ', '', $app->get('offline_message')) != '') : ?>
				<p><?php echo $app->get('offline_message'); ?></p>
			<?php elseif ($app->get('display_offline_message', 1) == 2) : ?>
				<p><?php echo JText::_('JOFFLINE_MESSAGE'); ?></p>
			<?php endif; ?>
		</div>
		<jdoc:include type="message" />
		<div class="col-lg-4 col-lg-offset-4">
		<form action="<?php echo JRoute::_('index.php', true); ?>" method="post" id="form-login" class="form-horizontal text-left">
				<label for="username"><?php echo JText::_('JGLOBAL_USERNAME'); ?></label>
				<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-user"></i></div>
				<input name="username" id="username" type="text" title="<?php echo JText::_('JGLOBAL_USERNAME'); ?>" class="form-control" />
					</div>

			<label for="password"><?php echo JText::_('JGLOBAL_PASSWORD'); ?></label>
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-key"></i></div>
				<input type="password" name="password" id="password" title="<?php echo JText::_('JGLOBAL_PASSWORD'); ?>" class="form-control"/>
			</div>

				<?php if (count($twofactormethods) > 1) : ?>
					<label for="secretkey"><?php echo JText::_('JGLOBAL_SECRETKEY'); ?></label>

			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-key"></i></div>
					<input type="text" name="secretkey" id="secretkey" title="<?php echo JText::_('JGLOBAL_SECRETKEY'); ?>" class="form-control" />
				</div>
				<?php endif; ?>
<br>
				<input type="submit" name="Submit" class="btn btn-primary btn-lg btn-block" value="<?php echo JText::_('JLOGIN'); ?>" />

				<input type="hidden" name="option" value="com_users" />
				<input type="hidden" name="task" value="user.login" />
				<input type="hidden" name="return" value="<?php echo base64_encode(JUri::base()); ?>" />
				<?php echo JHtml::_('form.token'); ?>
		</form>
</div>
		</div>
	</div>
</header>




</body>
</html>
