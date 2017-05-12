<?php defined('_JEXEC') or die('Restricted access');

// Hier definieren wir eine kurze Variable für den aktuellen Templatepfad
$tplpath = $this->baseurl . '/templates/' . $this->template;

$this->setHtml5(true);

// Laden der Bootstrap CSS
$this->addStyleSheet($tplpath . '/vendor/bootstrap/css/bootstrap.min.css');

// Schriften laden
$this->addStyleSheet($tplpath . '/vendor/font-awesome/css/font-awesome.min.css');
$this->addStyleSheet('https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800');
$this->addStyleSheet('https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic');

// CSS Datei für die Portfolio Popups laden
$this->addStyleSheet($tplpath . '/vendor/magnific-popup/magnific-popup.css');

// CSS Dateien für das Template laden und hinterlegten Parameter prüfen.
// Bevor die CSS Dateien per Parameter eingebunden wurden, wurden die CSS folgendermaßen geladen:
// $this->addStyleSheet($tplpath . '/css/creative.css');

if ($this->params->get('templatecolor', 'orange') == 'orange')
{
	$this->addStyleSheet($tplpath . '/css/creative.css');
}
else
{
	$this->addStyleSheet($tplpath . '/css/creative-blue.css');
}

// Skripte laden

// jQuery Skript von Joomla! laden
JHtml::_('jquery.framework');

// Bootstrap von Joomla! einbinden
// (Die Bootstrap Datei muss nicht extra geladen werden, nur in den richtigen Ordner verschoben werden)
JHtml::_('bootstrap.framework');

// Laden der Skriptdateien für Easing, Scrolling und Popups
$this->addScript('http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js', 'text/javascript', true, false);
$this->addScript($tplpath . '/vendor/scrollreveal/scrollreveal.min.js', 'text/javascript', true, false);
$this->addScript($tplpath . '/vendor/magnific-popup/jquery.magnific-popup.min.js', 'text/javascript', true, false);

// Laden der Skriptdateien für das Template
$this->addScript($tplpath . '/js/creative.min.js', 'text/javascript', true, false);

// Custom Tags für den IE9 definieren
$stylelink = '<!--[if lte IE 9]>' . "\n";
$stylelink .= '<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>' . "\n";
$stylelink .= '	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>' . "\n";
$stylelink .= '<![endif]-->' . "\n";

// Custom Tags für den IE9 hinzufügen
$this->addCustomTag($stylelink);

// Custom Tag für den Viewport definieren
$metaviewport = "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";
$this->addCustomTag($metaviewport);

// Beginn Template
?>

<!DOCTYPE html>

<html xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">

<head>
	<!-- Hier werden die Joomla! Headerdaten geladen -->
	<jdoc:include type="head"/>

</head>

<body id="page-top">

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
			        data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
			</button>
			<a class="navbar-brand page-scroll" href="#page-top">

				<!-- Abfrage der Parameter für das Logo -->
				<?php if ($this->params->get('logotype', 'text') == 'image')
				{ ?>
					<!-- Ausgabe des Logo-Bildes -->
					<img src="<?php echo $this->params->get('logoimg', ''); ?>"
					     alt="<?php echo $this->params->get('logoimgalt', ''); ?>" width="200px" height="20px"/>
				<?php }
				else
				{ ?>
					<!-- Ausgabe des Logo-Textes -->
					<?php echo $this->params->get('logotext', ''); ?>
				<?php } ?>

			</a>
		</div>

		<!-- Hier laden wir nun die Position mainnav mit dem Stil navigation -->
		<jdoc:include type="modules" name="mainnav" style="navigation"/>

	</div>
	<!-- /.container-fluid -->
</nav>

<!-- Hier laden wir die Position header mit dem Stil header-->
<jdoc:include type="modules" name="header" style="header"/>

<!-- Hier laden wir die Position teaser mit dem Stil primary -->
<jdoc:include type="modules" name="teaser" style="primary"/>

<!-- Hier laden wir die Position top mit dem Stil primary -->
<jdoc:include type="modules" name="top" style="no"/>

<!-- Hier folgt der Inhaltsbereich -->
<?php if ($this->params->get('mainoutput', 'yes') == 'yes') : ?>
	<main class="container" id="maincontent">
		<div class="row">

			<?php
			/* Variable für Spaltenprüfung */
			$rechtespalte = ($this->countModules('right'));

			/* Wenn die rechte Spalte existiert, dann wird der Inhalt nicht verschoben */
			if ($rechtespalte == '1'):
				$inhaltsklasse = 'class="col-lg-8"';

			/* Wenn die rechte Spalte nicht existiert, dann wird der Inhalt um 2 Spalten verschoben */
			else :
				$inhaltsklasse = 'class="col-lg-8 col-lg-offset-2"';

			endif;

			?>

			<div <?php echo $inhaltsklasse; ?>>
				<!— Hier wird die Systemnachricht ausgegeben —>
				<jdoc:include type="message"/>
				<!— Navigationspfad—>
				<jdoc:include type="modules" name="breadcrumbs" style="none"/>
				<!— Bereich für die Komponentenausgabe —>
				<jdoc:include type="component"/>
			</div>

			<?php if ($rechtespalte) : ?>
				<div class="col-lg-4">
					<jdoc:include type="modules" name="right" style="xhtml"/>
				</div>
			<?php endif; ?>

		</div>
	</main>
<?php endif; ?>

<!-- Hier laden wir die Position portfolio mit dem Stil none -->
<jdoc:include type="modules" name="portfolio" style="none"/>

<!-- Hier laden wir die Position action mit dem Stil dark -->
<jdoc:include type="modules" name="action" style="dark"/>

<!-- Hier prüfen wir ob ein Modul auf der Position contact veröffentlicht wurde -->
<?php if ($this->countModules('contact')) : ?>
	<section id="contact">
		<div class="container">
			<div class="row">
				<!-- Hier laden wir die Position contact mit dem Stil none -->
				<jdoc:include type="modules" name="contact" style="none"/>
			</div>
		</div>
	</section>
<?php endif; ?>

</body>

</html>
