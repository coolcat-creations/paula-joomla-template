<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
/** @var JDocumentError $this */

if (!isset($this->error))
{
	$this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	$this->debug = false;
}

$app = JFactory::getApplication();
?>

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Bootstrap Core CSS -->
	<link
		href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/vendor/bootstrap/css/bootstrap.min.css"
		rel="stylesheet">

	<!-- Custom Fonts -->
	<link
		href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/vendor/font-awesome/css/font-awesome.min.css"
		rel="stylesheet" type="text/css">
	<link
		href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
		rel='stylesheet' type='text/css'>
	<link
		href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'
		rel='stylesheet' type='text/css'>

	<!-- Theme CSS -->
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/creative.css"
	      rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<title><?php echo $this->error->getCode(); ?>
		- <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></title>

	<?php if ($app->get('debug_lang', '0') == '1' || $app->get('debug', '0') == '1') : ?>
		<link href="<?php echo JUri::root(true); ?>/media/cms/css/debug.css" rel="stylesheet"/>
	<?php endif; ?>
	<!--[if lt IE 9]>
	<script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script><![endif]-->
</head>
<body id="page-top">

<header
	style="background-image:url('<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/errorcat.jpg');">
	<div class="header-content">
		<div class="header-content-inner">
			<h1><?php echo $this->error->getCode(); ?>
				- <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></h1>
			<hr>

			<?php if ($this->error->getCode() == '404')
			{ ?>
			<h2>Leider haben wir diese Seite nicht gefunden </h2>
			<p>Der Link ist möglicherweise veraltet oder Sie haben sich vertippt?
			<p>
				<?php } ?>
			<p>Am Besten fangen wir von neuem an:</p>

			<!--			<p><strong>-->
			<?php //echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?><!--</strong><br>-->
			<!--			<br>-->
			<!--			<br>-->
			<?php //echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?><!--</li>-->
			<!--			<br>-->
			<?php //echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?><!--</li>-->
			<!--			<br>--><?php //echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?><!--</li>-->
			<!--			<br>-->
			<?php //echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?><!--</li>-->
			<!--			<br>-->
			<?php //echo JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND'); ?><!--</li>-->
			<!--			<br>-->
			<?php //echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?><!--</li>-->
			<!--			</p>-->
			<a href="<?php echo JUri::root(true); ?>/index.php" class="btn btn-primary btn-xl"
			   title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a>
			<br><br>
			<p><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></p>


		</div>
	</div>
</header>
<?php if ($this->debug) : ?>
	<div class="col-lg-12 text-center">
		<small>
			<div>
				<?php echo $this->renderBacktrace(); ?>
				<?php // Check if there are more Exceptions and render their data as well ?>
				<?php if ($this->error->getPrevious()) : ?>
					<?php $loop = true; ?>
					<?php // Reference $this->_error here and in the loop as setError() assigns errors to this property and we need this for the backtrace to work correctly ?>
					<?php // Make the first assignment to setError() outside the loop so the loop does not skip Exceptions ?>
					<?php $this->setError($this->_error->getPrevious()); ?>
					<?php while ($loop === true) : ?>
						<p><strong><?php echo JText::_('JERROR_LAYOUT_PREVIOUS_ERROR'); ?></strong></p>
						<p><?php echo htmlspecialchars($this->_error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></p>
						<?php echo $this->renderBacktrace(); ?>
						<?php $loop = $this->setError($this->_error->getPrevious()); ?>
					<?php endwhile; ?>
					<?php // Reset the main error object to the base error ?>
					<?php $this->setError($this->error); ?>
				<?php endif; ?>
			</div>
		</small>
	</div>
	</div>
<?php endif; ?>

</main>
</body>
</html>
