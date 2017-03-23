<?php defined('_JEXEC') or die('Restricted access');

// Hier definieren wir eine kurze Variable für den aktuellen Templatepfad
$tplpath = $this->baseurl . '/templates/' . $this->template;

// Laden der Joomla! System CSS
$this->addStyleSheet($this->baseurl . '/templates/system/css/system.css');

// Laden der Bootstrap Core CSS
$this->addStyleSheet($tplpath . '/vendor/bootstrap/css/bootstrap.min.css');

// Schriften laden
$this->addStyleSheet($tplpath . '/vendor/font-awesome/css/font-awesome.min.css');
$this->addStyleSheet('https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800');
$this->addStyleSheet('https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic');

// CSS Datei für die Portfolio Popups laden
$this->addStyleSheet($tplpath . '/vendor/magnific-popup/magnific-popup.css');

// CSS Dateien für das Template laden und hinterlegten Parameter prüfen.
// Bevor die CSS Dateien per Parameter eingebunden wurden, wurden die CSS folgendermaßen geladen:
// $this->addStyleSheet ($this->baseurl . '/templates/' . $this->template . '/css/creative.css');

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
$this->addScript($tplpath. '/vendor/scrollreveal/scrollreveal.min.js', 'text/javascript', true, false);
$this->addScript($tplpath . '/vendor/magnific-popup/jquery.magnific-popup.min.js', 'text/javascript', true, false);

// Laden der Skriptdateien für das Template
$this->addScript($tplpath . '/js/creative.min.js', 'text/javascript', true, false);

/* Dokument Objekt laden */
$doc = JFactory::getDocument();

// Custom Tags für den IE9 definieren
$stylelink = '<!--[if lte IE 9]>' . "\n";
$stylelink .= '<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>' . "\n";
$stylelink .= '	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>' . "\n";
$stylelink .= '<![endif]-->' . "\n";

// Custom Tags für den IE9 hinzufügen
$doc->addCustomTag($stylelink);

// Custom Tag für den Viewport definieren
$metaviewport = "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";
$doc->addCustomTag($metaviewport);
?>

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<jdoc:include type="head" />
</head>
<body class="contentpane modal">
	<jdoc:include type="message" />
	<jdoc:include type="component" />
</body>
</html>
